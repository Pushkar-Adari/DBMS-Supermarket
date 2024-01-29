<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Cost Price</th>
                <th>Market Price</th>
                <th>Quantity</th>
                <th>Supplier ID</th>
                <th>Actions</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost","root","","supermarket");
            $numPerPage = 10;
            if(isset($_GET["page"])){
                $page=$_GET["page"];
            }
            else{
                $page=1;
            }
            $start_from=($page-1)*10;
            $sql = "SELECT * FROM product_details limit $start_from,$numPerPage";
            $result = $conn-> query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row["Pid"] . "</td>";
                    echo "<td>" . $row["Pname"] . "</td>";
                    echo "<td>" . $row["Ptype"] ."</td>";
                    echo "<td>" . $row["Pcprice"] ."</td>";
                    echo "<td>" . $row["Pmprice"] ."</td>";
                    echo "<td>" . $row["Pquant"] ."</td>";
                    echo "<td>" . $row["Psupp"] ."</td>";
                    echo "<td>";
                    echo "<div class ='btn-group'>";
                    echo "<a class='bx bx-edit' href='./Edit/edit.php?Pid=" .$row['Pid'] . "'></a>";
                    echo "<a class='bx bx-trash'  href='./Delete/delete.php?Pid=" .$row['Pid'] . "'></a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            else{
                echo "No results";
            }
            ?>
        </table>
        <div class="pagination">
            <?php
                $sql = "SELECT * FROM product_details";
                $rs_result = $conn-> query($sql);
                $total_records=mysqli_num_rows($rs_result);
                $total_pages=ceil($total_records/$numPerPage);
                for ($i = 1;$i<=$total_pages;$i++){
                    echo "<a href='inv.php?page=".$i."'>".$i."</a>";
                }       
            ?>
        </div>
    </body>
</html>