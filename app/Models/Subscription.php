<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    // Relationships with User model
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationships with Website model
    public function website():BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
