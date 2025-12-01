<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class RegisteredController extends Controller
{
    //
    public function createEmployer()
    {
        return view('auth.registerEmployer');
    }

    public function storeEmployer(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'company_name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'user_type' => 'employer',
        ]);

        Employer::create([
            'user_id' => $user->id,
            'company_name' => $validated['company_name'],
            'location' => $validated['location'],
        ]);

        Auth::login($user);

        return redirect('/jobs/' . $user->employer->id)->with('success', 'Account created successfully!');
    }

    public function createApplicant()
    {
        return view('auth.registerApplicant');
    }

    public function storeApplicant(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'user_type' => 'applicant',
        ]);

        // Create applicant record
        Applicant::create([
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        return redirect('/home')->with('success', 'Account created successfully!');
    }
    public function editProfile()
    {
        $user = Auth::user();
        $employer = $user->employer;
        $credentials = $user->user_type === 'applicant' ? $user->credentials : collect();

        return view('employer.edit-profile', compact('user', 'employer', 'credentials'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate personal information
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $path;
        }

        // Update user
        $user->update($validated);

        // Handle employer-specific fields
        if ($user->user_type === 'employer' && $user->employer) {
            $user->employer->update($request->only([
                'company_name',
                'location',
                'instagram_url',
                'facebook_url',
                'github_url'
            ]));
        }

        // Handle applicant-specific fields
        if ($user->user_type === 'applicant' && $user->applicant) {
            $user->applicant->update($request->only([
                'instagram_url',
                'facebook_url',
                'github_url'
            ]));
        }

        // Handle applicant credentials
        if ($user->user_type === 'applicant') {
            $credentialTypes = ['education', 'certification', 'experience'];

            foreach ($credentialTypes as $type) {
                $data = $request->input("credentials.{$type}");

                if (!empty($data['title'])) {
                    if (isset($data['id'])) {
                        $user->credentials()->where('id', $data['id'])->update([
                            'title' => $data['title']
                        ]);
                    } else {
                        $user->credentials()->create([
                            'type' => $type,
                            'title' => $data['title']
                        ]);
                    }
                } else {
                    if (isset($data['id'])) {
                        $user->credentials()->where('id', $data['id'])->delete();
                    }
                }
            }
        }

        // Redirect based on user type
        if ($user->user_type === 'employer') {
            return redirect('/jobs/' . $user->employer->id)->with('success', 'Profile updated successfully!');
        } else {
            return redirect('/applicant/profile')->with('success', 'Profile updated successfully!');
        }
    }
}
