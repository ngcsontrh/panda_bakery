<footer class="bg-orange pt-4">
    <div id="contact" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="p-2 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <img src="assets/images/logo.png" alt="logo" class="contact-logo">
            </div>
            <div class="p-2 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <h4 class="text-white">LIÊN HỆ</h4>
                <a href="tel:+84123456789" class="text-decoration-none text-white d-block"><i class="fa-solid fa-phone"></i> 0123456789</a>
                <a href="mailto:info@pandabakery.vn" class="text-decoration-none text-white d-block"><i class="fa-solid fa-envelope"></i> info@pandabakery.vn</a>
                <!-- <p class="text-white"><i class="fa-solid fa-location-dot"></i> 175 Tây Sơn - Đống Đa</p> -->
                <?php 
                    $sql = "SELECT * FROM shop";
                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($query)) { ?>
                        <span class="text-white d-block"><i class="fa-solid fa-location-dot"></i> <?php echo $row['address'] ?></span>
                    <?php } ?>
            </div>
            <div class="p-2 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <h4 class="text-white">CHÍNH SÁCH</h4>
                <a href="#" class="text-decoration-none text-white d-block">Chính sách và quy định chung</a>
                <a href="#" class="text-decoration-none text-white d-block">Chính sách giao dịch, thanh toán</a>
                <a href="#" class="text-decoration-none text-white d-block">Chính sách đổi trả</a>
                <a href="#" class="text-decoration-none text-white d-block">Chính sách bảo mật</a>
                <a href="#" class="text-decoration-none text-white d-block">Chính sách vận chuyển</a>
            </div>
            <div class="p-2 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <h4 class="text-white">PANDA BAKERY</h4>
                <p class="text-white">
                    Tên đơn vị: Công ty Cổ phần Bánh ngọt Panda <br>
                    Số giấy chứng nhận đăng ký kinh doanh: 0104802706 <br>
                    Ngày cấp: 21/07/2010 <br>
                    Nơi cấp: Sở Kế hoạch và Đầu tư Tp. Hà Nội
                </p>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/84bf33559e.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</footer>

</body>

</html>