<?php
include('assets/header.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);

    if($result) {
        if(password_verify($password, $result['password'])) {
            $userdata = array($result['username'], $result['fullname'], $result['phone'], $result['address'], $result['role']);
            $_SESSION['userdata'] = $userdata;
            $_SESSION['login'] = true;
            if($result['role'] == 'admin') {
                $_SESSION['admin'] = true;
            }
            if($result['role'] == 'customer') {
                $_SESSION['customer'] = true;
            }
            header('location:index.php');
        }
        else {
            $_SESSION['error'] = '<p class="fw-semibold text-center" style="color: red; margin-left: auto;">Tài khoản hoặc mật khẩu không đúng</p>';
        }
    }
    else {
        $_SESSION['error'] = '<p class="fw-semibold text-center" style="color: red; margin-left: auto;">Tài khoản hoặc mật khẩu không đúng</p>';
    }
}

?>

<main class="background-2">
    <div class="container-md myform">
        <form method="post">
        <?php
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
            <div class="mb-3">
                <label for="username" class="form-label">Tên tài khoản</label>
                <input name="username" type="text" pattern="[a-zA-Z0-9]+" required class="form-control" id="username">
                <small class="fst-italic">Chỉ nhập các chữ số và chữ cái</small>
            </div>
            <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input name="password" type="password" id="password" pattern="[a-zA-Z0-9]+" class="form-control" id="exampleInputPassword1">
                <span class="show-hide" onclick="showOrHidePassword();"><i class="fa-solid fa-eye f-me"></i></span>
                <small class="fst-italic">Chỉ nhập các chữ số và chữ cái</small>
            </div>
            <!-- <button type="submit-customer" class="btn btn-primary w-50" name="login">Đăng nhập với tư cách khách hàng</button> -->
            <button type="submit-customer" class="btn btn-primary w-50" name="login">Đăng nhập với quyền quản trị</button>
        </form>
        <div class="pt-2 text-center">
            <p class="d-inline-block pe-2">Chưa có tài khoản?</p>
            <a href="register.php" class="text-decoration-none text-white btn btn-success">Đăng ký</a>
        </div>
    </div>
</main>

<script src="js/login.js"></script>

<?php
    include('assets/footer.php');
?>