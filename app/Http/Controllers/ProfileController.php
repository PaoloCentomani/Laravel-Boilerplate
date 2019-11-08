<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', [
            'mustVerifyEmail' => $user instanceof MustVerifyEmail,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfile  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request)
    {
        $user = $request->user();

        if ($user instanceof MustVerifyEmail && $user->email !== $request->input('email')) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        if ($password = $request->input('password')) {
            $user->forceFill(['password' => Hash::make($password)]);
        }

        $user->fill($request->only('email'))
             ->save();

        flash()->success(__('Your profile has been updated!'));

        return redirect()->route('home');
    }
}
