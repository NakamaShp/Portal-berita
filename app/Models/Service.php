<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_active'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_service');
    }

    protected $casts = [
        'is_active' => 'boolean', // Tambahkan baris ini
        // 'email_verified_at' => 'datetime',
    ];
}
