<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="x-icon" href="../images/minlogo.png">
    <title>SmallBasket</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        #chart_div {
            position: absolute;
            top: 150px;
            right: 0;
            width: 40%;
            height: 55%;
            padding-right: 100px;
        }
        #pieChart_div {
            position: absolute;
            top: 150px;
            width: 40%;
            height: 55%;
            padding-left: 100px;
        }
    </style>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(init);
        function init(){
            drawCChart();
            drawPChart();
        }
        function drawCChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Category');
        data.addColumn('number', 'Inventory Size');
        data.addColumn({ role: 'style' }); 

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "supermarket";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $categories = ['Grocery','Cleaning supplies', 'Personal Care', 'Snacks', 'Dairy', 'Meat', 'Bakery', 'Frozen foods', 'Baby and child care', 'Pet supplies'];
            $colors = ['#654ade', '#5334da', '#4526cf', '#3e22b9', '#371ea4', '#311f82', '#291a6d', '#211457', '#180f41', '#100a2b']; // Define your colors array

            foreach ($categories as $index => $category) {
                $query = "SELECT SUM(Pquant) as total_inventory FROM product_details WHERE Ptype = '$category'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $inventorySize = (int)$row['total_inventory'];

                    if ($category == 'Baby and child care') {
                        $category = 'Child Care'; 
                    }
                    echo "data.addRow(['$category', $inventorySize, '$colors[$index]']);"; 
                } else {
                    echo "console.error('No data found for $category category.');";
                }
            }
            $totalInventoryValue = 0;

            foreach ($categories as $index => $category) {
                $query = "SELECT Pmprice, Pquant FROM product_details WHERE Ptype = '$category'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $totalInventoryValue += $row['Pmprice'] * $row['Pquant'];
                    }
                } else {
                    echo "console.error('No data found for $category category.');";
                }
            }
            $totalInventorySize = 0;

            echo "document.getElementById('totalInventoryValue').innerHTML = '<strong>INVENTORY VALUE: ₹" . number_format($totalInventoryValue, 2) . "';";
            foreach ($categories as $index => $category) {
                $query = "SELECT Pquant FROM product_details WHERE Ptype = '$category'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $totalInventorySize += $row['Pquant'];
                    }
                } else {
                    echo "console.error('No data found for $category category.');";
                }
            }

            echo "document.getElementById('totalInventorySize').innerHTML = '<strong>INVENTORY SIZE: " . number_format($totalInventorySize, 2) . "';";
        ?>

        var options = {
            'title': 'Inventory Size',
            'width': '100%',
            'height': '100%',
            'backgroundColor': '#1C1C1C',
            'text':'white',
            'legend': 'none',
            'titleTextStyle': {
                color: 'white' // Set title text color to white
            },
            'vAxis': {
                titleTextStyle: {
                    color: 'white' // Set vertical axis text color to white
                },
                textStyle: {
                    color: 'white' // Set vertical axis label text color to white
                }
            },
            'hAxis': {
                titleTextStyle: {
                    color: 'white' // Set horizontal axis text color to white
                },
                textStyle: {
                    color: 'white' // Set horizontal axis label text color to white
                }
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        console.log(options.colors);
        chart.draw(data, options);
        }
        function drawPChart(){
            var pieData = new google.visualization.DataTable();
            pieData.addColumn('string', 'Category');
            pieData.addColumn('number', 'Total Value');

            <?php
                foreach ($categories as $category) {
                    $query1 = "SELECT SUM(Pmprice * Pquant) as total_value FROM product_details WHERE Ptype = '$category'";
                    $result = $conn->query($query1);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalValue = (float)$row['total_value'];

                        if ($category == 'Baby and child care') {
                            $category = 'Child Care';
                        }
                        echo "pieData.addRow(['$category', $totalValue]);";
                    } else {
                        echo "console.error('No data found for $category category.');";
                    }
                }
            ?>

            var pieOptions = {
                'colors': ['#654ade', '#5334da', '#4526cf', '#3e22b9', '#371ea4', '#311f82', '#291a6d', '#211457', '#180f41','#100a2b'],
                pieSliceBorderColor: 'transparent',
                'title': 'Total Inventory Value by Category',
                'width': '100%',
                'height': '100%',
                is3D: true,
                'backgroundColor': '#1C1C1C',
                'titleTextStyle': {
                    color: 'white'
                },
                'legend': {
                    textStyle: {
                        color: 'white'
                    }
                }
            };

            var pieChart = new google.visualization.PieChart(document.getElementById('pieChart_div'));
            console.log(pieOptions.colors);
            pieChart.draw(pieData, pieOptions);
        }
        

    </script>
</head>
<body>
    <?php include '../Navigation/navigation.php'; ?>
    <h2>DASHBOARD</h2>
    <div id="pieChart_div"></div>
    <div id="chart_div"></div>
    <footer id="y">
    <p id="totalInventoryValue"></p>
    </footer>
    <footer id="x">
    <p id="totalInventorySize"></p>
    </footer>
</body>
</html>

