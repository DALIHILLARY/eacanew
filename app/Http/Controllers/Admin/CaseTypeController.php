<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCaseTypeRequest;
use App\Http\Requests\Admin\UpdateCaseTypeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\CaseType;
use Illuminate\Http\Request;
use Flash;

class CaseTypeController extends AppBaseController
{
    /**
     * Display a listing of the CaseType.
     */
    public function index(Request $request)
    {
        /** @var CaseType $caseTypes */
        $caseTypes = CaseType::latest()->paginate(10);

        return view('admin.case_types.index')
            ->with('caseTypes', $caseTypes);
    }


    /**
     * Show the form for creating a new CaseType.
     */
    public function create()
    {
        return view('admin.case_types.create');
    }

    /**
     * Store a newly created CaseType in storage.
     */
    public function store(CreateCaseTypeRequest $request)
    {
        $input = $request->all();

        /** @var CaseType $caseType */
        $caseType = CaseType::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/case_types.singular')]));

        return redirect(route('admin.caseTypes.index'));
    }

    /**
     * Display the specified CaseType.
     */
    public function show($id)
    {
        /** @var CaseType $caseType */
        $caseType = CaseType::find($id);

        if (empty($caseType)) {
            Flash::error(__('models/case_types.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseTypes.index'));
        }

        return view('admin.case_types.show')->with('caseType', $caseType);
    }

    /**
     * Show the form for editing the specified CaseType.
     */
    public function edit($id)
    {
        /** @var CaseType $caseType */
        $caseType = CaseType::find($id);

        if (empty($caseType)) {
            Flash::error(__('models/case_types.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseTypes.index'));
        }

        return view('admin.case_types.edit')->with('caseType', $caseType);
    }

    /**
     * Update the specified CaseType in storage.
     */
    public function update($id, UpdateCaseTypeRequest $request)
    {
        /** @var CaseType $caseType */
        $caseType = CaseType::find($id);

        if (empty($caseType)) {
            Flash::error(__('models/case_types.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseTypes.index'));
        }

        $caseType->fill($request->all());
        $caseType->save();

        Flash::success(__('messages.updated', ['model' => __('models/case_types.singular')]));

        return redirect(route('admin.caseTypes.index'));
    }

    /**
     * Remove the specified CaseType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CaseType $caseType */
        $caseType = CaseType::find($id);

        if (empty($caseType)) {
            Flash::error(__('models/case_types.singular').' '.__('messages.not_found'));

            return redirect(route('admin.caseTypes.index'));
        }

        $caseType->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/case_types.singular')]));

        return redirect(route('admin.caseTypes.index'));
    }
}
