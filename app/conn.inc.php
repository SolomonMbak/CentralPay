<?php

// Production
// $host = 'localhost';
// $username = 'gojemso2_centralpayer';
// $password = 'E,LESPAZ%Rup';
// $database = 'gojemso2_centralpay';


// Dev
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'centralpay';

//Connection
$conn = mysqli_connect($host, $username, $password, $database);

//Escape String
function mres($conn,$data){
	return mysqli_escape_string($conn,rtrim($data));
}

?>