<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CategoryController extends Controller
{
    //

    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'List all categories');
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listCategories('id', 'asc');
        $this->setPageTitle('Categories', 'Create Category');
        return view('admin.categories.create', compact('categories'));
    }


}
