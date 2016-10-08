<?php

require 'conn.php';

# exec | querhy | prrpare/execute

# insert / update / delete | select
$title = 'bindvalue';
$author = 'bindvalue';
$id = 1;
/*
$conn->exec("update books set title = '$title' , author = '$author'  where id = '$id'");
//====
$conn->query("update books set title = '$title' , author = '$author'  where id = '$id'");
//====
$stmt = $conn->prepare("update books set title=:title , author=:author where id=:id");
$stmt->bindparam(':title',$title , PDO::PARAM_STR);
$stmt->bindparam(':author',$author , PDO::PARAM_STR);
$stmt->bindparam(':id',$id , PDO::PARAM_INT);
$stmt->execute();
//====
$stmt = $conn->prepare("update books set title=:title , author=:author where id=:id");
$stmt->bindvalue(':title',$title , PDO::PARAM_STR);
$stmt->bindvalue(':author',$author , PDO::PARAM_STR);
$stmt->bindvalue(':id',$id , PDO::PARAM_INT);
$stmt->execute();
*/