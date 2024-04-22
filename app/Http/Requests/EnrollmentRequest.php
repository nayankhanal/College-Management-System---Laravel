<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Enrollment;

class EnrollmentRequest extends FormRequest
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
        return [
            'student_id'=>['required','numeric','exists:students,id'],
            'course_id'=>['required','numeric','exists:courses,id',
                            function ($attribute, $value, $fail) {
                                if(Enrollment::where('student_id', $this->student_id)->where('course_id', $value)->exists()){
                                    $fail('Student has already enrolled to the given course!');
                                }
                            }
            ],
        ];
    }
}
