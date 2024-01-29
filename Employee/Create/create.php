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
    $name = $_POST["Name"];
    $phone = $_POST["Phone_Number"];
    $address = $_POST["Address"];
    $age = $_POST["Age"];
    $salary = $_POST["Salary"];
    $joiningDate = date("d-m-y", strtotime($_POST["Date_of_Joining"]));
    $Department = $_POST["Department"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO employee_details (Name, PhoneNumber, Address, Age, Salary, DateOfJoining, Department)
            VALUES ('$name', '$phone', '$address', '$age', '$salary', '$joiningDate', '$Department')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        echo "<script>window.location.href = '../emp.php';</script>";

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
        <label for="Name">Name:</label>
        <input type="text" name="Name" required><br><br>

        <label for="Phone_Number">Phone Number:</label>
        <input type="text" name="Phone_Number" required><br><br>

        <label for="Address">Address:</label>
        <input type="text" name="Address" required><br><br>

        <label for="Age">Age:</label>
        <input type="number" name="Age" required><br><br>

        <label for="Salary">Salary:</label>
        <input type="number" name="Salary" required><br><br>

        <label for="Date_of_Joining">Date of Joining:</label>
        <input type="date" name="Date_of_Joining" required><br><br>

        <label for="Department">Department:</label>
        
        <select name="Department" id="Department">
            <option value="Department">Select dept.</option>
            <option value="Bagger">Bagger</option>
            <option value="Cashier">Cashier</option>
            <option value="Cleaner">Cleaner</option>
            <option value="Clerk">Clerk</option>
            <option value="Security">Security</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
