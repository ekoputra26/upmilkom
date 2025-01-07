<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GantiPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->session()->has('id_user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_lama' => 'required',
            'password_baru' => 'required|min:3|confirmed',
            'password_baru_confirmation' => 'required|min:3'
        ];
    }

    public function messages()
{
    return [
        'password_lama.required' => 'Password lama harus diisi',
        'password_lama.password' => 'Password lama salah',
        'password_baru.required' => 'Password baru harus diisi',
        'password_baru.confirmed' => 'Password baru tidak sama dengan kolom konfirmasi',
        'password_baru_confirmation.required' => 'Konfirmasi password baru harus sama dengan kolom password baru'
    ];
}
}
