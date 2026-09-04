<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Training extends Model
{
    protected $fillable = [
        'title',
        'provider',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}