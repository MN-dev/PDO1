<?php

require 'conn.php';

// rowCount() || columnCount

//mysql_num_rows(result)
$sql  = "SELECT * FROM books WHERE author =:author";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':author','hunter',PDO::PARAM_STR);
$stmt->execute();
echo "(".$stmt->rowCount().") books found <br>";

