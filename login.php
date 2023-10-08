<?php
include('assets/header.php');

if(isset($_POST['login-customer'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM customer WHERE account = '$account'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);

    if($result) {
        if(password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['customer_id'];
            $_SESSION['login'] = true;
            $_SESSION['customer'] = true;
            header('location:index.php');
        }
        else {
            $_SESSION['error'] = '<p class="fw-semibold text-bg-danger p-2 text-center">Tài khoản hoặc mật khẩu không đúng</p>';
        }
    }
    else {
        $_SESSION['error'] = '<p class="fw-semibold text-bg-danger p-2 text-center">Tài khoản hoặc mật khẩu không đúng</p>';
    }
}

if(isset($_POST['login-admin'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE account = '$account'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);

    if($result) {
        if(password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['admin_id'];
            $_SESSION['login'] = true;
            $_SESSION['admin'] = true;
            header('location:index.php');
        }
        else {
            $_SESSION['error'] = '<p class="fw-semibold text-bg-danger p-2 text-center">Tài khoản hoặc mật khẩu không đúng</p>';
        }
    }
    else {
        $_SESSION['error'] = '<p class="fw-semibold text-bg-danger p-2 text-center">Tài khoản hoặc mật khẩu không đúng</p>';
    }
}

?>

<main class="background-1">
    <div class="container-md myform">
        <form method="post">
        <?php
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
            <div class="mb-3">
                <label for="account" class="form-label">Tên tài khoản</label>
                <input name="account" type="text" pattern="[a-zA-Z0-9]+" required class="form-control" id="account">
                <small class="fst-italic">Chỉ nhập các chữ số và chữ cái</small>
            </div>
            <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input name="password" type="password" id="password" pattern="[a-zA-Z0-9]+" class="form-control">
                <span class="show-hide" onclick="showOrHidePassword();"><i class="fa-solid fa-eye f-me"></i></span>
                <small class="fst-italic">Chỉ nhập các chữ số và chữ cái</small>
            </div>
            <div class="row ">
                <button type="submit" class="btn col btn-primary m-1" name="login-customer">Đăng nhập</button>
                <button type="submit" class="btn col m-1 text-white" style="background-color: #ffbd03;" name="login-admin">Đăng nhập với quyền quản trị</button>
            </div>
        </form>
        <div class="pt-2 text-center">
            <p class="d-inline-block pe-2">Chưa có tài khoản?</p>
            <a href="register.php" class="text-decoration-none text-white btn btn-success">Đăng ký</a>
        </div>
    </div>
</main>

<script>
    // Ẩn/hiện mật khẩu
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