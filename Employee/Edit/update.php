<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $EID = $_POST["EID"];
    $name = $_POST["Name"];
    $Phone_Number=$_POST["Phone_Number"];
    $Address = $_POST["Address"];
    $Age = $_POST["Age"];
    $Salary = $_POST["Salary"];
    $DateOfJoining = date("d-m-y", strtotime($_POST["Date_of_Joining"]));
    $Department = $_POST["Department"];

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
    $sql = "UPDATE employee_details SET Name='$name',PhoneNumber='$Phone_Number',Address='$Address',Age='$Age',Salary='$Salary',DateOfJoining='$DateOfJoining', Department = '$Department' WHERE EID=$EID";
    // Add code to update other fields in the same way

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo "<script>window.location.href = '../emp.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
