<!DOCTYPE html>
<!-- Main header when user is logged in -->
<?php require("user_error.php")?>

<?php $title = "Internal Server"?>
<html lang="en">
<head>
<!-- CSS -->
<style>
header {
	width: 100%;
	display: flex;
	justify-content: center;
}
header a {
	margin-left: 1em;
}

.time {
	width: 100%;
	display: grid;
	justify-content: center;
	margin-top: 10px;
}
.user{
	width: 100%;
	display: flex;
	justify-content: center;
	margin-top: 1em;
	margin-bottom: 3em;
}

.content {
	width: 100%;
	display: grid;
	justify-content: center;
	grid-template-columns: repeat(4, 200px);
	grid-row-gap: 2.5em;
	grid-column-gap: 2.4em;
	margin-top: 2em;
}

.content p{
	word-wrap: break-word;
	text-align: center;
	margin-top: 0;
}

a{
	text-decoration: none;
	color:black;
}

.upload {
	width: 100%;
	display: grid;
	justify-content: center;
}

.documents {
	border: 1px solid black;
	width: 200px;
	height: 250px;
	background-color: black;
}

.documents p {
	margin-top: 20px;
	color: white;
}

.delete {
	margin-top: 3px;
	margin-left: 70px;
}

.framework img {
	border: 1px solid black;
}


</style>
<!-- End of CSS -->
	<meta charset="UTF-8">
	<title><?php echo $title?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>	
	<header>
	<a href="files.php"><h2>Homepage</h2></a>
	<a href="documents.php"><h2>Documents</h2></a>
	<a href="images.php"><h2>Images</h2></a>
	</header>

	<div class="time">
	<?php include("../view/includes/time.php")?>
	</div>

	<div class="user">
	<span><?php echo "{$_SESSION['username']}"?>
	<button><a href="../classes/logout.php">Logout</a></button></span>
	</div>

	<div class="upload">
		<h3>Upload Files</h3>
		<form action="../files/files_bin/files_all.php" method="POST" enctype="multipart/form-data">
			Upload:
			<input type="file" name="file_to_upload[]" id="file_to_upload">
			<input type="submit" value="Upload" name="submit">
		</form>
	</div>
