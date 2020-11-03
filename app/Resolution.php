<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Complain;

class Resolution extends Model
{
    protected $fillable = ['id', 'date', 'detail', 'complain_id'];

    public function complain(){
       return $this->belongsTo(Complain::class);
    }
}
