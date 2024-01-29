<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
$EID = isset($_GET['EID']) ? intval($_GET['EID']) : 0;

$stmt = $conn->prepare("DELETE FROM employee_details WHERE EID = ?");
$stmt->bind_param("i", $EID);

if ($stmt->execute()) {
    echo "Record Deleted";
    echo "<script>window.location.href = '../emp.php';</script>";
} else {
    echo "Failed to Delete";
}
$stmt->close();
?>
