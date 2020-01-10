<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;

class SellerBuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $buyers = $seller->products()
            ->whereHas('transactions') // at least 1 transaction per product
            ->with('transactions.buyer') // eager loading
            ->get()
            ->pluck('transactions') // return transactions without product data
            ->collapse() // return all as unique collection, removes brackets
            ->pluck('buyer') // return buyers without transaction data
            ->unique('id')
            ->values(); // removes empty buyers

        return $this->showAll($buyers);
    }
}
