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
        
        $rules = [
            'name' => 'nullable|max:191|string',
            'surnames' => 'nullable|max:191|string',
            'phone' => 'nullable|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:20',
            'note_customer'  => 'nullable|max:500|string',
            'voucher' => 'nullable|image',    
        ];

        if (($this->request->get('other_person')) == true) 
        {
            $rules['name'] = 'required|max:191|string';
            $rules['surnames'] = 'required|max:191|string';
            $rules['phone'] = 'required|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:20';            
        }

          return $rules;
    }
}
