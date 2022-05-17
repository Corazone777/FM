<!DOCTYPE html>
<!-- Main page of the website where content is displayed -->
<?php require("../config.php")?>
<?php require("../view/main_bar.php")?>	

<!-- connecting to the database and displaying contents of if -->
<?php
$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM fm.images ORDER BY register_date DESC");
$stmt->execute();
$image_list = $stmt->fetchAll();
?>

<div class="content">
<?php
foreach($image_list as $image)
{
	$title = $image["filename"];
	if(preg_match("/jpg/", $title) || preg_match("/jpeg/", $title) || preg_match("/png/", $title) || preg_match("/gif/", $title)) 
	{
?>
		<div class="framework">
		<a href="../uploads/<?php echo $image["filename"]?>">
		<img src="../uploads/<?php echo $image["filename"]?>" width="200" height="250">
		<!-- Delete button -->
		<div class="delete">
		<form action="files_bin/delete/delete.php" method="POST">
		<button type="submit" value=<?php echo $image["filename"] ?> name="delete">Delete</button>
		</form>
		</div>
		</a>
		</div>
<?php } 
	else 
	{
?>
		<div class="framework">
		<a href="../uploads/<?php echo $image["filename"]?>">
		<div class="documents">
		<p><?php echo $image["filename"]?></p>
		</div>
		<!-- Delete button -->
		<div class="delete">
		<form action="files_bin/delete/delete.php" method="POST">
			<button type="submit" value=<?php echo $image["filename"]?> name="delete">Delete</button>
		</form>
		</div>
		</a>
		</div>
<?php }} ?>
<?php $conn = null?>
</div>
</body>
</html>
