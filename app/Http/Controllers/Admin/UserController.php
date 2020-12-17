<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * @param UsersDataTable $dataTable
     * @return mixed
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = new User;
        $this->authorize('create', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }


    public function store(SaveUserRequest $request)
    {
        $this->authorize('create', new User);
        $request->createUser();
        return redirect()->back()->with('status', 'The user has been created successfully');
    }


    /**
     * @param User $user
     * @throws AuthorizationException
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }


    /**
     * @param User $user
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }


    /**
     * @param SaveUserRequest $request
     * @param User $user
     * @return mixed
     * @throws AuthorizationException
     */
    public function update(SaveUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $request->updateUser($user);

        return redirect()->route('admin.users.edit',$user)
            ->with('status', 'The User has been updated successfully');
    }


    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('status', 'The User has been delete successfully');
    }
}
