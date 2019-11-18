<?php

ob_start();
session_start();
if ( isset($_SESSION['user']) != "") {
	header("Location: dashboard/lib_dashboard.php");
	exit;
}

include_once "dbconnect.php";
$error = false;

if ( isset($_POST['btn-signup']) ) {
	// sanitize input to prevent sql injection
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);

	// Basic name validation
	if ( empty($name) )	{
		$error = true;
		$nameError = "Please enter your full name.";
	} else if ( strlen($name) < 3) {
		$error = true;
		$nameError = "Name must have at least 3 characters.";
	} else if ( !preg_match("/^[a-zA-Z]+$/", $name) ) {
		$error = true;
		$nameError = "Name must contain alphabet and spaces only.";
	}

	$errors = array();
	// Basic email validation
	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter a valid email address.";
	} else {
		$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		if ( $count != 0 ) {
			$error = true;
			/*$emailError = "Provided email address is already in use.";*/
			$errors[] = "Provided email address is already in use.";
		}
	}

	// Password validation
	// could also do: '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m';
	
	if ( empty($pass) ) {
		$error = true;
		/*$passError = "Please enter a password.";*/
		$errors[] = "Please enter a password.";
	} 
	if ( strlen($pass) < 6 ) {
		$error = true;
		/*$passError = "Password must have at least 6 characters.";*/
		$errors[] = "Password must have at least 6 characters.";
	} 
	if ( !preg_match("/\d/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 digit.";*/
		$errors[] = "Password must have at least 1 digit.";
	} 
	if ( !preg_match("/[A-Z]/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 capital letter.";*/
		$errors[] = "Password must contain at least 1 capital letter.";
	} 
	if ( !preg_match("/[a-z]/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 small letter.";*/
		$errors[] = "Password must contain at least 1 small letter.";
	} 
	if ( !preg_match("/\W/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 special character.";*/
		$errors[] = "Password must contain at least 1 special character.";
	} 
	if ( preg_match("/\s/", $pass) ) {
		$error = true;
		/*$passError = "Password must not contain any white spaces.";*/
		$errors[] = "Password must not contain any white spaces.";
	}

	// Password validation
	$password = hash('sha256', $pass);

	// if no error continue signup 
	if ( !($error) ) {
		$query = "INSERT INTO users(userName, userEmail, userPass) 
					VALUES ('$name', '$email', '$password')";
		$result = mysqli_query($conn, $query);

		if ( $result ) {
			$errType = "success";
			$errMsg = "Succesfully registered. You may login now.";
			unset($name);
			unset($email);
			unset($pass);
		} else {
			$errType = "danger";
			$errMsg = "Something went wrong. Please try again  later.";
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
		<h2>Sign Up</h2>
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
		
		<input type="text" name="name" class="form-control my-3" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>"/>
			<span class="text-danger"><?php echo $nameError; ?></span>
		<input type="email" name="email" class="form-control my-3" placeholder="Enter Your Email" maxlength="50" value="<?php echo $email ?>"/>
			<span class = "text-danger"><?php echo $emailError; ?></span>

		<input type="password" name="pass" class="form-control my-3" placeholder="Enter Your Password" maxlength="20"/>
			<span class="text-danger">
				<?php if ($errors) {
					foreach ($errors as $error) {
						echo $error . "<br>";
					}
					
				} /*else {
					echo "$pass MATCH \n";
				}*/ ?> 
			</span>
			<hr>
		<div class="text-center">

			<button type="submit" class="btn btn-primary mt-3" name="btn-signup">Sign Up!</button>
			<hr>
			<h4>Already registered?</h4>
			<a href="index.php"><button type="button" class="btn btn-success mt-3">Sign in here</button></a>
		</div>
	</form>
</div>

</body>
</html>
<?php ob_end_flush(); ?>