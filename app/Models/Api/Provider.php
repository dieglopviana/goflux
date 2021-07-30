<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'doc', 'about', 'site'];

    public function bids()
    {
        return $this->hasMany(Bids::class, 'id_provider');
    }
}
