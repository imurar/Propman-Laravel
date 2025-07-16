<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function properties()
    {
        return $this->bolongToMany(property::class, 'property_agent');
    }
}
