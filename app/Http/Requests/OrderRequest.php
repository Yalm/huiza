<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191|string',
            'surnames' => 'required|max:191|string',
            'note_customer'  => 'nullable|max:500|string',
            'document_id' => 'nullable|numeric',
            'document_number' => 'nullable|numeric|digits_between:08,20',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email|max:191',
            'voucher' => 'nullable|image',    
        ];
    }
}
