<!-- This page won't show on the browser, just used for transfer data only -->

<?php
    $op = 'none';
    if (isset($_GET['op'])) $op = $_GET['op'];  // ensure that the API endpoint includes 'op'

    if($op == 'createOrder'){
        createOrder();
    }
    if($op == 'checkLogin'){
        checkLogin($_POST['email'], $_POST['pwd']);
    }
    if($op == 'logout'){
        logout();
    }

    function isStaff(){
        return isset($_SESSION['email']);
    }

    // Create Order
    function createOrder(){
        // Save Order
        // fopen(file, permission)
        $myFile = fopen('data.csv', 'a') or die('Invalid open file');  // a - append
        $data = $_POST['hd_id'].','.$_POST['name'].','.$_POST['clientEmail'].','.$_POST['qty'].','.date('Y-m-d H:i:s')."\r\n";
        fwrite($myFile, $data);
        fclose($myFile);

        // switch another page 
        header("Location: ./order-completed.php");
    }

    // Login Validation
    function checkLogin($email, $password){
        $staffEmail = 'bruce@gmail.com';
        $staffPwd = 'admin123';

        if($email == $staffEmail && $password == $staffPwd){
            // is a staff SESSION (certification)
            session_start();
            $_SESSION['email'] = $_POST['email'];

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