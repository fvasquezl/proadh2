<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class SaveUserRequest extends FormRequest
{
    /**
     * @var Route
     */
    private $route;


    /**
     * SaveUserRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }


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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'=> ['required','string', 'max:255','min:3'],
            'username' => ['required','string', 'max:255','min:3',Rule::unique('users')],
            'email' => ['required','string', 'email', 'max:255',Rule::unique('users')],
        ];

        if ($this->method() === 'POST') {
            $rules['password'] = ['required', 'string', 'min:6'];
        }

        if ($this->method() === 'PUT') {
            $rules['username'] = ['required',
                'string',
                'max:255',
                'min:3',
                Rule::unique('users')->ignore($this->route('user')->id)
            ];
            $rules['email'] = ['required',
                'string',
                'email',
                'max:255',Rule::unique('users')->ignore($this->route('user')->id)
            ];

            if($this->filled('password')){
                $rules['password'] = ['confirmed','min:6'];
            }
        }
        return $rules;
    }

    public function createUser()
    {
        return User::create($this->all());
    }

    public function updateUser($user)
    {
        $user->fill([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
        ]);

        if ($this->password != null) {
            $user->password = $this->password;
        }

        $user->save();
    }
}
