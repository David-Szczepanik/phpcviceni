
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


<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "library";

// Vytvoření spojení
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola spojení
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, isbn, firstname, lastname, title, description FROM Books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // výpis dat každého řádku
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - ISBN: " . $row["isbn"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>



