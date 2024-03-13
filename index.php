<?php

$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $isbn = $_POST["isbn"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $title = $_POST["title"];
  $description = $_POST["description"];

  $sql = "INSERT INTO Books (isbn, firstname, lastname, title, description)
  VALUES ('$isbn', '$firstname', '$lastname', '$title', '$description')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head title="Szczepanik David - PHP">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Your PHP and HTML code here -->

<div class="topnav">
  <a class="active" href="add.php">Add Book</a>
  <a href="search.php">Search Book</a>
  <a href="index.php">Book List</a>
</div>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  ISBN: <input type="text" name="isbn">
  First name: <input type="text" name="firstname">
  Last name: <input type="text" name="lastname">
  Title: <input type="text" name="title">
  Description: <textarea name="description" rows="5" cols="40"></textarea>
  <input type="submit">
</form>

</body>
</html>