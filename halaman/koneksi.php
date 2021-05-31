<?php
$servername="localhost"; //port
$username="root";
$password="";
$dbname="spk";
//create connection
$conn = mysqli_connect($servername, $username, $password,$dbname); // Establishing Connection with Server..
//check connection
if (!$conn) {
	?> <script>alert("gagal")</script>
	<?php
	die("Connection failed: " . mysqli_connect_error());
}
?>
