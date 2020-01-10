<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;

class SellerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $categories = $seller->products()
            ->whereHas('categories') // at least 1 category per product
            ->with('categories') // eager loading
            ->get()
            ->pluck('categories') // return categories without product data
            ->collapse() // return all as unique collection, removes brackets
            ->unique('id');

        return $this->showAll($categories);
    }
}
