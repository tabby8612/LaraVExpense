<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'transactionType' => $this->transactionType,
            'name' => $this->name,
            'description' => $this->description,
            'color' => $this->color,
            'user' => [
                'id' => $this->user?->id,
                'name'=> $this->user?->name,
                'email'=> $this->user?->email,
            ],
        ];
    }
}
