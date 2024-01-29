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
    $Pname = $_POST["Pname"];
    $Ptype = $_POST["Ptype"];
    $Pcprice = $_POST["Pcprice"];
    $Pmprice = $_POST["Pmprice"];
    $Pquant = $_POST["Pquant"];
    $Psupp = $_POST["Psupp"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO product_details (Pname, Ptype, Pcprice, Psupp, Pmprice, Pquant)
            VALUES ('$Pname', '$Ptype', '$Pcprice', '$Psupp', '$Pmprice', '$Pquant')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        echo "<script>window.location.href = '../inv.php';</script>";

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
    <h2>INSERT PRODUCT DATA</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="Product Name">Product Name:</label>
        <input type="text" name="Pname" required><br><br>

        <label for="Category">Category:</label>
        <select name="Ptype" id="Category">
            <option value="NULL">Select dept.</option>
            <option value="Grocery">Grocery</option>
            <option value="Personal Care">Personal Care</option>
            <option value="Cleaning supplies">Cleaning supplies</option>
            <option value="Snacks">Snacks</option>
            <option value="Dairy">Dairy</option>
            <option value="Meat">Meat</option>
            <option value="Bakery">Bakery</option>
            <option value="Frozen foods">Frozen foods</option>
            <option value="Baby and child care">Baby and child care</option>
            <option value="Pet supplies">Pet supplies</option>

        </select>

        <label for="Cost Price">Cost Price:</label>
        <input type="number" name="Pcprice" required><br><br>

        <label for="Market Price">Market Price:</label>
        <input type="number" name="Pmprice" required><br><br>

        <label for="Quantity">Quantity:</label>
        <input type="number" name="Pquant" required><br><br>

        <label for="Supplier">Supplier:</label>
        <select name="Psupp" id="Supplier">
            <option value="NULL">Select Supplier</option>
            <option value=201>201</option>
            <option value=202>202</option>
            <option value=203>203</option>
            <option value=204>204</option>
            <option value=205>205</option>
            <option value=206>206</option>
            <option value=207>207</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
