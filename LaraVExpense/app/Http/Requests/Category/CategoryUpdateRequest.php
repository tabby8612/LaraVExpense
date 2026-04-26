<?php

namespace App\Http\Requests\Category;

use App\Dtos\Category\CategoryCreateDTO;
use App\Dtos\Category\CategoryDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryUpdateRequest extends FormRequest
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
            'transactionType' => ['nullable', 'numeric', 'in:1,2'],
            'name' => ['nullable', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:200'],
            'color' => ['nullable', 'hex_color'],
        ];
    }

    public function toDTO() {
        $data = $this->validated();

        return CategoryDTO::from([
            'createdBy'=> Auth::id(),
            'transactionType'=> $data['transactionType'] ?? null,
            'name'=> $data['name'] ?? null,
            'description'=> $data['description'] ?? null,
            'color'=> $data['color'] ?? null,
        ]);
    }
}
