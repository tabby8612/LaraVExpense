<?php

namespace App\Http\Requests\User;

use App\Dtos\User\UserRegisterDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UserRegisterRequest extends FormRequest
{
    public $userData;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function toDTO()
    {
        $data = $this->validated();
        
        return UserRegisterDTO::from([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password'=> $data['password'],
            'role'=> $data['role'],
        ]);             
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required','email', Rule::unique('users', 'email')],
            'password'=> ['required','string','min:5'],
            'role' => ['required','in:1,2'],
        ];
    }

    



    
}
