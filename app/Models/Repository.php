<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repository extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'name',
        'ingest_token',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'ingest_token' => 'uuid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }
}
