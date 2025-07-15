<?php

namespace App\Http\Requests;

use App\Rules\EmailRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    protected $redirect = '/request';
    protected $stopOnFirstFailure = false;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return auth()->check();
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'email' => $this->email,
        ]);
    }


    public function passedValidation()
    {
        $this->replace(['pass' => bcrypt($this->pass)]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                new EmailRule(),
                'max:15'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Мыло обязательно',
            'email.email' => 'Мыло не корректно'
        ];
    }
}
