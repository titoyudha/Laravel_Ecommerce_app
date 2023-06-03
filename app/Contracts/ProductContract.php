<?php

namespace App\Contracts;

interface ProductContract
{
    public function listProduct(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    public function createProduct(array $params);
    public function findProductById(int $id);
    public function updateProduct(array $params);
    public function deleteProduct($id);

}
