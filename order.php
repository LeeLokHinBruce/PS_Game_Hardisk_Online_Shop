<?php include('header.php') ?>

<form action="./functions.php?op=createOrder" method="post">
    <label for="hd_name" style="font-size: 24px;">Product Name</label>
    <!-- Query String -->
    <!-- $_GET: get API endpoint => ./order.php?hd_id={value} -->
    <!-- $_GET => SUPER GLOBAL -->
    <input type="hidden" id="hd_id" name="hd_id" value="<?php echo $_GET['hd_id'] ?>"> <!-- used to send data when the form is submitted -->
    
    <h2 style="padding-top: 10px"><?php echo $items[$_GET['hd_id']-1]['name'] ?></h2>

    <img src="./images/<?php echo $items[$_GET['hd_id']-1]['img'] ?>" alt="<?php echo $items[$_GET['hd_id']-1]['name'] ?>" width="300px">

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

<?php include('footer.php') ?>