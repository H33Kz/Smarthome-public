<?php
    session_start();
    
    //Sprawdź czy są dane w tablicy POST
    if(!isset($_POST['login'])||!isset($_POST['password'])){
        header('Location: index.php');
    }

    require_once "sql_connect.php";

    //Ustanawianie połączenia z bazą danych
    $connection = @new mysqli($dbhost,$dbuser,$dbpass,$dbname); 
    //Sprawdź status połączenia
    if($connection->connect_errno!=0){
        echo "Error: ".$connection->connect_errno;
        exit();
    }
    //Przy ustanowionym połączeniu:
    else{
        //Przechwyć dane z formularza logowania
        $login=$_POST['login'];
        $pass=$_POST['password'];

        //Ochrona przed sql-injection
        $login = htmlentities($login,ENT_QUOTES,"UTF-8");
        $pass = htmlentities($pass,ENT_QUOTES,"UTF-8");
        
        $sql ="SELECT * FROM users WHERE login='$login' AND pass='$pass'";
        
        //Sprawdź czy zapytanie do bazy danych daje wyniki
        if($result = @$connection->query($sql)){
            
            //Wpisz ilość pasujących wyników do zmiennej i sprawdź ich ilość
            $accountsNumber = $result->num_rows;
            if($accountsNumber>0){
                
                //Przypisz dane z wiersza tablicy bazy danych do tablicy usr_data
                //Następnie wypisz zmienne do tablicy sesji
                $usr_data = $result->fetch_assoc();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $usr_data['id'];
                $_SESSION['login'] = $usr_data['login'];
                $_SESSION['humidity'] = $usr_data['humi'];
                $_SESSION['temperature'] = $usr_data['temp'];

                //Wyczyść zmienną error w tablicy sesji(Czyszczenie flagi o złym zalogowaniu)
                unset($_SESSION['error']);
                //Wyczyść wyniki zapytania do bazy danych
                $result->free_result();
                header('Location: userpanel.php');
            }
            else{
                //W przypadku nie znaleźenia użytkownika oznacz flagę error w tablicy sesji
                $_SESSION['error'] = '<span style="color:red">Invalid login information</span>';
                header('Location: index.php');
            }
            
        }
        $connection->close();
    }
    
?>