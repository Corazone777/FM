<?php
#Logic for inserting valid files into the database
include("../../config.php");
if(isset($_POST['submit']))
{
	$date = date('Y-m-d H:i:s');

	$countfiles = count(array($_FILES["file_to_upload"]["name"]));	
	$sql = "INSERT INTO fm.images (filename, name, register_date) VALUES (?, ?, ?)";
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare($sql);

	for($i = 0; $i < $countfiles; $i++)
	{
		$filename = $_FILES["file_to_upload"]["name"][$i];
		$target_file = "../../uploads/" . $filename;

		$valid_extension = array("png", "jpeg", "jpg", "gif", "zip", "tar", "txt", "xls", "doc", "gz", "pdf");
		
		if(file_exists("../../uploads/" . $filename))
		{
			header("Location: ../files.php?file_exists");
			exit();
		}

		if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"][$i], $target_file))
		{
			$stmt->execute(array($filename, $target_file, $date));
			header("Location: ../files.php?uploaded");
			exit();
		}
		else 
		{
			header("Location: ../files.php?not_uploaded");
			exit();
		}
	}
}

$conn = null;


?>
