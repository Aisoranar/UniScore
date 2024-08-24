<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'cedula' => 'required|string', // Cambiado de 'username' a 'cedula'
            'password' => 'required|string',
            'role' => 'required|in:user,admin', // Asegúrate de validar el rol
        ];
    }

    /**
     * Get the credentials for authentication.
     *
     * @return array<string, string>
     */
    public function getCredentials(): array
    {
        return [
            'cedula' => $this->input('cedula'), // Cambiado de 'username' a 'cedula'
            'password' => $this->input('password'),
        ];
    }

    /**
     * Check if the provided value is a valid email address.
     *
     * @param  string  $value
     * @return bool
     */
    protected function isEmail(string $value): bool
    {
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['cedula' => $value], ['cedula' => 'email'])->fails();
    }
}
