<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Municipality;
use App\Shop;
use App\Complain;

class Branch extends Model
{
    protected $fillable = [
        'id', 'name', 'phone', 'address', 'municipality_id', 'shop_id'
    ];

    public function municipality(){
       return $this->belongsTo(Municipality::class);
    }

    public function shop(){
       return $this->belongsTo(Shop::class);
    }

    public function complains(){
       return $this->hasMany(Complain::class);
    }
}
