<?php

require_once "sql_connect.php"; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
    echo "Error: " . mysqli_connect_error();
    exit();
}
else{
    echo "Connection Success!";

    $user_id = $_GET["user_id"];
    $smokelevel = $_GET["smokelevel"];
    $waterlevel = $_GET["waterlevel"];

    echo "wartosci z tablicy get skryptu a_s_smokelevel".$smokelevel." ".$waterlevel;
    $query = "UPDATE `smokeTable` SET smoke=$smokelevel, water=$waterlevel  WHERE user_id=('$user_id')";
    $result = mysqli_query($connect,$query);
    echo "Insertion Success!<br>";
}
?>