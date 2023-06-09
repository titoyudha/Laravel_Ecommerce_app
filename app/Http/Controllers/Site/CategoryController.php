<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);

        return view('site.pages.category', compact('category'));
    }
}
