<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisteredController extends Controller
{
    //
    public function createEmployer()
    {
        return view('auth.registerEmployer');
    }

    public function createApplicant()
    {
        return view('auth.registerApplicant');
    }

    public function editEmployer()
    {
        if (!Auth::check() || Auth::user()->user_type !== 'employer') {
            return redirect('/')->with('error', 'Access denied');
        }

        $user = Auth::user();
        $employer = $user->employer;

        return view('employer.edit-profile', compact('user', 'employer'));
    }

    public function updateEmployer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'company_name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);

        $user = Auth::user();
        $employer = $user->employer;

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Store new avatar and update user
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Update user (including avatar if uploaded)
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Update employer
        $employer->update([
            'company_name' => $request->company_name,
            'location' => $request->location,
            'instagram_url' => $request->instagram_url,
            'facebook_url' => $request->facebook_url,
            'github_url' => $request->github_url,
        ]);

        return redirect('/jobs/' . $employer->id)->with('success', 'Profile updated successfully!');
    }
}
