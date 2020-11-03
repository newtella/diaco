<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branch;

class Shop extends Model
{
    protected $fillable = ['id','name'];

    public function branches(){
       return $this->hasMany(Branch::class);
    }
}
