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
    mysqli_query($con, $sql);
    
    move_uploaded_file($tempname, $folder);

    header('location:add_product.php');
}
if (!isset($_SESSION['admin'])) {
    session_unset();
    session_destroy();
    header('location:index.php');
}
?>

<!-- Form login -->
<main class="background-2">
    <div class="container myform">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" required class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm</label>
                <input type="text" required class="form-control" id="price" name="price">
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