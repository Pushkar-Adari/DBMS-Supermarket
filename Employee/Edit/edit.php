    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shorcut icon" type="x-icon" href="../images/minlogo.png">
        <title>Edit Employee Record</title>
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
        // Check if EID is provided in the URL
        if (isset($_GET['EID'])) {
            $EID = intval($_GET['EID']);

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

            // Fetch existing employee data
            $sql = "SELECT * FROM employee_details WHERE EID = $EID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <div class="container">
                    <h2>Edit Employee Record</h2>
                    <form method="post" action="update.php">
                        <input type="hidden" name="EID" value="<?= $row['EID'] ?>">
                        <label for="Name">Name:</label>
                        <input type="text" name="Name" value="<?= $row['Name'] ?>" required><br><br>
                        <label for="Phone_Number">Phone Number:</label>
                        <input type="number" name="Phone_Number" value="<?= $row['PhoneNumber'] ?>" required><br><br>
                        <label for="Address">Address:</label>
                        <input type="text" name="Address" value="<?= $row['Address'] ?>" required><br><br>
                        <label for="Age">Age:</label>
                        <input type="number" name="Age" value="<?= $row['Age'] ?>" required><br><br>
                        <label for="Salary">Salary:</label>
                        <input type="number" name="Salary" value="<?= $row['Salary'] ?>" required><br><br>
                        <label for="Date_of_Joining">Date Of Joining:</label>
                        <input type="date" name="Date_of_Joining" value="<?= $row['DateOfJoining'] ?>" required><br><br>
                        <label for="Department">Department:</label>
                        <select id="Department" name="Department" required>
                            <option value="Bagger" <?= strtolower($row['Department']) === 'bagger' ? 'selected' : '' ?>>Bagger</option>
                            <option value="Cashier" <?= strtolower($row['Department']) === 'cashier' ? 'selected' : '' ?>>Cashier</option>
                            <option value="Cleaner" <?= strtolower($row['Department']) === 'cleaner' ? 'selected' : '' ?>>Cleaner</option>
                            <option value="Clerk" <?= strtolower($row['Department']) === 'clerk' ? 'selected' : '' ?>>Clerk</option>
                            <option value="Security" <?= strtolower($row['Department']) === 'security' ? 'selected' : '' ?>>Security</option>
                        </select>


                        <input type="submit" value="Update">
                    </form>
                </div>
                <?php
            } else {
                echo "Employee not found.";
            }

            $conn->close();
        } else {
            echo "EID parameter not provided.";
        }
        ?>
    </body>
    </html>
