<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|numeric',
            'wedding_date' => 'required|date|after:today',
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal 255 karakter.',
        
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email maksimal 255 karakter.',
        
        'phone_number.required' => 'Nomor telepon wajib diisi.',
        'phone_number.digits_between' => 'Nomor telepon harus antara 10 hingga 15 digit.', 

        'wedding_date.required' => 'Tanggal pernikahan wajib diisi.',
        'wedding_date.after' => 'Tanggal pernikahan harus setelah hari ini.',

    ];
}

    
}
