<?php

use Repository\ProductRepository;
require "src/conection-db.php";
require "src/Model/Product.php";
require "src/Repository/ProductRepository.php";



$productRepository = new ProductRepository($pdo);
$data = $productRepository->productsData();


?>

<table>
    <thead>
    <tr>
        <th>Product</th>
        <th>Type</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $product): ?>
        <tr>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getType() ?></td>
            <td><?= $product->getDescription() ?></td>
            <td><?= $product->getFormattedPrice() ?></td>

        </tr>
    <?php endforeach;?>


    </tbody>
</table>
<style>
    table{
        width: 90%;
        margin: auto 0;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
</style>

