<?php 
ob_start();
session_start();

?>
<html>
<head>
	<title>The Big Library - Data Insert Form</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="container mx-auto">
<div class="container text-center mt-3">
	<h1 class="h1">Input Form for new Media data</h1>
	<a href="lib_dashboard.php"><button class="btn btn-primary mb-3">Home</button></a>
</div>

<form action="actions/a_create.php" method="get">
  	<div class="form-group">
    	<label for="isbn">ISBN/ASIN</label>
    	<input type="text" class="form-control" name="ISBN" placeholder="Enter ISBN/ASIN">
  	</div>
  	<div class="form-group">
    	<label for="title">Title</label>
    	<input type="text" class="form-control" name="title" placeholder="Enter Title">
  	</div>
  	<div class="form-group">
    	<label for="image">Image</label>
    	<input type="text" class="form-control" name="image" placeholder="Enter Image Link">
  	</div>
	<div class="form-group">
    	<label for="published_on">Published On</label>
    	<input type="text" class="form-control" name="published_on" placeholder="Enter publish date">
  	</div>
  	<div class="form-group">
    	<label for="description">Description</label>
    	<input type="text" class="form-control" name="description" placeholder="Enter Description">
  	</div>
  	<fieldset class="form-group" name="media_type">
	    <div class="row">
	      	<legend class="col-form-label col-sm-2 pt-0">Media Type</legend>
	      	<div class="col-sm-10">
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="media_type" value="Book">
	          		<label class="form-check-label" for="Book">Book</label>
	        	</div>
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="media_type" value="CD">
	          		<label class="form-check-label" for="CD">CD</label>
	        	</div>
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="media_type" value="DVD">
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
	          		<input class="form-check-input" type="radio" name="availability" value="available">
	          		<label class="form-check-label" for="available">available</label>
	        	</div>
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="availability" value="reserved">
	          		<label class="form-check-label" for="reserved">reserved</label>
	        	</div>
	        </div>
	    </div>
	</fieldset>
	<div class="form-group">
    	<label for="description">Author Surname</label>
    	<input type="text" class="form-control" name="author_surname" placeholder="Enter surname of author">
  	</div>
	<div class="form-group">
    	<label for="description">Author First Name</label>
    	<input type="text" class="form-control" name="author_firstname" placeholder="Enter first name of author">
  	</div>
	<div class="form-group">
    	<label for="description">Publisher Name</label>
    	<input type="text" class="form-control" name="publisher_name" placeholder="Enter the name of the publisher">
  	</div>
	<div class="form-group">
    	<label for="description">Publisher Address</label>
    	<input type="text" class="form-control" name="publisher_address" placeholder="Enter the address of the publisher">
  	</div>
	<div class="form-group">
    	<label for="description">Publisher ZIP Code</label>
    	<input type="text" class="form-control" name="publisher_ZIP" placeholder="Enter the ZIP code of the publisher">
  	</div>

	<fieldset class="form-group" name="publisher_size">
	    <div class="row">
	      	<legend class="col-form-label col-sm-2 pt-0">Publisher Size</legend>
	      	<div class="col-sm-10">
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="publisher_size" value="small">
	          		<label class="form-check-label" for="small">small</label>
	        	</div>
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="publisher_size" value="medium">
	          		<label class="form-check-label" for="medium">medium</label>
	        	</div>
	        	<div class="form-check">
	          		<input class="form-check-input" type="radio" name="publisher_size" value="large">
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