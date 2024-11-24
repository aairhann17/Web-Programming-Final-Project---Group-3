<?php
require_once('config.inc.php');
$sql = "SELECT * FROM uploadedPaintings";
$conn = new mysqli(HOST, USER, PASSWORD, DB, PORT);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['PaintingName'] . " by " . $row['Artist'] . " (" . $row['Year'] . ")</h3>";
        echo "<img src='" . $row['PaintingPath'] . "' alt='" . $row['PaintingName'] . "' width='300'>";
        echo "</div>";
    }
} else {
    echo "No paintings found.";
}

$conn->close();
?>
