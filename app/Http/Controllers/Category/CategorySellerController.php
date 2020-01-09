<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()
            ->with('seller') // eager loading
            ->get()
            ->pluck('seller') // return sellers without product data
            ->unique('id')
            ->values(); // removes empty sellers

        return $this->showAll($sellers);
    }
}
