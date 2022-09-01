<?php include('header.php') ?>

    <h1>Order List</h1>
    <h2>discount with <?php echo date('n') ?> month</h2>

    <div class="flex-grid">
        <?php 
        // header.php has included stock.php, so $items is assigned
            foreach($items as $key => $item){
                echo '
                <div class="items">
                    <img src="./images/'.$item['img'].'" alt="'.$item['name'].'" width="250px" height="250px" style="border-radius: 8px;" />
                        <div class="itemContent">
                            <div>Name: '.$item['name'].'</div><br>
                            <div>Price: $HK'.$item['price'].'</div><br>
                            <a href="./order.php?hd_id='.$item['hd_id'].'" class="orderBtn">Select '.$item['name'].'</a><br>
                        </div>
                </div>';
            }
        ?>
    </div>

<?php include('footer.php') ?>