<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Account Created Successfully',
            'data' => [
                'id'=> $this->id,
                'userID' => $this->userID,
                'slug' => $this->slug,
                'name' => $this->name,
                'accountNo' => $this->accountNo,
                'openingBalance' => $this->openingBalance,
                'description' => $this->description,
            ],
            'success' => true
        ];
    }
}
