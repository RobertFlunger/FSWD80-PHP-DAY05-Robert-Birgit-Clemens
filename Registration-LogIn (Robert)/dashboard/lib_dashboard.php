<?php 
# Connect to DB

ob_start();
session_start();
require_once '../dbconnect.php';

if ( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}

$query = "SELECT * FROM users WHERE userId =" .$_SESSION['user'];

$res = mysqli_query($conn, $query);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<html>
<head>
	<title>Big Library by Robert Flunger</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>


<h1>Hi <?php echo $userRow['userName'] . "<br>"; ?></h1>
<a href="../logout.php?logout"><button type="button" class="btn btn-warning">Sign Out</button></a>

<div class="container text-center w-50 mt-3">
<h1 class="h1 text-center">The Big Library</h1>
<h3 class="h3 text-center mb-3">Showing you all the info on your favorite media you'll ever need. THE most extensive list ever!</h3>
<a href="create.php"><button class="btn btn-primary mb-3">Add new media entry</button></a>
</div>


<?php 

include('functions.php');

echo "<div class='w-80'>";
echo "<div class='table'>";
createTable(runQuery('*', 'biglibrary'));
echo "</div></div>";

?>

</body>
</html>