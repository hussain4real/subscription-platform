<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;
    //guarded
    protected $guarded = [];

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

    // Relationships with Post model
    public function lastSeenPost():BelongsTo
    {
        return $this->belongsTo(Post::class, 'last_seen_post_id');
    }
}
