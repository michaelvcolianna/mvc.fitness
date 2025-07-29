<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    /**
     * Get the grouping the exercise is a part of.
     */
    public function grouping(): BelongsTo
    {
        return $this->belongsTo(Grouping::class);
    }

    /**
     * Get the set the exercise is a part of.
     */
    public function set(): BelongsTo
    {
        return $this->belongsTo(Set::class);
    }

    /**
     * Get the user the exercise belongs to.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the workout the exercise is a part of.
     */
    public function workout(): BelongsTo
    {
        return $this->belongsTo(Workout::class);
    }
}
