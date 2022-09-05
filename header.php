<?php 
    session_start();  // need to call when use $_SESSION
    // include_once 'stock.php';
    include_once 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- time(): force the CSS to reload -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PS GAME HD SHOP</title>
</head>
<body>
<nav>
    <!-- Client Menu -->
    <ul class="clientMenu">
        <li><a href="./">HOME</a></li>
        <li><a href="./about.php">ABOUT</a></li>
    </ul>

    <!-- Staff Menu -->
    <ul class="staffMenu">
        <?php
            if($_SESSION){
                echo '
                <li><a href="./allOrders.php">ALL ORDERS</a></li>
                <li><a href="./functions.php?op=logout">LOGOUT</a></li>';
            } else {
                echo '<li><a href="./login.php">STAFF LOGIN</a></li>';
            }
        ?>
    </ul>
</nav>