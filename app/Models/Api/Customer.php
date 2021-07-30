<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'doc', 'about', 'site'];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'id_customer');
    }
}
