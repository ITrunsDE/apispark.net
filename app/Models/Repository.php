<?php

namespace App\Models;

use App\Services\LogscaleClient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'ingest_token',
        'active',
        'verification_token',
        'verified_at',
        'base_url',
    ];

    protected $casts = [
        'active' => 'boolean',
        'verified_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    public function endpointJobs(): HasMany
    {
        return $this->hasMany(related: EndpointJob::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where(column: 'active', operator: '=', value: 1)
            ->whereNotNull(columns: 'verified_at');
    }

    public function send_verification(): bool
    {
        // only send if not verified
        if (! is_null($this->verified_at)) {
            return false;
        }

        $logscale = new LogscaleClient(
            repository: $this->name,
            ingest_token: $this->ingest_token,
            base_url: $this->base_url,
            host: 'apispark.net/1.0'
        );

        $logscale->create_structured_event([
            'verification_token' => $this->verification_token,
        ])->send();

        return true;
    }
}
