<?php 
    include_once('header.php');
    include_once('dbConnect.php');
?>

<form action="./functions.php?op=createOrder" method="post">
    <label for="hd_name" style="font-size: 24px;">Product Name</label>
    <!-- Query String -->
    <!-- $_GET: get API endpoint => ./order.php?hd_id={value} -->
    <!-- $_GET => SUPER GLOBAL -->

    <!-- Print database in MySQL -->
    <?php
        $hdQ = mysqli_query($dbConnection, "SELECT * FROM `hardisk` WHERE `hd_id`=".$_GET['hd_id']);
        $hd = mysqli_fetch_assoc($hdQ);

        echo '<input type="hidden" id="hd_id" name="hd_id" value='.$hd['hd_id'].'>';

        echo '<h2 style="padding-top: 10px">'.$hd['name'].'</h2>';

        echo '<img src="./images/'.$hd['img'].'" alt="'.$hd['name'].'" width="200px">';
    ?>

    <!-- Print database through stock.php -->
    <!-- <input 
        type="hidden" 
        id="hd_id" 
        name="hd_id" 
        value="<?php #echo $_GET['hd_id'] ?>"
    >  -->
    <!-- used to send data when the form is submitted -->
    
    <!-- <h2 style="padding-top: 10px">
        <?php #echo $items[$_GET['hd_id']-1]['name'] ?>
    </h2> -->

    <!-- <img 
        src="./images/<?php #echo $items[$_GET['hd_id']-1]['img'] ?>" alt="<?php #echo $items[$_GET['hd_id']-1]['name'] ?>" width="200px"
    > -->


    <!-- User Info -->
    <div id="userInfo">
        <div class="container">
            <!-- Client Name -->
            <div class="form-row">
                <label for="name">Your Name:</label>
                <input name="name" id="name" type="text" required /><br>
            </div>

            <!-- Client Email -->
            <div class="form-row">
                <label for="clientEmail">Your Email:</label>
                <input name="clientEmail" id="clientEmail" type="email" required /><br>
            </div>

            <!-- Product Quantity -->
            <div class="form-row">
                <label for="qty">Quantity:</label>
                <input name="qty" id="qty" type="number" min="1" max="5" value="1" /><br>
            </div>
        </div>
    </div>

    <!-- Buy -->
    <input class="orderBtn" type="submit" value="Order">
</form>

<?php include_once('footer.php') ?>