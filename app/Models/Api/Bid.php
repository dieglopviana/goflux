<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = ['id_provider', 'id_offer', 'value', 'amount'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }


    public function offers()
    {
        return $this->belongsTo(Offer::class);
    }
}
