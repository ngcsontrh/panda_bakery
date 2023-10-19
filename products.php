<?php
include('assets/header.php');

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $customer_id = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $total = $amount * $_POST['price'];;
    $delivery_time = $_POST['delivery_time'];
    $sql_order = "INSERT INTO bill(customer_id, product_id, amount, total, delivery_time) VALUES ('$customer_id', '$product_id', '$amount', '$total', '$delivery_time')";
    mysqli_query($con, $sql_order);
}
?>

<div class="container min-vh-100 d-flex justify-content-center">
    <div class="row">
        <!-- Hiển thị các sản phẩm được chủ cửa hàng đăng tải -->
        <?php
        $sql = "SELECT * FROM product";
        $query = mysqli_query($con, $sql);
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                // Hiển thị sản phẩm với tư cách khách hàng
                if ($_SESSION['customer']) {
                    echo '
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="card m-5">
                        <img src="./assets/images/products/' . $row['image'] . '" class="card-img-top" alt="Ảnh sản phẩm">
                        <div class="card-body">
                            <h5 class="card-title text-center">' . $row['name'] . '</h5>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="fw-bold">Giá:</span>
                                    <span class="ms-1">' . $row['price'] . '</span>
                                </div>
                            </div>
                           <form method="post">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Số lượng:</span>
                                    <input type="hidden" name="product_id" value=' . $row['product_id'] . '>
                                    <input type="hidden" name="price" value=' . $row['price'] . '>
                                    <input type="number" required name="amount" min=1 class="form-control-sm w-50">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Ngày nhận:</span>
                                    <input type="date" required name="delivery_time" class="form-control-sm w-50">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2" name="submit">Xác nhận</button>     
                            </form>
                        </div>
                    </div>
                </div>';
                }
                // Hiển thị sản phẩm với tư cách admin hoặc không đăng nhập 
                else echo '
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="card m-5">
                        <img src="./assets/images/products/' . $row['image'] . '" class="card-img-top" alt="Ảnh sản phẩm">
                        <div class="card-body">
                            <h5 class="card-title text-center">' . $row['name'] . '</h5>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="fw-bold">Giá:</span>
                                    <span class="ms-1">' . $row['price'] . '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div>
<?php
include('assets/footer.php');
?>