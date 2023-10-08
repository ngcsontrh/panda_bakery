<?php
include('assets/header.php');

if (!$_SESSION['customer']) {
  session_unset();
  session_destroy();
  header('location:index.php');
}
?>


  <div class="container min-vh-100">
    <div class="row d-flex justify-content-center h-100">
      <div class="col-10">
          <!-- Tiêu đề -->
        <div class="mb-3 mt-3">
          <h3 class="fw-normal mb-0 text-black">Giỏ Hàng</h3>
        </div>

        <!-- Thông tin sản phẩm đã đặt -->
        <?php
        $sql = "SELECT product.image as image, product.name as name, bill.amount as amount, bill.total as total, bill.delivery_time as delivery_time FROM bill INNER JOIN product ON bill.product_id = product.product_id";
        $query = mysqli_query($con, $sql);
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) { ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="./assets/images/products/<?php echo $row['image']; ?>" class="card-img-top rounded-3" style="height: 9rem">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal"><?php echo $row['name'] ?></p>
              </div>
              
              <div class="col-md-3 col-lg-3 col-xl-4">
                <p class="lead fw-normal">Số lượng:<span class=" ms-2 text-muted"><?php echo $row['amount'] ?></span></p>
                <p class="fs-5">Thời gian nhận hàng: <?php echo $row['delivery_time'] ?></p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <p class="fs-5">Tổng cộng:</p>
                <p class="fs-5"><?php echo $row['total'] ?> đồng</p>
              </div>
            </div>
          </div>
        </div>
        <?php } } ?>
  
      </div>
    </div>
  </div>

<?php
include('assets/footer.php');
?>