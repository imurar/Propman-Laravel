<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_agent')->withTimestamps();
    }
}