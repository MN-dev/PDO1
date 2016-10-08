<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "test";

try{
$conn = new pdo ("mysql:host=$host; dbname=$db",$user,$pass);

}
catch(PDOException $e){
	echo "Not connected:" .$e->getMessage();
}
