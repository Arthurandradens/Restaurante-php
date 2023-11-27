<?php

namespace Repository;

use Model\Product;
use PDO;

class ProductRepository
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function makeProduct($data)
    {
        return new Product(
            $data['id'],
            $data['type'],
            $data['name'],
            $data['description'],
            $data['price'],
            $data['image']
        );
    }
    public function coffeeOptions(): array
    {
        $sql = "SELECT * FROM products WHERE type = 'Coffee' ORDER BY price;";

        $coffeeProducts = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);


        // essa funcao faz o mapeamento do objeto
        // por meio de um tipo de foreach ele pega todos os itens
        // da tabela no banco, faz um laco e em cada item ele cria
        // um objeto de Product e mapeia os itens da tabela como parametros,
        // depois transforma tudo isso num array de objetos
        $coffeeData = array_map(function ($coffee){
            return $this->makeProduct($coffee);
        }, $coffeeProducts);

        return $coffeeData;
    }

    public function lunchOptions(): array
    {
        $sql = "SELECT * FROM products WHERE type = 'Lunch' ORDER BY price";
        $lunchProducts = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $lunchData = array_map(function ($lunch){
            return $this->makeProduct($lunch);
        }, $lunchProducts);

        return $lunchData;
    }

    public function productsData(): array
    {
         $sql = "SELECT * FROM products ORDER BY price DESC ";
         $data = $this->pdo
                 ->query($sql)
                 ->fetchAll(PDO::FETCH_ASSOC);

        $allData = array_map(function ($product){
            return $this->makeProduct($product);
        }, $data);

         return $allData;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}

