<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="x-icon" href="../images/minlogo.png">
    <title>SmallBasket</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include '../Navigation/navigation.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div id="MainBar">
        <div id="SearchBar"></div>
        <div id="addrecbtn">
            <a class='btn btn-primary btn-sm' href='./Create/create.php'>Add Record</a>
        </div>
    </div>  
    <div class="table">        
        <?php include 'index.php'?>
    </div>
    <script src="script.js"></script>
</body>
</html>