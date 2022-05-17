<?php
#Logic for logging into the website
session_start();
require("../config.php");

$username = User::test_input($_POST['username']);
$password = User::test_input($_POST['password']);

$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT username, password FROM fm.users WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->execute([':username' => $username]);


$row = $stmt->fetch(PDO::FETCH_ASSOC);

//If username matches the fetch, and password is the same continue
if($row && password_verify($password, $row['password']))
{
	$_SESSION['username'] = $row['username'];
	header("Location: ../files/files.php");
	exit();
}
else 
{
	include("../view/index.php");
	echo'<p style="text-align: center;">Wrong username/password combination!</p><br>';
}

$conn = null;

?>

