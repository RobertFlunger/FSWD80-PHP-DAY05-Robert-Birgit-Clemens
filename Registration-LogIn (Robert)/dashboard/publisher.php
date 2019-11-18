<?php 
ob_start();
session_start();

include '../dbconnect.php';
include 'functions.php';

if (isset($_GET['publisher'])) {
   	$publisher_name = $_GET['publisher'];
   	$sql = 'SELECT publisher_name, publisher_address, publisher_ZIP, publisher_size, ISBN, title, media_type FROM biglibrary WHERE publisher_name = "' .$publisher_name . '"';

   	$result = mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();  
}

?>

<html>
<head>
   	<title>The Big Library - Edit User</title>
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>



<?php

echo '<div class="container text-center mt-3">
		<h3 class="h3 font-weight-bold text-center my-2">' . $publisher_name . '</h3>
		<a href="lib_dashboard.php"><button class="btn btn-primary mb-3">Home</button></a>
	</div>';

echo "<div class='container w-80'><div class='table'>";

$cols = array('ISBN', 'title', 'author_surname', 'author_firstname', 'media_type');

createTable(runQuery($cols, 'biglibrary', 'WHERE publisher_name= "' .$publisher_name. '"'));	

echo "</div></div>";

$conn->close();
?>

</body>
</html>

<?php ob_end_flush(); ?>