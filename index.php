<?php include_once('header.php') ?>

    <h1>Order List</h1>
    <h2>discount with <?php echo date('n') ?> month</h2>

    <div class="flex-grid">
        
        <?php 
        // Print by MySQL
        $hdQ = mysqli_query($dbConnection, "SELECT * FROM `hardisk`");  // select one table 

        while($hd = mysqli_fetch_assoc($hdQ)){  // return these mySQL data through associative array
            echo '
            <div class="items">
                <img src="./images/'.$hd['img'].'" alt="'.$hd['name'].'" width="200px" height="200px" style="border-radius: 8px;" />
                    <div class="itemContent">
                        <div class="itemContent-header">
                            <h3>Name: '.$hd['name'].'</h3>
                        </div>
                        <div>Price: $HK'.$hd['price'].'</div><br>
                        <div>Qunatity: '.$hd['remaining'].'</div><br>
                        <a href="./order.php?hd_id='.$hd['hd_id'].'" class="orderBtn">Order</a><br>
                    </div>
            </div>';
        }

        // // Print by CSV
        // header.php has include_onced stock.php, so $items is assigned
        // foreach($items as $key => $item){
        //     echo '
        //     <div class="items">
        //         <img src="./images/'.$item['img'].'" alt="'.$item['name'].'" width="200px" height="200px" style="border-radius: 8px;" />
        //             <div class="itemContent">
        //                 <div class="itemContent-header">
        //                     <h3>Name: '.$item['name'].'</h3>
        //                 </div>
        //                 <div>Price: $HK'.$item['price'].'</div><br>
        //                 <div>Qunatity: '.$item['remaining'].'</div><br>
        //                 <a href="./order.php?hd_id='.$item['hd_id'].'" class="orderBtn">Order</a><br>
        //             </div>
        //     </div>';
        // }
        ?>
    </div>

<?php include_once('footer.php') ?>