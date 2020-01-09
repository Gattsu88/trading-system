<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CategoryTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $transactions = $category->products()
            ->whereHas('transactions') // at least 1 transaction per product
            ->with('transactions') // eager loading
            ->get()
            ->pluck('transactions') // return transactions without product data
            ->collapse(); // return all as unique collection, removes brackets

        return $this->showAll($transactions);
    }
}
