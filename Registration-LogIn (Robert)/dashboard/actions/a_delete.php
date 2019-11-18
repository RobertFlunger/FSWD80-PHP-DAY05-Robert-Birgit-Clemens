<?php 

require_once '../../dbconnect.php';

if ($_GET) {
   	$isbn = $_GET['ISBN'];
   
   	$sql = "DELETE FROM biglibrary WHERE ISBN = '$isbn'";

    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../lib_dashboard.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>

