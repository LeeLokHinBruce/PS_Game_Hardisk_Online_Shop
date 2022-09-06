<!-- This page won't show on the browser, just used for transfer data only -->

<?php
    include_once 'dbConnect.php';

    $op = 'none';
    if (isset($_GET['op'])) $op = $_GET['op'];  // ensure that the API endpoint include_onces 'op'

    if($op == 'createOrder'){
        createOrder();
    }
    if($op == 'checkLogin'){
        checkLogin($_POST['email'], $_POST['password']);
    }
    if($op == 'logout'){
        logout();
    }

    function isStaff(){
        return isset($_SESSION['email']);
    }

    // Create Order
    function createOrder(){
        // --- MySQL Method ---
        global $dbConnection;

        // Save Order
        $sql = "INSERT INTO `php_hardisk`.`order` (
            `client_name`,
            `client_email`,
            `qty`,
            `order_time`,
            `hd_id`
            ) VALUES (
            '{$_POST['name']}',
            '{$_POST['clientEmail']}',
            {$_POST['qty']},
            '".date('Y-m-d H:i:s')."',
            {$_POST['hd_id']})";
        // assign to MySQL database
        if(mysqli_query($dbConnection, $sql)){
            $hdQ = mysqli_query($dbConnection, "SELECT * FROM `hardisk` WHERE `hd_id`=".$_POST['hd_id']);
            $hd = mysqli_fetch_assoc($hdQ);

            // if remaining is empty
            if($hd['remaining'] == 0){
                echo "<script>
                alert('I'm sorry, the {$hd['name']} was sold out.')
                window.location.href='./index.php'
                </script>";
            }

            // if the remaining of the project lesser than qty that ordered by client
            $predictRemaining = $hd['remaining'] - $_POST['qty'];
            if($predictRemaining < 0){
                echo "<script>
                alert('Sorry your order quantity is larger than the remaining quantity of {$hd['name']}')
                window.location.href='./index.php'
                </script>";
            }
            // reduce remaining
            $currentRemaining = $hd['remaining'] - $_POST['qty'];
            
            mysqli_query($dbConnection, "UPDATE `php_hardisk`.`hardisk` SET `remaining`=$currentRemaining WHERE `hd_id`=".$_POST['hd_id']);

            // switch another page 
            header("Location: ./order-completed.php");
        } else {
            // order failed 
            echo '<script>
            alert("Invalid Order! Some information you haven\'t input.")
            window.location.href="./index.php"
            </script>';
        }

        // // --- CSV Method ---
        // // fopen(file, permission)
        // $myFile = fopen('data.csv', 'a') or die('Invalid open file');  // a - append
        // $data = $_POST['hd_id'].','.$_POST['name'].','.$_POST['clientEmail'].','.$_POST['qty'].','.date('Y-m-d H:i:s')."\r\n";
        // fwrite($myFile, $data);
        // fclose($myFile);
        // header("Location: ./order-completed.php");
    }

    // Login Validation
    function checkLogin($email, $password){
        // --- CSV method ---
        // $staffEmail = 'bruce@gmail.com';
        // $staffPassword = 'admin123';

        // --- MySQL method ---
        global $dbConnection;
        $staffQ = mysqli_query($dbConnection, "SELECT * FROM `staff` WHERE `email`='".$email."'");
        $staff = mysqli_fetch_assoc($staffQ);

        // if($email == $staffEmail && $password == $staffPassword){
        if($email == $staff['email'] && password_verify($password, $staff['password'])){
            // is a staff SESSION (certification)
            session_start();
            $_SESSION['email'] = $email;

            header("Location: ./allOrders.php");
        } else {
            // wrong password or email
            echo '<script>
            alert("Invalid email or password! Please input these again correctly.")
            window.location.href="./login.php"
            </script>';
            // header("Location: ./login.php");
        }
    }

    // Logout
    function logout(){
        session_start();
        session_destroy();  // remove session
        header("Location: ./");
    }
?>