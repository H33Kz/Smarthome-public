<?php
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
    $sessionID = $_GET['user_id'];
    $query = "SELECT * FROM controlTable WHERE user_id='$sessionID'";

    //Sprawdź czy zapytanie do bazy daje wyniki
    if($result = @$conn->query($query)){

        $response = "";

        $row = $result->fetch_assoc();
        $led1 = $row['led1'];
        if($led1 == 1){
            $response = $response."1";
        }
        else{
            $response = $response."0";
        }
        $led2 = $row['led2'];
        if($led2 == 1){
            $response = $response."1";
        }
        else{
            $response = $response."0";
        }
        $door = $row['door'];
        if($door == 1){
            $response = $response."1";
        }
        else{
            $response = $response."0";
        }

    
        echo $response;
        //echo json_encode($data);
    }
    else{
        echo "Unable to locate data for this user";
    }
}