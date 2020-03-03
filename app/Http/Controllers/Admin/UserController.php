<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Queries\Admin\UsersQuery;
use App\Http\Requests\Admin\StoreUser;
use App\Http\Requests\Admin\UpdateUser;
use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new UsersQuery;

        if ($request->input('filter.s') && $users->count() === 1) {
            return redirect()->route('admin.users.show', $users->first());
        }

        return view('admin.users.index', [
            'search' => $request->input('filter.s'),
            'users' => $users->paginate()->appends($request->query()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = User::create($request->except('password') + [
            'password' => Hash::make($request->input('password')),
        ]);

        if ($user instanceof MustVerifyEmail) {
            $user->markEmailAsVerified();
        }

        $user->assignRole($request->input('role_id'));

        flash()->success(
            __(':name has been created!', ['name' => $user->fullName])
        );

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateUser  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        if ($user instanceof MustVerifyEmail && $user->email !== $request->input('email')) {
            $user->markEmailAsVerified();
        }

        if ($password = $request->input('password')) {
            $user->password = Hash::make($password);
        }

        $user->fill($request->except('password'))
             ->syncRoles($request->input('role_id'))
             ->save();

        flash()->success(
            __(':name has been updated!', ['name' => $user->fullName])
        );

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash()->warning(
            __(':name has been deleted!', ['name' => $user->fullName])
        );

        return redirect()->route('admin.users.index');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(int $id)
    {
        $user = tap(User::onlyTrashed()->findOrFail($id))->restore();

        flash()->warning(
            __(':name has been restored!', ['name' => $user->fullName])
        );

        return redirect()->route('admin.users.index');
    }
}
