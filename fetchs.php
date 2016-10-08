<?php
require 'conn.php';
//

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

$sql = "SELECT * FROM books LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetchAll()){
echo "<pre>"; 
print_r($row);
}

/* change mods  PDO::FETCH_****
while ($row = $stmt->fetch(PDO::FETCH_LAZY)){
echo "<pre>"; 
print_r($row);
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
echo "<pre>"; 
print_r($row);
}

while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
echo $row->title;
}
*/
// fetch() || fetchAll()  لجلب الداتا like array
/* 
$row = $stmt->fetch();
$row['title'];
*/
/* to get data from database we use 'fech or fetchAll'
//fech return values like array

//fetchAll return values in small arrays in Big one array 
*/