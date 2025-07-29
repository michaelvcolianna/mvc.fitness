<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workout extends Model
{
    /**
     * Get the grouping the workout is a part of.
     */
    public function grouping(): BelongsTo
    {
        return $this->belongsTo(Grouping::class);
    }

    /**
     * Get the user the workout belongs to.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the workout's exercises.
     */
    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }
}
