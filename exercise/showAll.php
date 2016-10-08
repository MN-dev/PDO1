<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
<div id="page">
<div class="page-header"><h1 class="title">Books Script</h1></div>
	<ul class="nav nav-pills">
	  <li role="presentation"><a href="dashborad.php">  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Dashborad</a></li>
	  <li role="presentation"><a href="addNew.php"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> addNew</a></li>
	  <li role="presentation" class="active"><a href="showAll.php"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> ShowAll</a></li>
	</ul>
	<?php
	require '../conn.php'; 
	$sql = "SELECT * FROM  books WHERE active=1";
	$stmt = $conn->query($sql);
	$id= 0;
	 ?>
	<table class="table">
	<tr>
		<td>Id</td>
		<td>Title</td>
		<td>Author</td>

	</tr>	
	
		<?php
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			echo " <tr>
			<td>".$id++."</td>
			<td>{$row->title}</td>
			<td>{$row->author}</td>
			</tr>	";
		}
		?>	
	
	</table>

</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

