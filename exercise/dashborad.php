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
	  <li role="presentation" class="active"><a href="dashborad.php">  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Dashborad</a></li>
	  <li role="presentation"><a href="addNew.php"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> addNew</a></li>
	  <li role="presentation"><a href="showAll.php"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> ShowAll</a></li>
	</ul>

<?php   
error_reporting("E_ALL & ~E_NOTIC");
	require'../conn.php';
	if($_GET['box'] == 'active') {

		$id = intval($_GET['id']);
		
		$sql = "UPDATE books SET active=1 WHERE id=:id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		header("Location: dashborad.php");

	} elseif ($_GET['box'] == 'unactive') {

		$id = intval($_GET['id']);
		
		$sql = "UPDATE books SET active=0 WHERE id=:id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		header("Location: dashborad.php");

	} 
	elseif ($_GET['box'] == 'edit') {
		$id = intval($_GET['id']);
		$sql = "SELECT * FROM books WHERE id='$id'";
		$stmt = $conn->query($sql);
		$row = $stmt->fetch(PDO::FETCH_OBJ);

		if(isset($_POST['edit'])){
			$title = $_POST['title'];
			$author = $_POST['author'];
			$update = "UPDATE books SET title=:title,author=:author WHERE id='$id'";
			$updateStmt = $conn->prepare($update);
			$updateStmt->bindParam(':title' ,$title,PDO::PARAM_STR); 
			$updateStmt->bindParam(':author' ,$author,PDO::PARAM_STR); 
			$updateStmt->execute();

			header("Location: dashborad.php");
		}
		?>

		<form class="form-horizontal" acton="" method="post">
		<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput-0">Title</label>
  <div class="controls">
    <input id="textinput-0" name="title" type="text" value="<?php echo $row->title; ?>" placeholder="Title" class="input-xlarge">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput-1">Author</label>
  <div class="controls">
    <input id="textinput-1" name="author" type="text" value="<?php echo $row->author; ?>" placeholder="Author" class="input-xlarge">
      </div>
</div>
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton-0"></label>
  <div class="controls">
    <button id="singlebutton-0" name="edit" class="btn btn-primary">Edit</button>
  </div>
</div>

		<?php 
	}elseif($_GET['box'] == 'delete') {
		$id = intval($_GET['id']);
		$sql = "DELETE FROM books WHERE id='$id'";
		$stmt = $conn->query($sql);

		header("Location: dashborad.php");
	}
	else{

	$sql 	= "SELECT * FROM books ORDER BY id";
	$stmt	= $conn->query($sql);
	$count	= $stmt->rowCount();
	$id=1;
	if($count){
		
	
	?>
	<table class="table">
		<tr>
			<td>ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Status</td>
			<td>Edit || Delete </td>
		</tr>
		<?php  
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			if($row->active == 1) {
							echo "
				<tr>
					<td>".$id++."</td>
					<td>{$row->title}</td>
					<td>{$row->author}</td>
					<td><a href='dashborad.php?box=unactive&id={$row->id} '>un active</a></td>
					<td><a href='dashborad.php?box=edit&id={$row->id}'>Edit </a> || 
					<a href='dashborad.php?box=delete&id={$row->id}'>Delete </a></td>
				</tr>
				";}
			elseif($row->active == 0){
				echo "
				<tr>
					<td>".$id++."</td>
					<td>{$row->title}</td>
					<td>{$row->author}</td>
					<td><a href='dashborad.php?box=active&id={$row->id}selected'>active</a></td>
					<td><a href='dashborad.php?box=edit&id={$row->id}'>Edit </a> || 
					<a href='dashborad.php?box=delete&id={$row->id}'>Delete </a></td>
				</tr>
				";
			}
		}
		?>
	</table>
</div>

<?php }else{
		
			}
}			

?>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
