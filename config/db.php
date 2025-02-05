<?php 
$host = "localhost";
$user= "root";
$password = "";
$dbname = "todoo_list";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: ". $conn->connect_error);
}
?>