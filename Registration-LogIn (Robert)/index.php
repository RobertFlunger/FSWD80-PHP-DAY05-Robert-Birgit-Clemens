<?php 
ob_start();
session_start();
require_once 'dbconnect.php';

// can't open index when logged in
if ( isset($_SESSION['user']) != "") {
	header("Location: dashboard/lib_dashboard.php");
	exit;
}

$error = false;

if ( isset($_POST['btn-login'])) {

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);

	if (empty($email)) {
		$error = true;
		$emailError = "Please enter your email address.";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter a valid email address.";
	}

	if (empty($pass)) {
		$error = true;
		$passError = "Please enter your password.";
	}

	if (!$error) {

		$password = hash('sha256', $pass);

		$res = mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail = '$email'");
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$count = mysqli_num_rows($res);

		if ($count == 1 && $row['userPass'] == $password) {
			$_SESSION['user'] = $row['userId'];
			header('Location: dashboard/lib_dashboard.php');
		} else {
			$errMsg = "Incorrect Credentials. Please try again.";
		}
	}
}

?>

<html>
<head>
	<title>Login & Registration System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container w-25 p-4 mt-5 border rounded">
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
		<h2>Sign In</h2>
		<hr>

		<?php 
			if ( isset($errMsg) ) {
		?>
		
		<div class="alert alert-<?php echo $errType ?>">
			<?php echo $errMsg; ?>
		</div>

		<?php 
			}
		?>

		<input type="email" name="email" class="form-control my-3" placeholder="Enter Your Email" maxlength="50" value="<?php echo $email ?>"/>
			<span class = "text-danger"><?php echo $emailError; ?></span>

		<input type="password" name="pass" class="form-control my-3" placeholder="Enter Your Password" maxlength="20"/>
			<span class="text-danger">
				<?php echo $passError; ?> 
			</span>
		<hr>
		<div class="text-center">
		<button type="submit" class="btn btn-primary mt-3" name="btn-login">Sign In!</button>
		<hr>

		<a href="register.php"><button type="button" class="btn btn-success mt-3">Sign up here.</button></a>
	</form>
	
	</div>

</body>
</html>
<?php ob_end_flush(); ?>