<?php

use Controller\ProductController;
use Model\Product;
use Repository\ProductRepository;

require "src/conection-db.php";
require "src/Model/Product.php";
require "src/Repository/ProductRepository.php";
require "src/Controller/ProductController.php";


$productRepository = new ProductRepository($pdo);
$productController = new ProductController($productRepository);

if (isset($_POST['edit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';

    $product = new Product(
        $_POST['id'],
        $_POST['type'],
        $name,
        $_POST['description'],
        $_POST['price']
    );
    $file = $_FILES['image'] ;
    if (isset($file)){
        $product->setImage(uniqid().$_FILES['image']['tmp_name']);
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$file['name']);
    }

    $productController->edit($product);
} else {
    $product = $productController->seach($_GET['id']);
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
  <title>Serenatto - Edit Product</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Edit Product</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
    <form  method="post" enctype="multipart/form-data">

      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?= $product->getName() ?>" required>

      <div class="container-radio">
        <div>
            <label for="coffee">Coffee</label>
            <input type="radio" id="coffee" name="type" value="Coffee"<?= $product->getType() == "Coffee"? "checked" : "" ?>>
        </div>
        <div>
            <label for="almoco">Lunch</label>
            <input type="radio" id="Lunch" name="type" value="Lunch" <?= $product->getType() == "Lunch"? "checked": "" ?>>
        </div>
    </div>

      <label for="descricao">Description</label>
      <input type="text" id="description" name="description" value="<?= $product->getDescription() ?>" required>

      <label for="price">Price</label>
      <input type="text" id="price" name="price" value="<?= $product->getPrice() ?>" required>

      <label for="image">send a product image</label>
      <input type="file" name="image" accept="image/*" id="image" value="<?= $product->getImage() ?>">
        <input type="hidden" name="id" value="<?= $product->getId() ?>">
      <input type="submit" name="edit" class="botao-cadastrar"  value="Editar produto"/>
    </form>

  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>