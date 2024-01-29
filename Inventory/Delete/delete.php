<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
$Pid = isset($_GET['Pid']) ? intval($_GET['Pid']) : 0;

$stmt = $conn->prepare("DELETE FROM product_details WHERE Pid = ?");
$stmt->bind_param("i", $Pid);

if ($stmt->execute()) {
    echo "Record Deleted";
    echo "<script>window.location.href = '../inv.php';</script>";

} else {
    echo "Failed to Delete";
}
$stmt->close();
?>
