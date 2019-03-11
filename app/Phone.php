<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Phone extends Model
{
    protected $fillable = [
        'phone_number',
    ];

    //return the customer that this phone is belonged to
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
