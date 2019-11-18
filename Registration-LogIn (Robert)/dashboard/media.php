<?php 
ob_start();
session_start();

include '../dbconnect.php';

if (isset($_GET['ISBN'])) {
   $isbn = $_GET['ISBN'];
   $sql = "SELECT title, author_surname, author_firstname, ISBN, description, availability, image FROM biglibrary WHERE ISBN = '$isbn';";
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

<?php

echo '<div class="container mt-5 mx-auto" style="max-width:800px">
<div class="card mb-3 w-100" style="max-width: 800px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      	<img src="' .$data["image"]. '" class="card-img" alt="..." style="max-height: 800px">
    </div>
    <div class="col-md-8">
      	<div class="card-body h-100 d-flex flex-column justify-content-between">
	        <h3 class="card-title">' .$data["title"]. '</h3>
	        <p class="card-text font-weight-bold">Author/Director: ' .$data["author_surname"]. ' ' .$data["author_firstname"]. '</p>
	        <p class="card-text font-weight-">ISBN/ASIN: ' .$data["ISBN"]. '</p>
	        <p class="card-text">Description: ' .$data["description"]. '</p>
	    	<div class="card-footer" style="margin: 0 -20px -20px">    
		        <p class="card-text">Availability: <span class="card-text ';

		        if($data["availability"] == 'reserved') { 
		        	echo 'text-danger';
		        } else { echo 'text-success'; 
		        }; 
		        echo '">' .$data["availability"]. '</span></p>        	        
      		</div>
      	</div>
    </div>
  </div>
</div>
</div>'

?>

<div class="container text-center mt-3">
	<a href="lib_dashboard.php"><button class="btn btn-primary mb-3">Home</button></a>
</div>'

</body>
</html>

<?php ob_end_flush(); ?>