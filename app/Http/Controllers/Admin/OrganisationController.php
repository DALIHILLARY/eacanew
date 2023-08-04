<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateOrganisationRequest;
use App\Http\Requests\Admin\UpdateOrganisationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Organisation;
use Illuminate\Http\Request;
use Flash;

class OrganisationController extends AppBaseController
{
    /**
     * Display a listing of the Organisation.
     */
    public function index(Request $request)
    {
        /** @var Organisation $organisations */
        $organisations = Organisation::latest()->paginate(10);

        return view('admin.organisations.index')
            ->with('organisations', $organisations);
    }


    /**
     * Show the form for creating a new Organisation.
     */
    public function create()
    {
        $countries = \App\Models\Admin\Country::pluck('name', 'id');
        return view('admin.organisations.create')->with('countries', $countries);
    }

    /**
     * Store a newly created Organisation in storage.
     */
    public function store(CreateOrganisationRequest $request)
    {
        $input = $request->all();

        /** @var Organisation $organisation */
        $organisation = Organisation::create($input);

        

        Flash::success(__('messages.saved', ['model' => __('models/organisations.singular')]));

        return redirect(route('admin.organisations.index'));
    }

    /**
     * Display the specified Organisation.
     */
    public function show($id)
    {
        /** @var Organisation $organisation */
        $organisation = Organisation::find($id);

        if (empty($organisation)) {
            Flash::error(__('models/organisations.singular').' '.__('messages.not_found'));

            return redirect(route('admin.organisations.index'));
        }

        return view('admin.organisations.show')->with('organisation', $organisation);
    }

    /**
     * Show the form for editing the specified Organisation.
     */
    public function edit($id)
    {
        /** @var Organisation $organisation */
        $organisation = Organisation::find($id);

        if (empty($organisation)) {
            Flash::error(__('models/organisations.singular').' '.__('messages.not_found'));

            return redirect(route('admin.organisations.index'));
        }

        return view('admin.organisations.edit')->with('organisation', $organisation);
    }

    /**
     * Update the specified Organisation in storage.
     */
    public function update($id, UpdateOrganisationRequest $request)
    {
        /** @var Organisation $organisation */
        $organisation = Organisation::find($id);

        if (empty($organisation)) {
            Flash::error(__('models/organisations.singular').' '.__('messages.not_found'));

            return redirect(route('admin.organisations.index'));
        }

        $organisation->fill($request->all());
        $organisation->save();

        Flash::success(__('messages.updated', ['model' => __('models/organisations.singular')]));

        return redirect(route('admin.organisations.index'));
    }

    /**
     * Remove the specified Organisation from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Organisation $organisation */
        $organisation = Organisation::find($id);

        if (empty($organisation)) {
            Flash::error(__('models/organisations.singular').' '.__('messages.not_found'));

            return redirect(route('admin.organisations.index'));
        }

        $organisation->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/organisations.singular')]));

        return redirect(route('admin.organisations.index'));
    }
}
