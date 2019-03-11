<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Phone;

class Customer extends Model
{
    //
    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'address',
        'date_of_birth'
    ];

    //return the phones of this customer
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    // event handler. Here we delete all customer phones, upon customer deletion
    public static function boot() {
        parent::boot();

        static::deleting(function($customer) {
            $customer->phones()->delete(); //deleting all related phones
        });
    }

}
