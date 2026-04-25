<?php

namespace App\Http\Requests\Account;

use App\Dtos\Account\AccountCreateDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes','string','max:100'],
            'accountNo' => ['sometimes','string','max:20'],
            'openingBalance' => ['sometimes','numeric'],
            'description'=> ['nullable','string','max:200'],
        ];
    }

    public function toDTO() {
        $data = $this->validated();

        return AccountCreateDTO::from([
            'name'=> $data['name'] ?? null,
            'accountNo'=> $data['accountNo'] ?? null,
            'openingBalance'=> isset($data['openingBalance']) ? (int) $data['openingBalance'] : null,
            'description'=> $data['description'] ?? null,
        ]);
    }
}
