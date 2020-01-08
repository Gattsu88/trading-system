<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class BuyerSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()
            ->with('product.seller') // eager loading
            ->get()
            ->pluck('product.seller') // return product without buyer data and return seller without product data
            ->unique('id')
            ->values(); // removes empty sellers

        return $this->showAll($sellers);
    }
}
