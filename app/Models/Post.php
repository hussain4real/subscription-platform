<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    //guarded
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    // Relationships with Website model
    public function website():BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
