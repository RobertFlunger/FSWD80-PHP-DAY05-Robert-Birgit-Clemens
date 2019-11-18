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

  $sql = "INSERT INTO biglibrary VALUES ('$isbn', '$title', '$image', '$publishedOn', '$description', '$type', '$availability', '$authorsn', '$authorfn', '$publisher', '$publisherad', '$publisherzip', '$publishersize')";
    
    if($conn->query($sql) === TRUE) {
      echo "<p>New Record Successfully Created</p>" ;
      echo "<a href='../create.php'><button type='button'>Back</button></a>";
      echo "<a href='../lib_dashboard.php'><button type='button'>Home</button></a>";
   } else  {
      echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?> 

