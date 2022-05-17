<?php
#Logging out function
session_start();
unset($_SESSION['username']);
header("Location: ../view/index.php");
exit();
?>
