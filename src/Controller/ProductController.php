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
    }
}