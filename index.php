<?php include('header.php') ?>

    <h1>Order List</h1>
    <h2>discount with <?php echo date('n') ?> month</h2>

    <div class="flex-grid">
        <?php 
        // header.php has included stock.php, so $items is assigned
        $hdQ = mysqli_query($dbConnection, "SELECT * FROM `hardisk`");  // select one table 

        while($hd = mysqli_fetch_assoc($hdQ)){  // return these mySQL data through associative array
            echo '
            <div class="items">
                <img src="./images/'.$hd['img'].'" alt="'.$hd['name'].'" width="250px" height="250px" style="border-radius: 8px;" />
                    <div class="itemContent">
                        <div>Name: '.$hd['name'].'</div><br>
                        <div>Price: $HK'.$hd['price'].'</div><br>
                        <div>Qunatity: '.$hd['remaining'].'</div><br>
                        <a href="./order.php?hd_id='.$hd['hd_id'].'" class="orderBtn">Select '.$hd['name'].'</a><br>
                    </div>
            </div>';
        }
        ?>
    </div>

<?php include('footer.php') ?>