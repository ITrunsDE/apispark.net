<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EndpointJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'repository_id',
        'interval_id',
        'active',
        'last_run',
    ];

    protected $casts = [
        'active' => 'boolean',
        'last_run' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    public function repository(): BelongsTo
    {
        return $this->belongsTo(related: Repository::class);
    }

    public function interval(): BelongsTo
    {
        return $this->belongsTo(Interval::class);
    }
}
