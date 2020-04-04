<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Queries\Backend\UsersQuery;
use App\Http\Requests\Backend\StoreUser;
use App\Http\Requests\Backend\UpdateUser;
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
            return redirect()->route('backend.users.show', $users->first());
        }

        return view('backend.users.index', [
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

        return view('backend.users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\StoreUser  $request
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
            __(':name has been created!', ['name' => $user->full_name])
        );

        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', [
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

        return view('backend.users.edit', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\UpdateUser  $request
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
            __(':name has been updated!', ['name' => $user->full_name])
        );

        return redirect()->route('backend.users.show', $user);
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
            __(':name has been deleted!', ['name' => $user->full_name])
        );

        return redirect()->route('backend.users.index');
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
            __(':name has been restored!', ['name' => $user->full_name])
        );

        return redirect()->route('backend.users.index');
    }
}
