<?php

namespace App\Models;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefit extends Model
{
    use HasFactory;

    const MENUNGGU = 'pending';
    const PROSES = 'progress';
    const SELESAI = 'done';
    const TOLAK = 'reject';

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

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function scopeWhereStatus(Builder $query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeWhereEmployeeID(Builder $query, int $employeeID)
    {
        return $query->where('employee_id', $employeeID);
    }

    public function scopeWhereUserName(Builder $query, string $nama)
    {
        return $query->whereHas('employee.user', function ($q) use ($nama) {
            $q->where('name', 'like', $nama);
        });
    }

    public function scopeWhereType(Builder $query, string $type)
    {
        return $query->where('type', $type);
    }
}
