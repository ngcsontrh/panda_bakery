<?php
$con = mysqli_connect("localhost","root","","panda_bakery");
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = false;
}
if (!isset($_SESSION['customer'])) {
    $_SESSION['customer'] = false;
}

if ($_SESSION['admin']) { 

    if (isset($_POST['add_address'])) {
        $address = $_POST['address'];
        $admin_id = $_SESSION['user_id'];
        $sql = "INSERT INTO shop(address, admin_id) values('$address', '$admin_id')";
        mysqli_query($con, $sql);
        header('location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panda Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-black" data-bs-theme="dark">
        <div class="container-fluid" style="font-size: 1.1em;">
            <a class="navbar-brand font-lobster" href="#">Panda Bakery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Sản phẩm</a>
                    </li>
                    <?php if ($_SESSION['customer']) { ?>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Giỏ hàng</a></li>
                    <?php } ?>

                    <?php if ($_SESSION['admin']) { ?>
                        <li class="nav-item"><a class="nav-link" href="customer.php">Khách hàng</a></li>
                        <li class="nav-item"><a class="nav-link" href="add_product.php">Thêm mặt hàng</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#addAddress">Thêm địa chỉ</a></li>
                        <li class="nav-item"><a class="nav-link" href="order.php">Đơn hàng</a></li>
                    <?php } ?>

                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if ($_SESSION['login'] == true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Thông tin</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Đăng nhập</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if ($_SESSION['admin']) { ?>
    <!-- Modal thêm địa chỉ -->
    <div class="modal fade" id="addAddress" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Thêm địa chỉ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="address" required class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" name="add_address">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
