<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Flash;

class CountryController extends AppBaseController
{
    /**
     * Display a listing of the Country.
     */
    public function index(Request $request)
    {
        /** @var Country $countries */
        $countries = Country::latest()->paginate(10);

        return view('admin.countries.index')
            ->with('countries', $countries);
    }


    /**
     * Show the form for creating a new Country.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created Country in storage.
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        /** @var Country $country */
        $country = Country::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/countries.singular')]));

        return redirect(route('admin.countries.index'));
    }

    /**
     * Display the specified Country.
     */
    public function show($id)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('models/countries.singular').' '.__('messages.not_found'));

            return redirect(route('admin.countries.index'));
        }

        return view('admin.countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     */
    public function edit($id)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('models/countries.singular').' '.__('messages.not_found'));

            return redirect(route('admin.countries.index'));
        }

        return view('admin.countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     */
    public function update($id, UpdateCountryRequest $request)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('models/countries.singular').' '.__('messages.not_found'));

            return redirect(route('admin.countries.index'));
        }

        $country->fill($request->all());
        $country->save();

        Flash::success(__('messages.updated', ['model' => __('models/countries.singular')]));

        return redirect(route('admin.countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('models/countries.singular').' '.__('messages.not_found'));

            return redirect(route('admin.countries.index'));
        }

        $country->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/countries.singular')]));

        return redirect(route('admin.countries.index'));
    }
}
