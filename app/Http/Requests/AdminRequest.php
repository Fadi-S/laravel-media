<?php

namespace App\Http\Requests;

use App\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|unique:admins,phone',
            'password' => 'required|min:6|max:64',
            'role_id' => 'required|not_in:0',
        ];
        if($this->method() == "PATCH") {
            array_pull($rules, "password");
            $rules["email"] = 'required|email|unique:admins,email,'.$this->admin->id;
            $rules["phone"] = 'required|unique:admins,phone,'.$this->admin->id;
        }
        return $rules;
    }
}
