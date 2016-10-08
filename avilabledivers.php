<?php
require 'conn.php';
$ad = $conn->getAvailableDrivers();
print_r($ad);