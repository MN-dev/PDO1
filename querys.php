<?php
require 'conn.php';
// exec // query // execute
$sql = "SELECT * FROM table WHERE email='$email'";
// exec  return number fetched of the row
// exec  use it in update & delete 
// exec  not use in  select
// exec  not sec
$conn->exec($sql);
//================
// query you need to hundel data before use it
// query retuern values
$conn->query($sql);
//================ more sec
$conn->prepare($sql);
// hundel data here
$conn->execute();