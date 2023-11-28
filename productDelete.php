<?php

use Controller\ProductController;
use Repository\ProductRepository;

require "src/conection-db.php";
require "src/Model/Product.php";
require "src/Repository/ProductRepository.php";
require "src/Controller/ProductController.php";
$productRepository = new ProductRepository($pdo);
$productController = new ProductController($productRepository);

$productController->delete($_POST['id']);

header("Location: admin.php");