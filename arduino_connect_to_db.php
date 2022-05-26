<?php

require_once "sql_connect.php"; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
    echo "Error: " . mysqli_connect_error();
    exit();
}
else{
    echo "Connection Success!<br><br>";

    $waterlevel = $_GET["waterlevel"];
    $user_id = $_GET["user_id"];
    $humi = $_GET["humi"];
    $temp = $_GET["temp"];
    //$waterlevel = htmlentities($waterlevel,ENT_QUOTES, "UTF-8");

    //$query = "INSERT INTO waterLevelTable (waterlevel) VALUES ('$waterlevel')";
    $query = "INSERT INTO graphsdata (user_id, humi, temp) VALUES ('$user_id', '$humi', '$temp')";
    $result = mysqli_query($connect,$query);
    //$query2 = "SELECT door FROM controlTable WHERE user_id = '$user_id'"
    echo "Insertion Success!<br>";
}
?>