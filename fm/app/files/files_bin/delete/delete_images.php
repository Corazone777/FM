<?php
require("../../../config.php");
$sql = "DELETE FROM fm.images WHERE filename = :filename";
$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare($sql);
$stmt->bindParam(':filename', $_POST["delete"]);

$stmt->execute();
$full_path = "../../../uploads/"; 
unlink($full_path . $_POST["delete"]);

header("Location: ../../images.php?deleted");
exit();

?>
