<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class BuyerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $categories = $buyer->transactions()
            ->with('product.categories') // eager loading
            ->get()
            ->pluck('product.categories')
            ->collapse() // return all as unique collection, removes brackets
            ->unique('id')
            ->values(); // removes empty categories

        return $this->showAll($categories);
    }
}
