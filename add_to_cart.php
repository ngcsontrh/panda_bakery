<?php
$con = mysqli_connect("localhost","root","","panda_bakery");
session_start();
// $product_id = $_GET['product_id'];
if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $customer_id = $_SESSION['user_id'];
        $amount = 5;
        $total = $amount * 200000;
        
        $delivery_time = date('Y-m-d', strtotime('+1 day'));
        echo $total;
        $sql_order = "INSERT INTO bill(customer_id, product_id, amount, total, delivery_time) VALUES ('$customer_id', '$product_id', '$amount', '$total', '$delivery_time')";
        mysqli_query($con, $sql_order);
        // header('location:cart.php');
}
?>