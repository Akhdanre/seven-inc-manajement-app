<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ubah menjadi true jika ingin mengizinkan permintaan ini
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'required|string|max:100',
            'name' => 'required|string|max:200',
            'birth_place' => 'required|string|max:100',
            'birth_date' => 'required|string|10',
            'email' => 'required|email|max:200',
            'password' => 'required|string|min:8|max:255',
        ];
    }
}
