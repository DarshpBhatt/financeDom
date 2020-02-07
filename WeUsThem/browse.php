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
	<title>Browse</title>
<!--Links for Css and Javascript for front-end website -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="container" id="header">
  <img id="header" src="banner.png">
</div>
<!--Navigation Bar Start -->
	<div id ="topnav" class="topnav">
 <a class="nav" href="index.php">Home</a>
  <a class="nav" href="#Browse">Browse</a>
  <a class="nav" href="contact.php">Contact</a>
	</div>
<!--Navigation Bar End -->
<div id="content">

<!--Start of PHP Form -->
<form action="" method="post">
  <label>Search symbol starting with the alphabet :</label>
  <select id="alphabet" name="alphabet">
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
  <option value="E">E</option>
  <option value="F">F</option>
  <option value="G">G</option>
  <option value="H">H</option>
  <option value="I">I</option>
  <option value="J">J</option>
  <option value="K">K</option>
  <option value="L">L</option>
  <option value="M">M</option>
  <option value="N">N</option>
  <option value="O">O</option>
  <option value="P">P</option>
  <option value="Q">Q</option>
  <option value="R">R</option>
  <option value="S">S</option>
  <option value="T">T</option>
  <option value="U">U</option>
  <option value="V">V</option>
  <option value="W">W</option>
  <option value="X">X</option>
  <option value="Y">Y</option>
  <option value="Z">Z</option>
  </select> 
        <br>
        <input type="submit" value="submit" name="submit" onclick="display()">
</form>
<!--End of PHP Form -->
<div id="spldata">
	<label id="lbl">Here is the Data about the symbol You Requested:</label><br>
<?php
#This section of PHP Code is Going to find the symbol based on its first chararcter. 
if(isset($_POST['submit'])){

$idsymbl = $_POST["alphabet"];

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
//SQl Query
$sql = "SELECT Symbol, Current_Price, Date, Time ,ChangeMM , Open , High , Low , Volume FROM stocks WHERE Symbol Like '$idsymbl%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table><tr><th>Symbol</th><th>Current_Price</th><th>Date</th><th>Time</th><th>Change</th><th>Open</th><th>High</th><th>Low</th><th>Volume</th><tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["Symbol"]."</td><td>". $row["Current_Price"]. "</td><td>" . $row["Date"] . "</td><td>".$row['Time']."</td><td>".$row["ChangeMM"]. "</td><td>" . $row["Open"]. "</td><td>" . $row["High"]. "</td><td>" . $row["Low"]. "</td><td>" . $row["Volume"]."</td></tr>";
    }
echo "</table>";
} else {
echo '<script language="javascript">';
echo 'alert("No Result Found!")';
echo 'document.getElementById("lbl").innerHTML="No Data with that alphabet found";';
echo '</script>';
}
//Mysqli Connection Closed.
$conn->close();
}
?>
</div>

<br>
<!--This div will show all the data in the tabular form in ascending order -->
<div id="nrmlData">
<?php
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

$sql = "SELECT Symbol, Current_Price, Date, Time ,ChangeMM , Open , High , Low , Volume FROM stocks ORDER BY Symbol";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table><tr><th>Symbol</th><th>Current_Price</th><th>Date</th><th>Time</th><th>Change</th><th>Open</th><th>High</th><th>Low</th><th>Volume</th><tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["Symbol"]."</td><td>". $row["Current_Price"]. "</td><td>" . $row["Date"] . "</td><td>".$row['Time']."</td><td>".$row["ChangeMM"]. "</td><td>" . $row["Open"]. "</td><td>" . $row["High"]. "</td><td>" . $row["Low"]. "</td><td>" . $row["Volume"]."</td></tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</div>

</div>

</body>
<!--Html5 Website End -->
</html>
