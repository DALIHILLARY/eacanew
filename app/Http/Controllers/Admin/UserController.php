<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;

class UserController extends AppBaseController
{
    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        /** @var User $users */
        $users = User::paginate(10);

        return view('admin.users.index')
            ->with('users', $users);
    }


    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = User::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/users.singular')]));

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error(__('models/users.singular').' '.__('messages.not_found'));

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error(__('models/users.singular').' '.__('messages.not_found'));

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error(__('models/users.singular').' '.__('messages.not_found'));

            return redirect(route('admin.users.index'));
        }

        $user->fill($request->all());
        $user->save();

        Flash::success(__('messages.updated', ['model' => __('models/users.singular')]));

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error(__('models/users.singular').' '.__('messages.not_found'));

            return redirect(route('admin.users.index'));
        }

        $user->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/users.singular')]));

        return redirect(route('admin.users.index'));
    }
}
