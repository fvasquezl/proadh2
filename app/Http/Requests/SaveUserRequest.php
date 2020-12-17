<?php

namespace App\Http\Requests;

use App\Events\UserWasCreated;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'username' => ['required', 'string', 'max:255', 'min:3', Rule::unique('users')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
        ];

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
                'max:255', Rule::unique('users')->ignore($this->route('user')->id)
            ];

            if ($this->filled('password')) {
                $rules['password'] = ['confirmed', 'min:6'];
            }
        }
        return $rules;
    }

    public function createUser()
    {
        $password =$this['password'] = Str::random(8);
        $user = User::create($this->all());
        $user->assignRole($this->roles);
        $user->givePermissionTo($this->permissions);

        UserWasCreated::dispatch($user,$password);


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
