<?php 
ob_start();
session_start();

include '../dbconnect.php';

if (isset($_GET['ISBN'])) {
   $isbn = $_GET['ISBN'];

   $sql = "SELECT * FROM biglibrary WHERE ISBN = '$isbn';" ;

   $result = mysqli_query($conn, $sql);

   $data = $result->fetch_assoc();

   $conn->close();
}

?>

<html>
<head>
   <title>The Big Library - Edit User</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<div class="container mx-auto">
<div class="container text-center mt-3">
	<h3 class="h3 text-center">Input Form for new Media data</h3>
	<a href="lib_dashboard.php"><button class="btn btn-primary mb-3">Home</button></a>
</div>

<form action="actions/a_update.php" method="get">
  	<div class="form-group">
    	<label for="isbn">ISBN/ASIN</label>
    	<input type="text" class="form-control" name="ISBN" value="<?php echo $data['ISBN'] ?>">
  	</div>
 	<div class="form-group">
      	<label for="title">Title</label>
      	<input type="text" class="form-control" name="title" value="<?php echo $data['title'] ?>">
  	</div>
  <div class="form-group">
      	<label for="image">Image</label>
      	<input type="text" class="form-control" name="image" value="<?php echo $data['image']?>">
  </div>
  	<div class="form-group">
      	<label for="published_on">Published On</label>
      	<input type="text" class="form-control" name="published_on" value="<?php echo $data['published_on'] ?>">
  </div>
  <div class="form-group">
      	<label for="description">Description</label>
      	<input type="text" class="form-control" name="description" value="<?php echo $data['description'] ?>">
  </div>
  <fieldset class="form-group" name="media_type">
  	    <div class="row">
  	      	<legend class="col-form-label col-sm-2 pt-0">Media Type</legend>
  	      	<div class="col-sm-10">
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="media_type" value="Book" <?php if($data['media_type'] == "Book") {echo 'checked';}; ?> />
  	          		<label class="form-check-label" for="Book">Book</label>
  	        	</div>
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="media_type" value="CD" <?php if($data['media_type'] == "CD") {echo 'checked';}; ?> />
  	          		<label class="form-check-label" for="CD">CD</label>
  	        	</div>
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="media_type" value="DVD" <?php if($data['media_type'] == "DVD") {echo 'checked';}; ?> />
  	          		<label class="form-check-label" for="DVD">DVD</label>
  	        	</div>
  	        </div>
  	    </div>
   	</fieldset>
  	<fieldset class="form-group" name="availability">
  	    <div class="row">
  	      	<legend class="col-form-label col-sm-2 pt-0">Availability</legend>
  	      	<div class="col-sm-10">
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="availability" value="available" <?php if($data['availability'] == "available") {echo 'checked';}; ?> >
  	          		<label class="form-check-label" for="available">available</label>
  	        	</div>
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="availability" value="reserved" <?php if($data['availability'] == "reserved") {echo 'checked';}; ?> >
  	          		<label class="form-check-label" for="reserved">reserved</label>
  	        	</div>
  	        </div>
  	    </div>
  	</fieldset>
  	<div class="form-group">
      	<label for="description">Author First Name</label>
      	<input type="text" class="form-control" name="author_surname" value="<?php echo $data['author_surname'] ?>">
 	</div>
  	<div class="form-group">
      	<label for="description">Author Surname</label>
      	<input type="text" class="form-control" name="author_firstname" value="<?php echo $data['author_firstname'] ?>">
  	</div>
  	<div class="form-group">
      	<label for="description">Publisher Name</label>
      	<input type="text" class="form-control" name="publisher_name" value="<?php echo $data['publisher_name'] ?>">
  	</div>
  	<div class="form-group">
      	<label for="description">Publisher Address</label>
      	<input type="text" class="form-control" name="publisher_address" value="<?php echo $data['publisher_address'] ?>">
  	</div>
  	<div class="form-group">
      	<label for="description">Publisher ZIP Code</label>
      	<input type="text" class="form-control" name="publisher_ZIP" value="<?php echo $data['publisher_ZIP'] ?>">
  	</div>
 
  	<fieldset class="form-group" name="publisher_size">
  	    <div class="row">
  	      	<legend class="col-form-label col-sm-2 pt-0">Publisher Size</legend>
  	      	<div class="col-sm-10">
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="publisher_size" value="small" <?php if($data['publisher_size'] == "small") {echo 'checked';}; ?> />
  	          		<label class="form-check-label" for="small">small</label>
  	        	</div>
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="publisher_size" name="gridRadios7" value="medium" <?php if($data['publisher_size'] == "medium") {echo 'checked';}; ?> />
  	          		<label class="form-check-label" for="medium">medium</label>
  	        	</div>
  	        	<div class="form-check">
  	          		<input class="form-check-input" type="radio" name="publisher_size" name="gridRadios8" value="large" <?php if($data['publisher_size'] == "large") {echo 'checked';}; ?> />
  	          		<label class="form-check-label" for="large">large</label>
  	        	</div>
  	        </div>
  	    </div>
  	</fieldset>
  
  	<button type="submit" class="btn btn-primary">Submit Data</button> 
</form>
</div>

</body>
</html>

<?php ob_end_flush(); ?>