<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile');
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $profile = $user->profile ?? new Profile([
        'user_id' => $user->id,
        ]);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $profile->profile_image = $path;
        }

        $profile->name = $request->input('name');
        $profile->postcode = $request->input('postcode');
        $profile->address = $request->input('address');
        $profile->building = $request->input('building');
        $profile->save();

        $user->profile_completed = true;
        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'プロフィールを更新しました！');
    }
}
