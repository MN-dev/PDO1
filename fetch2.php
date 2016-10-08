<?php

require 'conn.php';

// fetchColumn() || fetchObject() important
class User{
	public $title;

}
$sql  = "SELECT * FROM books";
$stmt = $conn->prepare($sql);
$stmt->execute();
 
$row  = $stmt->fetchObject('User'); 
echo $row->title;









/*
$sql  = "SELECT * FROM books";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row  = $stmt->fetchColumn();
while ($row = $stmt->fetchColumn(2)) {
	echo $row."<br />";
}


*/