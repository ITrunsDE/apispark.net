<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Interval extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'interval',
    ];

    public $timestamps = false;

    public function endpointJobs(): HasMany
    {
        return $this->hasMany(related: EndpointJob::class);
    }
}
