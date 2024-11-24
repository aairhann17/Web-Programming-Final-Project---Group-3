<?php
// Create a connection to the database
require_once('config.inc.php');
$conn = new mysqli(HOST, USER, PASSWORD, DB, PORT);

// Check connection for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $painting_name = $_POST['paintingName'];
    $artist = $_POST['artistName'];
    $year = $_POST['year'];

    // Handle file upload
    if (isset($_FILES['inputFile']) && $_FILES['inputFile']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['inputFile']['tmp_name'];
        $imageName = $_FILES['inputFile']['name'];
        $imageSize = $_FILES['inputFile']['size'];
        $imageType = $_FILES['inputFile']['type'];

        // Set the target directory where images will be stored
        $uploadDir = "uploads/"; // Ensure this directory exists or create it

        // Create a unique filename to avoid conflicts
        $uniqueName = uniqid() . "-" . basename($imageName);
        $targetFilePath = $uploadDir . $uniqueName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpPath, $targetFilePath)) {
            // Insert data into the database
            $sql = "INSERT INTO uploadedPaintings (PaintingPath, PaintingName, Artist, Year) VALUES (?, ?, ?, ?)";
            
            // Prepare and bind
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssi", $targetFilePath, $painting_name, $artist, $year);

                if ($stmt->execute()) {
                    echo "Painting uploaded successfully!";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading file!";
        }
    } else {
        echo "No file uploaded or there was an error with the file!";
    }
}

$conn->close();
?>
