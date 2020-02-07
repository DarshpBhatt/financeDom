<?php
//This Section of Php code will test the connection to mysql server.
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
<!--Html Website Start-->
<head>
	<title>Contact Us</title>
<!--Link of external javascript and Css -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="index.js"></script>
</head>
<body>
	<div class="container" id="header">
  <img id="header" src="banner.png">
</div>

<!--Nav bar start -- >
	<div id ="topnav" class="topnav">
 <a class="nav" href="index.php">Home</a>
  <a class="nav" href="browse.php">Browse</a>
  <a class="nav" href="#contact">Contact</a>
	</div>
<!--Nav Bar End -- >
<h1>Contact-Us Form</h1>
<div id="contactUS">

<!-- PHP form Starts Here -->
<form action="" method="post" onsubmit="return validateForm()" name="myForm"> <!--Here Javascript function is used as an onclick fn for form validation -->
        <label>First Name:</label>
        <input type="text" name="fname" id="fname" required> 
        <br>
        <label>Last Name:</label>
        <input type="text" name="lname" id="lname" required>
        <br>
        <label>Phone Number:</label>
        <input type="text" name="phn" id="phn" required>
        <br>
        <label>State:</label>
        <input type="text" name="state" id="state" required>
        <br>
        <label>Email:</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label>Reason</label>
         <select id="reason" name="reason">
         	<br>
  <option value="Suggestion">Suggestion</option>
  <option value="Report_a_Bug">Report a Bug</option>
  <option value="Complaint">Complaint</option>
  <option value="Help">Help</option>
</select>
<br>
  <label>Message:</label>
        <input type="text" name="message" id="message">
        <br>
        <input type="submit" value="Submit" name="submit">
</form>
</div>

</body>

<?php
if (isset($_POST["submit"]))
{
$fname = $_POST["fname"]; 
$lname = $_POST["lname"];
$phn = $_POST["phn"];
$state = $_POST["state"];
$email = $_POST["email"];
$reason = $_POST["reason"]; 
$message = $_POST["message"]; 



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

$sql = "INSERT INTO contact (Fname,Lname,Phn,State,Email,Reason,Msg)
VALUES ('$fname' , '$lname', '$phn', '$state', '$email', '$reason','$message')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("Message successfully sent!")';
echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
</html>
