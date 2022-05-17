<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['username'] == "")
{
echo "<div class=error>
		<h2>You are not autorized to view this page</h2>
		<p><a href=../view/index.php>Click here to login</a></p>
		</div>";
die();
}
?>
