<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;

class ProductBuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $buyers = $product->transactions()
            ->with('buyer') // eager loading
            ->get()
            ->pluck('buyer') // return buyers without transactions data
            ->unique('id')
            ->values(); // removes empty buyers

        return $this->showAll($buyers);
    }
}
