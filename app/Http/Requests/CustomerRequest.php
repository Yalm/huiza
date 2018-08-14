<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'phone' => 'nullable|numeric|digits_between:09,15',
                    'name' => 'max:191|required',
                    'surnames' => 'max:191|required',
                    'avatar' => 'image',
                    'email' => 'required|email|max:191|unique:customers,email',
                    'password' => 'required|string|min:6|confirmed',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                'phone' => 'nullable|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:20',
                'name' => 'max:191|required',
                'surnames' => 'max:191|nullable',
                'document_id' => 'nullable|numeric',
                'document_number' => 'nullable|numeric|digits_between:08,20',
                'email' => 'required|email|max:191|unique:customers,email,'.$this->get('id'),
                'password' => 'nullable|min:6'
                ];
            }
            default:break;
        }
    }
}
