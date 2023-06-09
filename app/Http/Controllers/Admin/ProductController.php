<?php

namespace App\Http\Controllers;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Requests\StoreProductFormRequest;
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
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageFile('Products', 'Create Product');
        return view('admin.products.create', compact('categories', 'brands'));

    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->createProduct($params);

        if(!$product){
            return $this->responseRedirectBack('Error Occurred while creating product', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product Added', 'success', false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageFile('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'products'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->updateProduct($params);

        if(!$product){
            return $this->responseRedirectBack('error occurred while updating product', 'error', true,true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully', 'success', false, false);
    }

}
