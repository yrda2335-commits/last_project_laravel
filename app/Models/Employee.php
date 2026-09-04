<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department_id',
        'job_title',
        'hired_at',
    ];

    protected $casts = [
        'hired_at' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function trainings(): BelongsToMany
    {
        return $this->belongsToMany(Training::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}