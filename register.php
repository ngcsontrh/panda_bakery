<?php
include('assets/header.php');

if (isset($_POST['register'])) {
    $account = $_POST['account'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customer(account, password, fullname, address, phone)
                                values('$account','$password', '$fullname', '$address','$phone')";
    try {
        mysqli_query($con, $sql);
        // header('location:login.php');
        $_SESSION['success'] = '<p class="fw-semibold text-bg-success p-2 text-center" style="color: #17E617; margin-left: auto;">Đăng ký thành công!</p>';
    } catch (mysqli_sql_exception) {
        $_SESSION['error'] = '<p class="fw-semibold text-bg-danger p-2 text-center" style="color: red; margin-left: auto;">Tên người dùng đã được sử dụng!</p>';
    }
}
?>

<main class="background-1">
    <div class="container-md myform">
        <form method="post">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            ?>
            <div class="mb-3">
                <label for="account" class="form-label">Tên tài khoản</label>
                <input type="text" name="account" pattern="[a-zA-Z0-9]+" maxlength="32" required class="form-control" id="account">
                <small class="fst-italic">Chỉ nhập các chữ số và chữ cái(Tối đa 32 ký tự)</small>
            </div>
            <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" pattern="[A-Za-z0-9]+" class="form-control" id="exampleInputPassword1">
                <span class="show-hide" onclick="showOrHidePassword();"><i class="fa-solid fa-eye f-me"></i></span>
                <small class="fst-italic">Chỉ nhập các chữ số và chữ cái</small>
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">Tên đầy đủ</label>
                <input type="text" name="fullname" required class="form-control" id="fullname">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" name="phone" pattern="[0-9]{10}" required class="form-control" id="phone" placeholder="0123456789">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <textarea type="text" name="address" required class="form-control" id="address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="register">Đăng ký</button>
        </form>
        <div class="pt-2 text-center">
            <p class="d-inline-block pe-2">Đã có tài khoản?</p>
            <a href="login.php" class="text-decoration-none text-white btn btn-success">Đăng nhập</a>
        </div>
    </div>
</main>

<script>
    function showOrHidePassword() {
        let x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?php
include('assets/footer.php');
?>