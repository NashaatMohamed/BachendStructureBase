<?php

namespace App\Http\Requests\AuthRequest;

use App\Http\Requests\Base\ApiRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required,email",
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => 'required|same:password',
            "name" => "required",
            "phone" => "required"
        ];
    }

    //Minimum length of 8 characters.
    //Must contain a mix of upper and lower case letters.
    //Must include numbers.
    //Must have symbols.
    //Must not be a compromised password (by checking against a list of known compromised passwords).
}
