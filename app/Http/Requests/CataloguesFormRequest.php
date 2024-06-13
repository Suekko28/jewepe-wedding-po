<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CataloguesFormRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'status_publish' => 'required|in:publish,draft',
        ];
    }
    

    public function messages(): array
{
    return [
        'image.required' => 'Gambar harus diisi.',
        'package_name.required' => 'Nama paket harus diisi.',
        'package_name.max' => 'Nama paket tidak boleh lebih dari 255 karakter.',
        'description.required' => 'Deskripsi harus diisi.',
        'description.string' => 'Deskripsi harus berupa teks.',
        'price.required' => 'Harga harus diisi.',
        'price.integer' => 'Harga harus berupa angka.',
        'price.min' => 'Harga tidak boleh kurang dari 0.',
        'status_publish.required' => 'Status publikasi harus diisi.',
        'status_publish.in' => 'Status publikasi harus salah satu dari: publish, draft.',
    ];
}

}
