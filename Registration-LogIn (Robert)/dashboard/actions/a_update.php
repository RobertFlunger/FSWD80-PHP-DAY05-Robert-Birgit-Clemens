<?php 

require_once '../../dbconnect.php';

if ($_GET) {
  $isbn = $_GET['ISBN'];
  $title = $_GET['title'];
  $title = mysqli_real_escape_string($conn, $_GET['title']);

  $image = $_GET['image'];
  $image = mysqli_real_escape_string($conn, $_GET['image']);

  $publishedOn = $_GET['published_on'];
  $description = $_GET['description'];
  $description = mysqli_real_escape_string($conn, $_GET['description']);

  $type = $_GET['media_type'];
  $availability = $_GET['availability'];
  $authorsn = $_GET['author_surname'];
  $authorfn = $_GET['author_firstname'];

  $publisher = $_GET['publisher_name'];
  $publisher = mysqli_real_escape_string($conn, $_GET['publisher_name']);

  $publisherad = $_GET['publisher_address'];
  $publisherad = mysqli_real_escape_string($conn, $_GET['publisher_address']);

  $publisherzip = $_GET['publisher_ZIP'];
  $publishersize = $_GET['publisher_size'];
  
  $sql = "UPDATE biglibrary SET title = '$title', image = '$image', published_on = '$publishedOn', description = '$description', media_type = '$type', availability = '$availability', author_surname = '$authorsn', author_firstname = '$authorfn', publisher_name = '$publisher', publisher_address = '$publisherad', publisher_ZIP = '$publisherzip', publisher_size = '$publishersize' WHERE ISBN = '$isbn';" ;

   if($conn->query($sql) === TRUE) {
      echo "<p>Successfully Updated</p>";
      echo "<a href='../update.php?ISBN=" .$isbn."'><button type='btn btn-info'>Back</button></a>";
      echo "<a href='../lib_dashboard.php'><button type='btn btn-success'>Home</button></a>";
   } else {
      echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?> 