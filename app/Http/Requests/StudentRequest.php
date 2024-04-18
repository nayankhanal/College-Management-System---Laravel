<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
    {
        // $id = $this->route('student')->id;
        return [
            'user_id'=>['required','numeric','exists:users,id'],
            'course_id'=>['required','numeric','exists:courses,id'],
            // 'student_course_combination'=>['unique:students,user_id,NULL,id,course_id,' .request()->input('course_id') . ',deleted_at,NULL',]
        ];
    }
}
