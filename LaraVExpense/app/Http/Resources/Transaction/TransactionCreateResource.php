<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Transaction Created Successfully',
            'data' => [
                'id'=> $this->resource->id,
                'slug' => $this->resource->slug,
                'name' => $this->resource->name,
                'referenceNo' => $this->resource->referenceNo,
                'amount' => (int) $this->resource->amount,
                'accountID' => $this->resource->accountID,
                'categoryID' => $this->resource->categoryID,
                'subCategoryID' => $this->resource->subCategoryID,
                'note' => $this->resource->note,
                'date' => $this->resource->date,
            ],
            'success' => true
        ];
    }
}
