<?php
    require_once './config/connect.php';
    
    $product_id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);
require 'view/header.php';

?>

<body>
    <div class="m-4">
        <h3>Update new Product</h3>

        <form action="vendor/update.php" method="post">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <p>Title</p>
            <input type="text" name="title" value="<?= $product['title'] ?>" required>
            <p>Description</p>
            <textarea name="description" cols="25" rows="10" required><?= $product['description'] ?>"</textarea>
            <p>Price</p>
            <input type="number" name="price" value="<?= $product['price'] ?>" required><br>
            <button type="submit" class="m-3">Update</button>
        </form>
        <button class="btn btn-success m-4"><a class="text-white link-offset-2 link-underline link-underline-opacity-0"
                href="/crud/index.php">Back</a></button>
        <?= require 'view/footer.php'?>


    </div>
</body>

</html>