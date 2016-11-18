<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class UserController extends Controller
{
    /**
     * Display the users index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = User::all();

        return view('backend.user.index', compact('data'));
    }

    /**
     * Display the add a new user page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a new user in the database.
     *
     * @param UserCreateRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(UserCreateRequest $request)
    {
        $user = new User();
        $user->fill($request->toArray())->save();
        $user->password = bcrypt($request->password);
        $user->save();

        Session::set('_new-user', trans('messages.create_success', ['entity' => 'user']));

        return redirect('/admin/user');
    }

    /**
     * Display the edit user page.
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('backend.user.edit', compact('data'));
    }

    /**
     * Update the user information.
     *
     * @param UserUpdateRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = User::findOrFail($id);
        $data->fill($request->toArray())->save();
        $data->save();

        Session::set('_updateUser', trans('messages.update_success', ['entity' => 'User']));

        return redirect()->route('admin.user.edit', compact('data'));
    }

    /**
     * Display the user password privacy page.
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function privacy($id)
    {
        $data = User::findOrFail($id);

        return view('backend.user.privacy', compact('data'));
    }

    /**
     * Update the users password.
     *
     * @param PasswordUpdateRequest $request
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function updatePassword(PasswordUpdateRequest $request, $id)
    {
        User::where('id', $id)->update(['password' => bcrypt($request->new_password)]);

        Session::set('_updatePassword', trans('messages.update_success', ['entity' => 'Password']));

        return redirect('/admin/user/'.$id.'/edit');
    }

    /**
     * Delete a user.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // First, assign all the posts authored by this user to another existing user in the system.
        $existingUser = User::where('id', '!=', $id)->first();
        DB::table('posts')
            ->where('user_id', $id)
            ->update(['user_id' => $existingUser->id]);

        // Now the user can be removed from the system.
        $user = User::findOrFail($id);
        $user->delete();

        Session::set('_delete-user', trans('messages.delete_success', ['entity' => 'User']));

        return redirect('/admin/user');
    }
}
