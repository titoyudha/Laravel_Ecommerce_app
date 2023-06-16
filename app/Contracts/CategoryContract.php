<?php


namespace App\Contracts;


interface CategoryContract
{
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    public function findCategoryById(int $id);
    public function createCategory(array $params);
    public function updateCategory(array $params);
    public function deleteCategory($id);
    public function treeList();
    public function findBySlug($slug);

}
