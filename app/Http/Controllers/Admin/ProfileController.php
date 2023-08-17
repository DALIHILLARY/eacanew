<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProfileRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Profile;
use Illuminate\Http\Request;
use Flash;

class ProfileController extends AppBaseController
{
    /**
     * Display a listing of the Profile.
     */
    public function index(Request $request)
    {
        /** @var Profile $profiles */
        $profiles = Profile::paginate(10);

        return view('admin.profiles.index')
            ->with('profiles', $profiles);
    }


    /**
     * Show the form for creating a new Profile.
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created Profile in storage.
     */
    public function store(CreateProfileRequest $request)
    {
        $input = $request->all();

        /** @var Profile $profile */
        $profile = Profile::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/profiles.singular')]));

        return redirect(route('admin.profiles.index'));
    }

    /**
     * Display the specified Profile.
     */
    public function show($id)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);

        if (empty($profile)) {
            Flash::error(__('models/profiles.singular').' '.__('messages.not_found'));

            return redirect(route('admin.profiles.index'));
        }

        return view('admin.profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified Profile.
     */
    public function edit($id)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);

        if (empty($profile)) {
            Flash::error(__('models/profiles.singular').' '.__('messages.not_found'));

            return redirect(route('admin.profiles.index'));
        }

        return view('admin.profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified Profile in storage.
     */
    public function update($id, UpdateProfileRequest $request)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);

        if (empty($profile)) {
            Flash::error(__('models/profiles.singular').' '.__('messages.not_found'));

            return redirect(route('admin.profiles.index'));
        }

        $profile->fill($request->all());
        $profile->save();

        Flash::success(__('messages.updated', ['model' => __('models/profiles.singular')]));

        return redirect(route('admin.profiles.index'));
    }

    /**
     * Remove the specified Profile from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);

        if (empty($profile)) {
            Flash::error(__('models/profiles.singular').' '.__('messages.not_found'));

            return redirect(route('admin.profiles.index'));
        }

        $profile->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/profiles.singular')]));

        return redirect(route('admin.profiles.index'));
    }
}
