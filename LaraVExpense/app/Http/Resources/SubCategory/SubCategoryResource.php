<?php

namespace App\Http\Resources\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'description' => $this->description,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user?->name,
                'email' => $this->user?->email,
            ],
            'category' => [
                'id' => $this->category?->id,
                'transactionType' => $this->category?->transactionType,
                'name'=> $this->category?->name,
                'description'=> $this->category?->description,
            ]
        ];
    }
}
