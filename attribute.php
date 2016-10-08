<?php

require 'conn.php';
/*
echo $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS); 
echo "<br>";
echo $conn->getAttribute(PDO::ATTR_DRIVER_NAME);
*/

$conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);