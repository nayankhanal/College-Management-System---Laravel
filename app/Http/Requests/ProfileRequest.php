<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {$id = $this->route('profile')->id;
        // dd(request());
        return [
            'name'=>['required','string','max:255'],
            // 'email'=>['required','email','unique:users,email,' .$id],
            // 'password'=>['required','string','max:255','confirmed'],
            'role'=>['required','in:admin,teacher,student'],
            'image'=>['nullable','file','mimes:jpeg,png','max:2048']
        ];
    }
}
