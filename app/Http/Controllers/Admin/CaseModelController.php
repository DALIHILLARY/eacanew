<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCaseModelRequest;
use App\Http\Requests\Admin\UpdateCaseModelRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\CaseModel;
use App\Models\Admin\CaseType;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Flash;

class CaseModelController extends AppBaseController
{
    /**
     * Display a listing of the CaseModel.
     */
    public function index(Request $request)
    {
        /** @var CaseModel $caseModels */
        $caseModels = CaseModel::latest()->with('countries','categories')->paginate(10);

        return view('admin.case_models.index')
            ->with('caseModels', $caseModels);
    }


    /**
     * Show the form for creating a new CaseModel.
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $categories = CaseType::pluck('name', 'id');

        return view('admin.case_models.create', compact('countries', 'categories'));
    }

    /**
     * Store a newly created CaseModel in storage.
     */
    public function store(CreateCaseModelRequest $request)
    {
        $input = $request->all();
        /** @var CaseModel $caseModel */
        $caseModel = CaseModel::create($input);

        $caseModel->countries()->sync($request->input('countries', []));

        $caseModel->categories()->sync($request->input('categories', []));

        Flash::success(__('messages.saved', ['model' => __('models/case_models.singular')]));

        return redirect(route('admin.caseModels.index'));
    }

    /**
     * Display the specified CaseModel.
     */
    public function show($id)
    {
        /** @var CaseModel $caseModel */
        $caseModel = CaseModel::find($id);

        if (empty($caseModel)) {
            Flash::error(__('models/case_models.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseModels.index'));
        }

        return view('admin.case_models.show')->with('caseModel', $caseModel);
    }

    /**
     * Show the form for editing the specified CaseModel.
     */
    public function edit($id)
    {
        /** @var CaseModel $caseModel */
        $caseModel = CaseModel::find($id);

        if (empty($caseModel)) {
            Flash::error(__('models/case_models.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseModels.index'));
        }

        $countries = Country::pluck('name', 'id');
        $categories = CaseType::pluck('name', 'id');

        return view('admin.case_models.edit',compact('caseModel', 'countries', 'categories'));
    }

    /**
     * Update the specified CaseModel in storage.
     */
    public function update($id, UpdateCaseModelRequest $request)
    {
        /** @var CaseModel $caseModel */
        $caseModel = CaseModel::find($id);

        if (empty($caseModel)) {
            Flash::error(__('models/case_models.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseModels.index'));
        }

        $caseModel->fill($request->all());

        $caseModel->countries()->sync($request->input('countries', []));

        $caseModel->categories()->sync($request->input('categories', []));

        $caseModel->save();

        Flash::success(__('messages.updated', ['model' => __('models/case_models.singular')]));

        return redirect(route('admin.caseModels.index'));
    }

    /**
     * Remove the specified CaseModel from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CaseModel $caseModel */
        $caseModel = CaseModel::find($id);

        if (empty($caseModel)) {
            Flash::error(__('models/case_models.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseModels.index'));
        }

        $caseModel->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/case_models.singular')]));

        return redirect(route('admin.caseModels.index'));
    }
}
