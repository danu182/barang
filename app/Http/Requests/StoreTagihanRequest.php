<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagihanRequest extends FormRequest
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
            'vendor_id' => 'required|exists:vendors,id',
            'pelanggan_id'=>'required|exists:pelanggans,id',
            'noTagihan' => 'required|string|max:255',
            'tanggalTagihan' => 'date',
            'periodeTagihan' => 'nullable|string',
            'dueDateTagihan' => 'date',

            'total' => 'required|numeric|min:0', // Crucial for final amount

            'grandTotal' => 'required|numeric|min:0', // Crucial for final amount

            'pajak' => 'nullable|numeric|min:0', // This is your hidden input value for VAT rate
            'denda' => 'nullable|numeric|min:0',

            'diskon' => 'nullable|numeric|min:0|max:100',

            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Max 2MB
            'keterangan' => 'nullable|string',

            'namaItem.*' => 'nullable|string|max:255',
            'jumlah.*' => 'required|integer|min:0',
            'hargaSatuan.*' => 'required|numeric|min:0',
            'subtotal.*' => 'required|numeric|min:0',

        ];
    }


    public function messages(): array
    {
        return [
            'vendor_id.required' => 'Nama vendor harus dipilih.',
            'pelanggan_id.required' => 'Nama pelanggan harus dipilih.',
            'noTagihan.unique' => 'Nomor tagihan ini sudah ada.',
            'dueDateTagihan.after_or_equal' => 'Tanggal jatuh tempo harus setelah atau sama dengan tanggal tagihan.',
            // Add more custom messages as needed
        ];
    }
}
