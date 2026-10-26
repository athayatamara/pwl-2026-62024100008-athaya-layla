<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poli;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_code',
        'name',
        'specialization',
        'phone',
        'is_active',
        'poli_id',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function registrations()
{
    return $this->hasMany(Registration::class);
}
}
