<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Session;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user profile page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userData = Auth::user()->toArray();
        $blogData = config('blog');
        $data = array_merge($userData, $blogData);

        return view('backend.profile.index', compact('data'));
    }

    /**
     * Display the user profile privacy page.
     *
     * @return \Illuminate\View\View
     */
    public function editPrivacy()
    {
        return view('backend.profile.privacy', [
            'data' => array_merge(Auth::user()->toArray(), config('blog')),
        ]);
    }

    /**
     * Update the user profile information.
     *
     * @param ProfileUpdateRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->toArray())->save();
        $user->save();

        Session::set('_profile', trans('messages.update_success', ['entity' => 'Profile']));

        return redirect()->route('admin.profile.index');
    }
}
