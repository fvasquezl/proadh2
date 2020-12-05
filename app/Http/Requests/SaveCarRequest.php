<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCarRequest extends FormRequest
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
//        $rules = [
//            'name'=> ['required','string', 'max:255'],
//            'username' => ['required','string', 'max:255',Rule::unique('users')],
//            'email' => ['required','string', 'email', 'max:255',Rule::unique('users')],
//            'password'=> ['required', 'string', 'min:8']
//        ];
//
//        if ($this->method() === 'PUT') {
//            $rules['password'] = ['sometimes'];
//        }
//
//        return $rules;
    }

    public function createUser()
    {
        return User::create($this->all());
    }
    public function updateUser($user)
    {
        $user->update($this->all());
        return $user;
    }
}
