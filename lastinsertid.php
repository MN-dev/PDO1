<?php

require 'conn.php';

//lastInsertId
$conn = null;
$conn->query("INSERT INTO books (title , author) VALUES ('javascript','mohy')");
echo  $id = $conn->lastInsertId();
//$conn->lastInsertId('books');
