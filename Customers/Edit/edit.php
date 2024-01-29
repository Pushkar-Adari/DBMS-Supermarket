<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="x-icon" href="../images/minlogo.png">
    <title>Edit Customer Record</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="topnav">
        <!-- Navigation menu here (similar to emp.php) -->
    </div>
    <div id="MainBar">
        <div id="SearchBar"></div>
    </div>
    <?php
    if (isset($_GET['Cid'])) {
        $Cid = intval($_GET['Cid']);

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

        $sql = "SELECT * FROM customer_details WHERE Cid = $Cid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="container">
                <h2>Edit Customer Record</h2>
                <form method="post" action="update.php">
                    <input type="hidden" name="Cid" value="<?= $row['Cid'] ?>">
                    <label for="Name">Name:</label>
                    <input type="text" name="Name" value="<?= $row['Cname'] ?>" required><br><br>
                    <label for="Phone_Number">Phone Number:</label>
                    <input type="number" name="Phone_Number" value="<?= $row['Cphone'] ?>" required><br><br>
                    <label for="Cspent">Total Purchase:</label>
                    <input type="number" name="Cspent" value="<?= $row['Cspent'] ?>" required><br><br>
                    <label for="Date_of_Joining">Date Of Joining:</label>
                    <input type="date" name="Date_of_Joining" value="<?= $row['joinDate'] ?>" required><br><br>

                    <input type="submit" value="Update">
                </form>
            </div>
            <?php
        } else {
            echo "Customer not found.";
        }

        $conn->close();
    } else {
        echo "Cid parameter not provided.";
    }
    ?>
</body>
</html>
