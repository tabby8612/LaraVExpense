<?php

namespace App\Http\Requests\SubCategory;

use App\Dtos\SubCategory\SubCategoryDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubCategoryUpdateRequest extends FormRequest
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
            'categoryID'=> ['nullable', 'numeric', Rule::exists('categories', 'id')->where('createdBy', Auth::id())->whereNull('deleted_at')],
            'name' => ['nullable','string','max:200'],
            'description' => ['nullable','string','max:200'],
        ];
    }

    public function toDTO() {
        $data = $this->validated();

        return SubCategoryDTO::from([
            'createdBy' => Auth::id(),
            'categoryID'=> $data['categoryID'] ?? null,
            'name' => $data['name'] ?? '',
            'description'=> $data['description'] ?? '',
        ]);
    }
}
