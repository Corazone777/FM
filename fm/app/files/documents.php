<!-- Display documents without images -->
<?php 
require("../config.php");
require("../view/main_bar.php");

$sql = "SELECT filename FROM fm.images WHERE filename NOT LIKE '%png' AND filename NOT LIKE '%jpeg' AND filename NOT LIKE '%jpg' AND filename NOT LIKE '%gif' ORDER BY register_date DESC";
$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($sql);
$stmt->execute();
$documents = $stmt->fetchAll();
?>
<div class="content">
<?php

foreach($documents as $docs)
{
?>
	<a href="../uploads/<?php echo $docs["filename"]?>">
	<div class="documents">
	<p><?php echo $docs["filename"]?></p>
	</div>
	<!-- Delete button -->
	<div class="delete">
	<form action="files_bin/delete/delete_documents.php" method="POST">
		<button type="submit" value=<?php echo $docs["filename"]?> name="delete">Delete</button>
	</form>
	</div>
	</a>
<?php }?>
</div>
<?php $conn = null?>
</body>
</html>
