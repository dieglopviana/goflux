<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['id_customer', 'from', 'to', 'initial_value', 'amount', 'amount_type'];


    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }


    public function bids()
    {
        return $this->hasMany(Bids::class, 'id_offer');
    }
}
