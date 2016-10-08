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
<?php
if (isset($_POST['add-new'])) {
	$title 	= $_POST['title'];
	$author = $_POST['author'];
	$active = $_POST['active'];
	$errors  = array();
	if ( empty($title) || empty($author) )
	{
		$errors[] = "All Fields Required";
	}else{ include '../conn.php';
		$sql = "INSERT INTO books (title, author, active) VALUES(?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1,$title,PDO::PARAM_STR);
		$stmt->bindParam(2,$author,PDO::PARAM_STR);
		$stmt->bindParam(3,$active,PDO::PARAM_INT);
		$stmt->execute();
		$success = "The Book Has been added";
			}
							 }
?>

<div id="page">
<div class="page-header"><h1 class="title">Books Script</h1></div>
	<ul class="nav nav-pills">
	  <li role="presentation"><a href="dashborad.php">  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Dashborad</a></li>
	  <li role="presentation"  class="active"	><a href="addNew.php"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> addNew</a></li>
	  <li role="presentation"><a href="showAll.php"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> ShowAll</a></li>
	</ul>


	<form class="form-horizontal" action="" method="POST" >
<fieldset>
<br>
<?php  

if(isset($success))
{
echo '
	<div class="alert alert-success">'.$success.'</div>
';
}

if (isset($errors)){
 foreach ($errors as $error) {
	echo '
	<div class="alert alert-danger">'.$error.'</div>
	';
}
} ?>
<!-- Form Name -->
<legend>Form Add</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput-0">Title</label>
  <div class="controls">
    <input id="textinput-0" name="title" type="text" placeholder="Title" class="input-xlarge">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput-1">Author</label>
  <div class="controls">
    <input id="textinput-1" name="author" type="text" placeholder="Author" class="input-xlarge">
      </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="selectbasic-1">Status</label>
  <div class="controls">
    <select id="selectbasic-1" name="active" class="input-xlarge">
      <option value="0">An Active</option>
      <option value="1" selected >Active</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton-0"></label>
  <div class="controls">
    <button id="singlebutton-0" name="add-new" class="btn btn-primary">Add</button>
  </div>
</div>

</fieldset>
</form>


</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


