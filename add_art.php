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
	<form action="**************" method="GET">
	<div class="outer">
	<div class = "box">
		<h1> Image Preview </h1>
		<div id="displayImage">
		<img src = "Paintings/blank.jpg" id="blankImage"
		height="300"
		width="300">
	</div>
	<div class="imgInput">
		<div class="label1">
		<label for="inputFile"></label>
		<input type="file" accept="image/jpeg, image/png, image/jpg" id="inputFile">
	</div>
	</div>
	<div class="forms">
	<div>
		<label>Name Of Painting :</label>
		<input type="text" name="paintingName" id="paintingName" required>
	</div>
	<div>
		<label>
			Name Of Artist :
			</label>
			<input type="text" name="artistName" id="artistName" required>
	</div>
</div>


<button type="Submit">Submit</button>
</div>
</div>
<script>
	let blank = document.getElementById("blankImage");
let inFile = document.getElementById("inputFile");

inputFile.onchange = function(){
	blankImage.src = URL.createObjectURL(inFile.files[0]);
}
</script>

</body>
</html>