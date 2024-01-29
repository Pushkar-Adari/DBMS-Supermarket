<?php
// Database connection details
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $Cname = $_POST["Cname"];
    $Cphone = $_POST["Cphone"];
    $CSpent = $_POST["CSpent"];
    $joinDate = $_POST["joinDate"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO customer_details (Cname, Cphone, CSpent, joinDate)
            VALUES ('$Cname', '$Cphone', '$CSpent', '$joinDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        echo "<script>window.location.href = '../customer.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shorcut icon" type="x-icon" href="../images/minlogo.png">
</head>
<body>
    <div class="container">
    <h2>INSERT DATA</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="Cname">Name:</label>
        <input type="text" name="Cname" required><br><br>

        <label for="Cphone">Phone Number:</label>
        <input type="number" name="Cphone" required><br><br>

        <label for="CSpent">Total Amount:</label>
        <input type="number" name="CSpent" required><br><br>

        <label for="joinDate">Date of Joining:</label>
        <input type="date" name="joinDate" required><br><br>


        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
