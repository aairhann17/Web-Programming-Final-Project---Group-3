<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<title>Image Upload - A World Of Colour </title>
	<link rel="stylesheet" href="styles.css">
</head>
<body class = "image-upload-body">
	<div class = "image-upload-body">
		<h1>Please insert your image</h1>
		<form method="POST" action="" enctype="multipart/form-data">
			<input type="file" accept="image/jpeg, image/png, image/jpg">
			<button type="submit">Upload Image</button>
		</form>

		<?php
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
			$uploadDir = 'paintings/';
			$file = $_FILES['image'];
		
			//validate file type
			$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
			if(!in_array($file['type'], $allowedTypes)) {
				echo "<p style='color: red;'>Invalid file type. Only JPEG, JPG, and PNG are allowed.</p>";
			} else {
				//generate a unique file name for the file
				$fileName = uniqid() . '-' . basename($file['name']);
				$targetPath = $uploadDir . $fileName;

				//create the upload directory if it doesn't exist
				if(!is_dir($uploadDir)) {
					mkdir($uploadDir, 0777, true);
				}

				//move the uploaded file to the targeted directory
				if(move_uploaded_file($file['tmp_name'], $targetPath)) {
					echo "<p style='color: green;'>Image Uploaded Successfully! <a href='$targetPath'>View Image</a></p>";
				} else {
					echo "<p style='color: red;'>Failed to upload the image.</p>";
				}
			}
		}		
		?>
   	</div>
</body>
