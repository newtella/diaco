<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branch;
use App\Status;
use App\Resolution;

class Complain extends Model
{
    protected $fillable = [
        'id', 'document', 'date', 'reason', 'request', 'branch_id', 'status_id'
    ];

    public function Branch(){
       return $this->belongsTo(Branch::class);
    }

    public function Status(){
       return $this->belongsTo(Status::class);
    }

    public function resolution(){
       return $this->hasOne(Resolution::class);
    }
}
