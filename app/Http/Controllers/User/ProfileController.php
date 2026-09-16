<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view(
            'user.profile.index',
            [
                'user' => auth()->user()
            ]
        );
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'mobile' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users', 'mobile')
                    ->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }

    public function passwordForm()
    {
        return view('user.profile.password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password'
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ]);

        auth()->user()->update([
            'password' => Hash::make(
                $request->password
            ),
        ]);

        return back()->with(
            'success',
            'Password changed successfully.'
        );
    }
}