<?php 
    include('header.php');
    include('functions.php');

    // used to avoid being linked directly by client who isn't staff
    // if (!isset($_SESSION['email'])) header('Location: ./login.php');
    if(!isStaff()) header('Location: ./');
?>

<h1>Received Order</h1>
<h2>Your Login Account: <?php echo $_SESSION['email'] ?></h2>

<?php
    // get CSV data
    $orderData = file_get_contents('data.csv');
    $orders = str_getcsv($orderData, "\r\n");  // split to each row

    echo '<div id="allOrdersList"><div id="orderList-form">';
    // display all orders
    foreach($orders as $order){
        // destructuring several data in an order
        $signleOrder = explode(',', $order);
        // var_dump($signleOrder);

        echo '<p class="order">';
        echo '<strong>Guest Name:</strong> '.$signleOrder[1].'<br>';
        echo '<strong>Guest Email:</strong> '.$signleOrder[2].'<br>';
        echo '<strong>Product:</strong> '.$items[$signleOrder[0]-1]['name'].' X '.$signleOrder[3].'<br>';
        echo '<strong>Order Date:</strong> '.$signleOrder[4].'<br>';
        echo '</p>';
    }
    echo '</div></div>';
?>

<?php include('footer.php') ?>