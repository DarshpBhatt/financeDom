
<?php

#This Section of Php code checks the connection with sql server.
$servername = "localhost";
$username = "darsh";
$password = "Test123!";
$dbname = "finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
 echo "Connection Good";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<!-- Start of HTML5 Website -->
<head>
	<title>Home</title>
        <!-- link to JavaScript and CSS for the front end website -->
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="container" id="header">
  <img id="header" src="banner.png">
</div>
<!-- Navigation Bar Start -->
	<div class="topnav" id="myTopnav">
 <a class="nav" href="#Home">Home</a>
  <a class="nav" href="browse.php">Browse</a>
  <a class="nav" href="contact.php">Contact</a>
	</div>
<!--Navigation Bar End -->

	<div id="content">
<!--Start of PHP Form using POST method to send Data -->
	<form action="" method="post">
        <label>Search Your Financial Symbol Below:</label>
        <br>
        <input type="text" name="symbl" id="symbl" onkeyup="this.value = this.value.toUpperCase();"> 
        <br>
        <input type="submit" value="submit" name="submit">
</form>



<?php
#Start of PHP MYSQL Connection
if (isset($_POST["submit"]))
{
#Getting value of Symbol Data into PHP Variable.
$idsymbl = $_POST["symbl"];

$servername = "localhost";
$username = "darsh";
$password = "Test123!";
$dbname = "finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
#SQL string 
$sql = "SELECT Symbol, Current_Price, Date, Time ,ChangeMM , Open , High , Low , Volume FROM stocks WHERE Symbol ='$idsymbl'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table><tr><th>Symbol</th><th>Current_Price</th><th>Date</th><th>Time</th><th>Change</th><th>Open</th><th>High</th><th>Low</th><th>Volume</th><tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["Symbol"]."</td><td>". $row["Current_Price"]. "</td><td>" . $row["Date"] . "</td><td>".$row['Time']."</td><td>".$row["ChangeMM"]. "</td><td>" . $row["Open"]. "</td><td>" . $row["High"]. "</td><td>" . $row["Low"]. "</td><td>" . $row["Volume"]."</td></tr>";
    }
echo "</table>";
} else {
    echo "Error: No Such Symbol Found" . $conn->error;
}
#PHP MYSQLI Connection closed
$conn->close();
}

?>
</div>
</body>
<!--End of HTML5 Website -->
</html>



