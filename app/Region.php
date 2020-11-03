<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class Region extends Model
{
    protected $fillable = ['id', 'name'];

    public function departments(){
       return $this->hasMany(Department::class);
    }
}
