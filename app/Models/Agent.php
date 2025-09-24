<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'notes'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'agent_service');
    }
}
