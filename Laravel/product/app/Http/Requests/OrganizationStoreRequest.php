<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationStoreRequest extends FormRequest
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
            'org_name' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone_no' => 'required|numeric|digits:10',
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'org_name.required' => 'Organization name is required',
            'name.required' => 'User name is required',
            'email.required' => 'Email is required',
            'phone_no.required' => 'Phone number is required',
            'password.required' => 'Password is required',
            'role_id.required' => 'Role is required'
        ];
    }
}
