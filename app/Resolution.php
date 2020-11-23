<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Complain;
use Carbon\Carbon;

class Resolution extends Model
{
    protected $fillable = ['id', 'date', 'detail', 'complain_id'];

    public function getDateAttribute(){
        
        return Carbon::parse($this->dates)->format('d/m/yy');
    }

    public function complain(){
       return $this->belongsTo(Complain::class);
    }


}
