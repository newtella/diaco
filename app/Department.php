<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;
use App\Municipality;

class Department extends Model
{
    protected $fillable = ['id', 'name', 'region_id'];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function municipalities(){
        return $this->hasMany(Municipality::class);
    }
}
