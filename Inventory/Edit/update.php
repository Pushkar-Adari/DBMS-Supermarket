<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pid = $_POST["Pid"];
    $Pname = $_POST["Pname"];
    $Ptype=$_POST["Ptype"];
    $Pcprice = $_POST["Pcprice"];
    $Pmprice = $_POST["Pmprice"];
    $Pquant = $_POST["Pquant"];
    $Psupp = $_POST["Psupp"];

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

    $sql = "UPDATE product_details SET Pname='$Pname',Ptype='$Ptype',Pcprice='$Pcprice',Pmprice='$Pmprice',Pquant='$Pquant',Psupp='$Psupp' WHERE Pid=$Pid";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo "<script>window.location.href = '../inv.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
