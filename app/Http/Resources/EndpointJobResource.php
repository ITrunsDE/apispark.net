<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EndpointJobResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'endpoint' => EndpointResource::make($this->endpoint),
            'interval' => IntervalResource::make($this->interval)->interval,
            'last_run' => $this->last_run,
            'next_run' => $this->last_run->addMinutes($this->interval->interval),
            'updated_at' => $this->updated_at
        ];
    }
}
