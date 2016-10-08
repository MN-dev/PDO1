<?php

require 'conn.php';

/* Silent warning Exception */ // set attrbiute important

// PDO::ATTR_ERRMODE بتتحكم في شكل ظهور الخطاء في PDO
// use 3 values   1-PDO::ERRMODE_SILENT 2-PDO::ERRMODE_WARNING 3-PDO::ERRMODE_EXCEPTION
// Exceptions have 2 kind 1-PDOException  2-Exception
try{
	$conn->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION );
	$conn->exec("SELECT bsbb FROM books");
}catch(PDOException $e){
	echo $e->getMessage();
}
// getCode()/getFile()/getLine()/getTrase()
/*	
echo "<pre>"; print_r($e->getTrace()[0]['args'][0]);
print_r($e->getTrace()[0]['line']);echo "<br>";
print_r($e->getTrace()[0]['class']);echo "<br>";
print_r($e->getTrace()[0]['type']);echo "<br>";
print_r($e->getTrace()[0]['args'][0]);echo "<br>";
echo "<br>";
print_r($e->getTrace()[0]);
*/