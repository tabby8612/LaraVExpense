<?php

namespace App\Http\Requests\Transaction;

use App\Dtos\Transaction\TransactionDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class TransactionCreateRequest extends FormRequest
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
            'type' => ['required', 'numeric', 'in:1,2'],
            'name' => ['required', 'string', 'max:200'],
            'referenceNo' => ['nullable', 'string', 'max:200'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'accountID' => ['required', 'numeric', Rule::exists('accounts', 'id')->where('userID', Auth::id())->whereNull('deleted_at')],
            'categoryID' => ['required', 'numeric', Rule::exists('categories', 'id')->where('createdBy', Auth::id())->whereNull('deleted_at')],
            'subCategoryID' => ['required', 'numeric', Rule::exists('sub_categories', 'id')->where('createdBy', Auth::id())->whereNull('deleted_at')],
            'note' => ['required', 'string', 'max:200'],
            'date' => ['required', 'date']
        ];
    }

    public function toDTO() {
        $data = $this->validated();

        return TransactionDTO::from([
            'type' => $data['type'],
            'userID' => Auth::id(),
            'name' => $data['name'],
            'slug' => Str::slug($data['slug'] . '-' . (string) rand(1,1000)),
            'referenceNo' => $data['referenceNo'] ?? '',
            'amount' => $data['amount'],
            'accountID' => $data['accountID'],
            'categoryID' => $data['categoryID'],
            'subCategoryID' => $data['subCategoryID'],
            'note' => $data['note'],
            'date' => $data['date'],
        ]);
    }
}
