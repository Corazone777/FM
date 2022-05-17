<!-- Display just the images -->
<?php 
require("../config.php");
require("../view/main_bar.php");

$query = "SELECT filename FROM fm.images WHERE filename LIKE '%jpg' OR filename LIKE '%jpeg' OR filename LIKE '%png' OR filename LIKE '%gif' ORDER BY register_date DESC";
$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($query);
$stmt->execute();
$images_all = $stmt->fetchAll();
?>
<div class="content">
<?php

foreach($images_all as $pics)
{
?>
	<div class="framework">
	<a href="../uploads/<?php echo $pics["filename"]?>">
	<img src="../uploads/<?php echo $pics["filename"]?>" width="200" height="250" title=<?php echo $pics["filename"]?>>
		<!-- Delete button -->
	<div class="delete">
	<form action="files_bin/delete/delete_images.php" method="POST">  
	<button type="submit" value=<?php echo $pics["filename"]?>  name="delete">Delete</button>
	</form>
	</div>
	</a>
	</div>
<?php }?>
</div>
<?php $conn = null?>
</body>
</html>
