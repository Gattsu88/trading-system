<?php

namespace App;

use App\Transformers\BuyerTransformer;

class Buyer extends User
{
    public $transformer = BuyerTransformer::class;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
