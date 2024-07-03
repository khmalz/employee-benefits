<?php

namespace App\Models;

use App\Observers\ResponseObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([ResponseObserver::class])]
class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'benefit_id',
        'message',
    ];

    public function benefit(): BelongsTo
    {
        return $this->belongsTo(Benefit::class, 'benefit_id');
    }
}
