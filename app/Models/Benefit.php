<?php

namespace App\Models;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'employee_id',
        'type',
        'amount',
        'status',
        'message',
        'file',
    ];

    /**
     *  FIll ulid field when creating
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->code = MixCaseULID::generate();
        });
    }
}
