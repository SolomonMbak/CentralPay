<?php
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