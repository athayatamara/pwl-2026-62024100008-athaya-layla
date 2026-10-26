<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $fillable = [
        'poli_code',
        'name',
        'is_active',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
