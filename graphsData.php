<?php
session_start();
//Sprawdzenie czy ustanowiona jest sesja
if(!isset($_SESSION['loggedin'])){
    header('Location:index.php');
    exit();
}

require_once "sql_connect.php";

//Ustanowienie połączenia z bazą danych
$conn = @new mysqli($dbhost,$dbuser,$dbpass,$dbname);
//Sprawdzenie statusu połączenia
//Gdy nie ma połączenia
if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno;
    exit();
}
//Gdy ustanowiono połączenie
else{
    //Query do bazy danych
    $sessionID = $_SESSION['id'];
    $query = "SELECT * FROM graphsdata WHERE user_id='$sessionID'";

    //Sprawdź czy zapytanie do bazy daje wyniki
    if($result = @$conn->query($query)){

        $data = array();

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        echo json_encode($data);
    }
    else{
        echo "Unable to locate data for this user";
    }
}