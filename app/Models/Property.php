<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 'address', 'latitude', 'longitude'
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'property_agent')->withTimestamps();
    }
}
