<?php
require 'conn.php';							// beginTransaction //
// if we have any error in insert values  all transactions will stop inserting data
// if every value is okay all transactions will done
try{
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$conn->beginTransaction();
	$conn->exec("INSERT INTO books (title,author) VALUES ('book1','book1')");
	$conn->exec("INSERT INTO books (title11,author11) VALUES ('book2','book2')");
	$conn->commit();
}
catch(Exception $e){
	$conn->rollBack();
	echo "Error :: ".$e->getMessage();
}