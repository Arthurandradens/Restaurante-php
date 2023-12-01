<?php

use Controller\ProductController;
use Model\Product;
use Repository\ProductRepository;

require "src/conection-db.php";
require "src/Model/Product.php";
require "src/Repository/ProductRepository.php";
require "src/Controller/ProductController.php";

if (isset($_POST['registration'])){
    $newProduct = new Product(null,
        $_POST['type'],
        $_POST['name'],
        $_POST['description'],
        $_POST['price']
    );

    if (isset($_FILES['image'])) {
        $imageName = uniqid() . $_FILES['image']['name'];
        $newProduct->setImage($imageName);
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $imageName);

    }

    $productRepository = new ProductRepository($pdo);
    $productController = new ProductController($productRepository);
    $productController->store($newProduct);

}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Register Product</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
        <h1>Product Registration</h1>
        <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="post" enctype="multipart/form-data" >

            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter the product name" required>
            <div class="container-radio">
                <div>
                    <label for="coffee">Coffee</label>
                    <input type="radio" id="coffee" name="type" value="Coffee" checked>
                </div>
                <div>
                    <label for="lunch">Lunch</label>
                    <input type="radio" id="lunch" name="type" value="Lunch">
                </div>
            </div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Enter a description" required>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" placeholder="Enter a price" required>

            <label for="image">Upload a product image</label>
            <input type="file" name="image" accept="image/*" id="image" placeholder="Upload an image">

            <input type="submit" name="registration" class="register-button" value="Register product"/>
        </form>

    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>