<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'user_id',
        'status',
        'tanggal_masuk',
        'kesehatan',
        'bencana',
        'transportasi',
        'jabatan',
        'makanan',
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'nik';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
