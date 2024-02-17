<?php

require_once '../config/connect.php';

$id = $_POST['id'];

$title = $_POST["title"];
$price = $_POST["price"];
$description = $_POST["description"];

mysqli_query($connect,"UPDATE `products` SET `title`= '$title', `price`= '$price', `description`='$description' WHERE `products`.`id`='$id'");



header('Location: /crud/index.php');