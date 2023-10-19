<?php
include('assets/header.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $admin_id = $_SESSION['user_id'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "assets/images/products/" . $filename;

    $sql = "INSERT INTO product(name, price, image, admin_id)
            VALUES ('$name', '$price', '$filename', '$admin_id')";
    try {
        mysqli_query($con, $sql);
        move_uploaded_file($tempname, $folder);
        $_SESSION['success'] = '<p class="fw-semibold text-bg-success p-2 text-center" style="color: #17E617; margin-left: auto;">Thêm sản phẩm thành công!</p>';
    } catch (mysqli_sql_exception) {
        $_SESSION['error'] = '<p class="fw-semibold text-bg-danger p-2 text-center" style="color: red; margin-left: auto;">Thêm sản phẩm thất bại!</p>';
    }    

    // header('location:add_product.php');
}

// Hủy phiên làm việc nếu không phải admin
if (!isset($_SESSION['admin'])) {
    session_unset();
    session_destroy();
    header('location:index.php');
}
?>

<!-- Form thêm sản phẩm -->
<main class="background-2">
    <div class="container myform">
        <form method="post" enctype="multipart/form-data">
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
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" required class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm</label>
                <small class="fst-italic text-mutex">(Chỉ nhập chữ số)</small>
                <input type="text" required pattern="[0-9]+" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh sản phẩm</label>
                <input class="form-control" required type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Thêm sản phẩm</button>
        </form>

    </div>
</main>

<?php include('assets/footer.php') ?>