<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Branch;

class Municipality extends Model
{
    protected $fillable = ['id', 'name', 'department_id'];

    public function department(){
       return $this->belongsTo(Department::class);
    }

    public function branches(){
       return $this->hasMany(Branch::class);
    }
}
