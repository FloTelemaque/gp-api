<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:128', 'unique:users,email'],
            'password' => ['required', 'string', Password::min(8)->letters()->numbers()],
            'first_name' => ['nullable', 'string', 'max:64'],
            'last_name' => ['nullable', 'string', 'max:64'],
            'phone_number' => ['nullable', 'min:8', 'max:16'],
            'company_uuid' => ['required', 'uuid', 'exists:companies,uuid'],
        ];
    }


    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'Le nom est requis.',
    //         'name.string' => 'Le nom doit être une chaîne de caractères.',
    //         'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',

    //         'email.required' => 'L\'adresse email est requise.',
    //         'email.email' => 'L\'adresse email doit être valide.',
    //         'email.unique' => 'Cette adresse email est déjà utilisée.',
    //         'email.max' => 'L\'adresse email ne peut pas dépasser 255 caractères.',

    //         'password.required' => 'Le mot de passe est requis.',
    //         'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',

    //         'first_name.string' => 'Le prénom doit être une chaîne de caractères.',
    //         'first_name.max' => 'Le prénom ne peut pas dépasser 32 caractères.',

    //         'last_name.string' => 'Le nom de famille doit être une chaîne de caractères.',
    //         'last_name.max' => 'Le nom de famille ne peut pas dépasser 32 caractères.',

    //         'company_uuid.required' => 'L\'UUID de l\'entreprise est requis.',
    //         'company_uuid.uuid' => 'L\'UUID de l\'entreprise doit être un UUID valide.',
    //         'company_uuid.exists' => 'L\'entreprise spécifiée n\'existe pas.',
    //     ];
    // }

    /**
     * Get custom attribute names for validation.
     *
     * @return array<string, string>
     */
    // public function attributes(): array
    // {
    //     return [
    //         'name' => 'nom',
    //         'email' => 'adresse email',
    //         'password' => 'mot de passe',
    //         'first_name' => 'prénom',
    //         'last_name' => 'nom de famille',
    //         'company_uuid' => 'UUID de l\'entreprise',
    //     ];
    // }
}
