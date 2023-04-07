<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EndpointJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'endpoint_id',
        'interval_id',
        'last_run',
        'name',
        'repository_id',
        'user_id',
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

    public function endpoint(): BelongsTo
    {
        return $this->belongsTo(related: Endpoint::class);
    }
}
