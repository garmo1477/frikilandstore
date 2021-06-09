<?php

namespace App;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use Hashidable;
    protected $fillable = ['user_id', 'name_product', 'description', 'image', 'category', 'in_offer', 'price'];

    public function seller()
    {
        // un vendedor puede tener varios productos a la venta
        return $this->belongsTo(User::class, 'user_id');
    }
}
