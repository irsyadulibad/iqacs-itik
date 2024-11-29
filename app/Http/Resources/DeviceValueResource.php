<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceValueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $label = $this->created_at ?
            $this->created_at->format('H:i') :
            $this->label;

        return [
            'label' => $label,
            'value' => $this->value,
        ];
    }
}
