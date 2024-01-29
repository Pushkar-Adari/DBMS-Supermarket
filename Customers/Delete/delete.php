<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
$Cid = isset($_GET['Cid']) ? intval($_GET['Cid']) : 0;

$stmt = $conn->prepare("DELETE FROM customer_details WHERE Cid = ?");
$stmt->bind_param("i", $Cid);

if ($stmt->execute()) {
    echo "Record Deleted";
    echo "<script>window.location.href = '../customer.php';</script>";

} else {
    echo "Failed to Delete";
}
$stmt->close();
?>
