<?php 
ob_start();
session_start();

require_once '../dbconnect.php';

if (isset($_GET['ISBN'])) {
   $isbn = $_GET['ISBN'];

   $sql = "SELECT * FROM biglibrary WHERE ISBN = '$isbn'" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<html>
<head>
   <title>The Big Library: Delete Media</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<h3 class="h3 text-center m-5">Do you really want to delete this media entry?</h3>

<form action ="actions/a_delete.php" method="get" class="text-center">

   <input type="hidden" name= "ISBN" value="<?php echo $data['ISBN'] ?>" />
   <button class="btn btn-success m-2" type="submit">Yes, delete it!</button>
   <a href="lib_dashboard.php"><button type="button" class="btn btn-danger m-2">No, go back!</button></a>
</form>

</body>

<?php
}
?>
</html>

<?php ob_end_flush(); ?>
