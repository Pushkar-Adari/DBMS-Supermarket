<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cid = $_POST["Cid"];
    $name = $_POST["Name"];
    $Phone_Number=$_POST["Phone_Number"];
    $Address = $_POST["Address"];
    $Age = $_POST["Age"];
    $Cspent = $_POST["Cspent"];
    $DateOfJoining = $_POST["Date_of_Joining"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supermarket";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL query to update the record
    $sql = "UPDATE customer_details SET Cname='$name',Cphone='$Phone_Number',Cspent='$Cspent',joinDate='$DateOfJoining' WHERE Cid=$Cid";
    // Add code to update other fields in the same way

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo "<script>window.location.href = '../customer.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
