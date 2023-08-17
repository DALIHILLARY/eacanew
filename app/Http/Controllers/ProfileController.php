<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Profile;
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

        return view('profiles.index')
            ->with('profiles', $profiles);
    }


    /**
     * Show the form for creating a new Profile.
     */
    public function create()
    {
        return view('profiles.create');
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

        return redirect(route('profiles.index'));
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

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profile', $profile);
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

            return redirect(route('profiles.index'));
        }

        return view('profiles.edit')->with('profile', $profile);
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

            return redirect(route('profiles.index'));
        }

        $profile->fill($request->all());
        $profile->save();

        Flash::success(__('messages.updated', ['model' => __('models/profiles.singular')]));

        return redirect(route('profiles.index'));
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

            return redirect(route('profiles.index'));
        }

        $profile->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/profiles.singular')]));

        return redirect(route('profiles.index'));
    }
}
