<?php

// CRUD

// C- Create
// R - Read
// U -Update
// D - Delete 

require "config/connect.php";
require "view/header.php";
 
?>

<body>
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php
                $products = mysqli_query($connect,"SELECT * FROM `products` ");
                $products = mysqli_fetch_all($products);
                
                foreach($products as $value){
            ?>

            <tr>
                <td><?= $value[0]?></td>
                <td><?= $value[1]?></td>
                <td><?= $value[3]?></td>
                <td><?= $value[2]?>$</td>
                <td id="update"><a class=" link-offset-2 link-underline link-underline-opacity-0"
                        href="product.php?id=<?= $value[0]?>">View</a></td>
                <td id="update"><a class=" link-offset-2 link-underline link-underline-opacity-0"
                        href="update.php?id=<?= $value[0]?>">Update</a></td>
                <td class="delete"><a class=" link-offset-2 link-underline link-underline-opacity-0"
                        href="vendor/delete.php?id=<?= $value[0]?>">Delete</a></td>
            </tr>
            <?php
                }
                ?>

        </table>
        <h3>Add new Product</h3>

        <form action="vendor/create.php" method="post">
            <p>Title</p>
            <input type="text" name="title" required>
            <p>Description</p>
            <textarea name="description" cols="50" rows="8" required></textarea>
            <p>Price</p>
            <input type="number" name="price" required><br>
            <button class="btn btn-success m-2" type="submit">Add new product</button>
        </form>

    </div>

    <?php require "view/footer.php"?>

</body>

</html>