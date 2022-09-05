<?php 
    include_once('header.php');
    include_once('functions.php');

    // used to avoid being linked directly by client who isn't staff
    // if (!isset($_SESSION['email'])) header('Location: ./login.php');
    if(!isStaff()) header('Location: ./');
?>

<h1>Received Order</h1>
<h2>Your Login Account: <?php echo $_SESSION['email'] ?></h2>

<?php
// --- MySQL Method ---
    $orderQ = mysqli_query($dbConnection, "SELECT * FROM `order`");

    echo '<div id="allOrdersList"><div id="orderList-form">';
    while($order = mysqli_fetch_assoc($orderQ)){
        $hdQ = mysqli_query($dbConnection, "SELECT * FROM `hardisk` WHERE hd_id=".$order['hd_id']);
        $hd = mysqli_fetch_assoc($hdQ);

        echo '<p class="order">';
        echo '<strong>Guest Name:</strong> '.$order['client_name'].'<br>';
        echo '<strong>Guest Email:</strong> '.$order['client_email'].'<br>';
        echo '<strong>Product:</strong> '.$hd['name'].' X '.$order['qty'].'<br>';
        echo '<strong>Order Date:</strong> '.$order['order_time'].'<br>';
        echo '</p>';
    }
    echo '</div></div>';

// --- CSV Method ---
    // // get CSV data
    // $orderData = file_get_contents('data.csv');
    // $orders = str_getcsv($orderData, "\r\n");  // split to each row

    // echo '<div id="allOrdersList"><div id="orderList-form">';
    // // display all orders
    // foreach($orders as $order){
        // // destructuring several data in an order
        // $signleOrder = explode(',', $order);
        // // var_dump($signleOrder);

    //     echo '<p class="order">';
    //     echo '<strong>Guest Name:</strong> '.$signleOrder[1].'<br>';
    //     echo '<strong>Guest Email:</strong> '.$signleOrder[2].'<br>';
    //     echo '<strong>Product:</strong> '.$items[$signleOrder[0]-1]['name'].' X '.$signleOrder[3].'<br>';
    //     echo '<strong>Order Date:</strong> '.$signleOrder[4].'<br>';
    //     echo '</p>';
    // }
    // echo '</div></div>';
?>

<?php include_once('footer.php') ?>