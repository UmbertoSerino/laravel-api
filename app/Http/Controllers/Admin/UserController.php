<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new user();
        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:80'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'user_photo' => ['image', 'required'],
            'phone_number' => ['required'],

        ]);

        $imageSrc = Storage::put('uploads/user', $data['user_photo']);
        $data['user_photo'] = $imageSrc;

        $user = User::create($data);
        $user->userProfile()->create([
            'date_of_birth' => $data['date_of_birth'],
            'phone_number' => $data['phone_number'],
            'user_photo' => $imageSrc,
        ]);

        return redirect()->route('admin.users.show', $user);
    }


    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        $projects = Project::all();
        $usersProfile = UserProfile::all();
        return view('admin.users.show', compact('user', 'projects', 'usersProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $userData = $request->validate([
            'name' => ['required', 'max:80'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $profileData = $request->validate([
            'date_of_birth' => ['required', 'date'],
            'user_photo' => ['url', 'max:2048'],
            'phone_number' => ['required'],
        ]);

        $user->update($userData);
        $user->userProfile()->update($profileData);

        return redirect()->route('admin.users.show', $user);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
