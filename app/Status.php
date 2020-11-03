<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Complain;

class Status extends Model
{
    protected $fillable = ['id', 'name'];

    public function complains(){
       return $this->hasMany(Complain::class);
    }
    
}
