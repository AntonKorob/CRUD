<?php
    require_once './config/connect.php';
    
    $product_id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);
    
    $comments = mysqli_query($connect,"SELECT * FROM `comments` WHERE `product_id` = '$product_id'");
    $comments = mysqli_fetch_all($comments);
    
    require "view/header.php";
?>

<body>

    <div class="container">

        <h2>Name: <?= $product['title']?></h2>
        <h4>Price: <?= $product['price']?></h4>
        <p>Description: <?= $product['description']?></p>
        <img src="img/img_pr<?= $product['id']?>.png" alt="qqq">


        <form action="vendor/create_comment.php" method="post">

            <input type="hidden" name="id" value="<?= $product['id']?>">

            <textarea name="body" class="mt-4" cols="60" rows="8"></textarea>
            <div>
                <button class="btn btn-success m-4"><a
                        class="text-white link-offset-2 link-underline link-underline-opacity-0"
                        href="/crud/index.php">Back</a></button>
                <button class="btn btn-success" type="submit">Send</button>
            </div>
        </form>

        <pre>
        </pre>

        <h3>Comments</h3>

        <ul>
            <?php
            foreach ($comments as $comment) {   
             ?>
            <li><?= $comment[2] ?></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>

<?php require "view/footer.php"?>

</html>