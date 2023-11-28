<?php

namespace Controller;
use Model\Product;
use Repository\ProductRepository;

class ProductController
{
    private ProductRepository $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function delete(int $id)
    {
        try {
            // Validar se o ID é um número inteiro válido
            if (!is_int($id) || $id <= 0) {
                throw new \InvalidArgumentException('ID inválido.');
            }

            $sql = "DELETE FROM products WHERE id = ?";
            $statement = $this->productRepository->getPdo()->prepare($sql);
            $statement->bindValue(1, $id);
            $statement->execute();
        } catch (\Exception $e) {
            // Tratar exceções aqui (por exemplo, logar ou retornar uma resposta de erro)
            echo "Erro: " . $e->getMessage();
        }
    }

    public function store(Product $product)
    {
        $sql = "INSERT INTO products (type,name,description,price,image) VALUES (?,?,?,?,?)";
        $statement = $this->productRepository->getPdo()->prepare($sql);
        $statement->bindValue(1,$product->getType());
        $statement->bindValue(2,$product->getName());
        $statement->bindValue(3,$product->getDescription());
        $statement->bindValue(4,$product->getPrice());
        $statement->bindValue(5,$product->getImage());

        $statement->execute();
        header("Location: admin.php");
    }

    public function seach(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $statemant = $this->productRepository->getPdo()->prepare($sql);
        $statemant->bindValue(1,$id);
        $statemant->execute();


        $data = $statemant->fetch(\PDO::FETCH_ASSOC);

        return $this->productRepository->makeProduct($data);
    }

    public function edit(Product $product)
    {
        $sql = "UPDATE products SET type=?,name=?, description=?,price=?,image=? WHERE id = ?";
        $statemant = $this->productRepository->getPdo()->prepare($sql);
        $statemant->bindValue(1,$product->getType());
        $statemant->bindValue(2,$product->getName());
        $statemant->bindValue(3,$product->getDescription());
        $statemant->bindValue(4,$product->getPrice());
        $statemant->bindValue(5,$product->getImage());
        $statemant->bindValue(6,$product->getId());

        $statemant->execute();
        header("Location: admin.php");

    }
}