<?php

namespace App\Http\Requests\Account;

use App\Dtos\Account\AccountDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AccountCreateRequest extends FormRequest
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
            'name' => ['required','string','max:100'],
            'accountNo' => ['required','string','max:20'],
            'openingBalance' => ['required','numeric'],
            'description'=> ['nullable','string','max:200'],
        ];
    }

    public function toDTO() {
        $data = $this->validated();

        return AccountDTO::from([
            'name'=> $data['name'],
            'accountNo'=> $data['accountNo'],
            'openingBalance'=> (int) $data['openingBalance'],
            'description'=> $data['description'] ?? '',
        ]);
    }
}
