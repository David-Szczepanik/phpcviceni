<?php
$servername = "localhost:3306";
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

  $sql = "SELECT id, isbn, firstname, lastname, title, description FROM Books WHERE isbn LIKE '%$isbn%' AND firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND title LIKE '%$title%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - ISBN: " . $row["isbn"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
    }
  } else {
    echo "0 results";
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

<div class="topnav">
    <a class="active" href="add.php">Add Book</a>
    <a href="search.php">Search Book</a>
    <a href="index.php">Book List</a>
</div>

</body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  ISBN: <input type="text" name="isbn">
  First name: <input type="text" name="firstname">
  Last name: <input type="text" name="lastname">
  Title: <input type="text" name="title">
  <input type="submit">
</form>