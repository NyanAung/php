<?php   require 'auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Category</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body> 

	<?php require 'navbar.php';?>

	<h1 align="center"> Category Page</h1>

	<div class="container-fluid">

<div class="row">
			<div class="col-md-4">
				<h3 class="bg-info text-white p-3">All Category</h3>

<ul class="list-group">

<?php 

$query = " SELECT * FROM category ORDER BY cat_id DESC";

$result = mysqli_query($conn,$query);

while ($array =mysqli_fetch_assoc($result)) {
		
?>

<li class="list-group-item">
		<div class="d-flex justify-content-between align-items-center">
			<p><?php echo $array['cat_name']; ?></p>
		
    <div>
		<a href="cat-edit.php?id=<?php echo $array['cat_id'] ?>" class="btn btn-outline-info">Edit</a>
		<a href="cat-del.php?id=<?php echo $array['cat_id'] ?>" class="btn btn-outline-danger">DELETE</a>
	</div>	
				
</div>
</li>
	
<?php } ?>
</ul>

	</div>

	<div class="col-md-8">
		
		<h3 class="bg-info text-white p-3">Add Category</h3>

<?php 
if (isset($_POST['add'])) {
	$name = strip_tags($_POST['category']);

	$sql = " INSERT INTO category (cat_name) VALUES ('$name')";

	if ($name == '') {
		$msg ="Please Add Category Name";
	}else{
		$result = mysqli_query($conn,$sql);

		if ($result) {
			$msg = "Category Added";
			header('location: category.php');
		}
	}
}
 ?>	

<form method="post" action="">
			
<div class="form-group">
	<label>Category Name</label> <span class="text-info">
		<?php if(isset($msg)){ echo $msg; } ?>
    </span>
				<input type="text" name="category" class="form-control">
				
			</div>

			<div class="form-group">
				<input type="submit" name="add" class="btn btn-info" value="Add New">
				
			</div>
		</form>
	</div>
</div>
</div>
	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>
</html>