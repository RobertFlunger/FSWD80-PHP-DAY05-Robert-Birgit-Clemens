<?php
ob_start();
session_start();
require_once 'dbconnect.php';

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
	<title>Welcome - <?php $userRow['userName']; ?></title>
</head>
<body>
	Hi <?php echo $userRow['userName'] . "<br>"; ?>

	<a href="logout.php?logout"><button type="button" class="btn btn-warning">Sign Out</button></a>
	
</body>
</html>

<?php ob_end_flush(); ?>