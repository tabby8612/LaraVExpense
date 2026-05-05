<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'type' => $this->resource->type,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'referenceNo' => $this->resource->referenceNo,
            'amount' => $this->resource->amount,
            'note' => $this->resource->note,
            'date' => $this->resource->date,
            'account' => [
                'id' => $this->resource->account?->id,
                'name' => $this->resource->account?->name,
                'accountNo' => $this->resource->account?->accountNo,
            ],
            'user' => [
                'id' => $this->resource->user?->id,
                'name' => $this->resource->user?->name,
                'email' => $this->resource->user?->email,
            ],
            'category' => [
                'id' => $this->resource->category?->id,
                'name' => $this->resource->category?->name,
            ],
            'subCategory' => [
                'id' => $this->resource->subCategory?->id,
                'name' => $this->resource->subCategory?->name,
            ],

        ];
    }
}
