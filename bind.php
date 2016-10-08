<?php  // hundel data using execute function //

// if size big more then 4 kb use PDO::PARAM_LOB
require 'conn.php';

$sql = "SELECT id, name FROM table
		WHERE id=? AND name=?";
/* to secure  use placeholders + bindparam ($placeholders,$value,$datatype)   :id :name or ? ? // ينوب عن كتابت الفاليو داخل جملة الكويري 
*/ 
$id = 1;
$name = "Mahmoud";

$conn->prepare($sql);
//$conn->bindparam($placeholders , $value , $datatype) //bindparam is function  use 3 paramitars
$conn->bindparam(1, $id , PDO::PARAM_INT);
$conn->bindparam(2 , $name , PDO::PARAM_STR);
//$conn->execute(array(':id' => $id, ':name' => $name));
$conn->execute();
//*================== bindValue 
/*
$conn->prepare($sql);
$conn->bindValue(:id , $id , PDO::PARAM_INT);
$conn->bindValue(:name , $name , PDO::PARAM_STR);
$conn->execute();
$conn->bindColumn(1,$gid);
$conn->bindColumn(2,$gname); // 2 paramiter
// bindColumn() use it  after execute return values and save it in $var
*/ 
echo $id;
