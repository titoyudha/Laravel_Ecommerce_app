<?php

namespace App\Http\Controllers;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    //
    protected $brandRepository;
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $product = $this->productRepository->listProduct();

        $this->setPageFile('Product', 'Products List');
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageFile('Products', 'Create Product');
        return view('admin.products.create', compact('categories', 'brands'));

    }

}
