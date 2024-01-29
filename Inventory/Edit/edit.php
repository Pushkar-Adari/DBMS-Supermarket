    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shorcut icon" type="x-icon" href="../images/minlogo.png">
        <title>Edit product details</title>
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
        if (isset($_GET['Pid'])) {
            $Pid = intval($_GET['Pid']);

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
            $sql = "SELECT * FROM product_details WHERE Pid = $Pid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <div class="container">
                    <h2>Edit Employee Record</h2>
                    <form method="post" action="update.php">
                        <input type="hidden" name="Pid" value="<?= $row['Pid'] ?>">
                        <label for="Pname">Product Name:</label>
                        <input type="text" name="Pname" value="<?= $row['Pname'] ?>" required><br><br>
                        <label for="Ptype">Category:</label>
                        <select id="Ptype" name="Ptype" required>
                            <option value="Grocery" <?= strtolower($row['Ptype']) === 'Grocery' ? 'selected' : '' ?>>Grocery</option>
                            <option value="Personal Care" <?= strtolower($row['Ptype']) === 'Personal Care' ? 'selected' : '' ?>>Personal Care</option>
                            <option value="Cleaning supplies" <?= strtolower($row['Ptype']) === 'Cleaning supplies' ? 'selected' : '' ?>>Cleaning supplies</option>
                            <option value="Snacks" <?= strtolower($row['Ptype']) === 'Snacks' ? 'selected' : '' ?>>Snacks</option>
                            <option value="Dairy" <?= strtolower($row['Ptype']) === 'Dairy' ? 'selected' : '' ?>>Dairy</option>
                            <option value="Meat" <?= strtolower($row['Ptype']) === 'Meat' ? 'selected' : '' ?>>Meat</option>
                            <option value="Bakery" <?= strtolower($row['Ptype']) === 'Bakery' ? 'selected' : '' ?>>Bakery</option>
                            <option value="Frozen foods" <?= strtolower($row['Ptype']) === 'Frozen foods' ? 'selected' : '' ?>>Frozen foods</option>
                            <option value="Baby and child care" <?= strtolower($row['Ptype']) === 'Baby and child care' ? 'selected' : '' ?>>Baby and child care</option>
                            <option value="Pet supplies" <?= strtolower($row['Ptype']) === 'Pet supplies' ? 'selected' : '' ?>>Pet supplies</option>
                        </select>
                        <label for="Pcprice">Cost price:</label>
                        <input type="number" name="Pcprice" value="<?= $row['Pcprice'] ?>" required><br><br>
                        <label for="Pmprice">Market price:</label>
                        <input type="number" name="Pmprice" value="<?= $row['Pmprice'] ?>" required><br><br>
                        <label for="Pquant">Quantity:</label>
                        <input type="number" name="Pquant" value="<?= $row['Pquant'] ?>" required><br><br>
                        <label for="Psupp">Supplier:</label>
                        <select id="Supplier" name="Psupp" required>
                            <option value=201 <?= strtolower($row['Psupp']) === 201 ? 'selected' : '' ?>>201</option>
                            <option value=202 <?= strtolower($row['Psupp']) === 202 ? 'selected' : '' ?>>202</option>
                            <option value=203 <?= strtolower($row['Psupp']) === 203 ? 'selected' : '' ?>>203</option>
                            <option value=204 <?= strtolower($row['Psupp']) === 204 ? 'selected' : '' ?>>204</option>
                            <option value=205 <?= strtolower($row['Psupp']) === 205 ? 'selected' : '' ?>>205</option>
                            <option value=206 <?= strtolower($row['Psupp']) === 206 ? 'selected' : '' ?>>206</option>
                            <option value=207 <?= strtolower($row['Psupp']) === 207 ? 'selected' : '' ?>>207</option>
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
