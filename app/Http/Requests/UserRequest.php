<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'name' => 'max:191|required',
                    'surnames' => 'max:191|required',
                    'email' => 'required|email|max:191|unique:users,email',
                    'password' => 'required|string|min:6|confirmed',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                'name' => 'max:191|required',
                'surnames' => 'max:191|required',
                'email' => 'required|email|max:191|unique:users,email,'.$this->get('id'),
                'password' => 'nullable|min:6'
                ];
            }
            default:break;
        }
    }
}
