<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Artist Upload - A World Of Colour </title>
	<link rel="stylesheet" href="styles.css">
</head>

<body class="userImage">
	<!-- Navigation Bar -->
	<div class="navbar">
		<a href="home.php">Home</a>
		<a href="artists.php">Artists</a>
		<a href="home.php#about">About Us</a>
		<a href="#contact">Contact</a>
		<a href="login.php">Login</a>
		<a href="account.php">Sign Up</a>
		<a href="add_art.php">Add Art</a>
	</div>
	<form action="uploadimg.php" method="POST" enctype="multipart/form-data">
		<div class="outer">
			<div class="box">
				<h1> Image Preview </h1>
				<div id="displayImage">
					<!-- Default Image -->
					<img src="Paintings/blank.jpg" id="blankImage" height="300" width="300">
				</div>
				<div class="imgInput">
					<div class="label1">
						<!-- File Input with correct name -->
						<label for="inputFile">Choose Image:</label>
						<input type="file" accept="image/jpeg, image/png, image/jpg" id="inputFile" name="inputFile" onchange="previewImage(event)" required>
					</div>
				</div>
				<div class="forms">
					<div>
						<label for="paintingName">Name Of Painting:</label>
						<input type="text" name="paintingName" id="paintingName" required>
					</div>
					<div>
						<label for="artistName">Name Of Artist:</label>
						<input type="text" name="artistName" id="artistName" required>
					</div>
					<div>
						<label for="year">Year Painted:</label>
						<input type="number" name="year" id="year" required>
					</div>
				</div>
				<button type="submit">Submit</button>
			</div>
		</div>
	</form>
	<script>
		function previewImage(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output = document.getElementById('blankImage');
				output.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>

</body>

</html>