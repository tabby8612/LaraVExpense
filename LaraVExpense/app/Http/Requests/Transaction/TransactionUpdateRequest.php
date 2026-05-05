<?php

namespace App\Http\Requests\Transaction;

use App\Dtos\Transaction\TransactionDTO;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TransactionUpdateRequest extends FormRequest
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
            'type' => ['nullable', 'numeric', 'in:1,2'],
            'name' => ['nullable', 'string', 'max:200'],
            'referenceNo' => ['nullable', 'string', 'max:200'],
            'amount' => ['nullable', 'numeric', 'gt:0'],
            'accountID' => ['nullable', 'numeric', Rule::exists('accounts', 'id')->where('userID', Auth::id())->whereNull('deleted_at')],
            'categoryID' => ['nullable', 'numeric', Rule::exists('categories', 'id')->where('createdBy', Auth::id())->whereNull('deleted_at')],
            'subCategoryID' => ['nullable', 'numeric', Rule::exists('sub_categories', 'id')->where('createdBy', Auth::id())->whereNull('deleted_at')],
            'note' => ['nullable', 'string', 'max:200'],
            'date' => ['required', Rule::date()->format('d-m-Y')]
        ];
    }

    public function toDTO() {
        $data = $this->validated();

        return TransactionDTO::from([
            'type' => $data['type'] ?? null,
            'userID' => Auth::id(),
            'name' => $data['name'] ?? '',
            'referenceNo' => $data['referenceNo'] ?? '',
            'amount' => (int) $data['amount'] ?? 0,
            'accountID' => (int) $data['accountID'] ?? 0,
            'categoryID' => (int) $data['categoryID'] ?? 0,
            'subCategoryID' => (int) $data['subCategoryID'] ?? 0,
            'note' => $data['note'] ?? '',
            'date' => Carbon::parse($data['date'])->startOfDay(),
        ]);
    }
}
