<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateFindingRequest;
use App\Http\Requests\Admin\UpdateFindingRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Finding;
use Illuminate\Http\Request;
use Flash;

class FindingController extends AppBaseController
{
    /**
     * Display a listing of the Finding.
     */
    public function index(Request $request)
    {
        /** @var Finding $findings */
        $findings = Finding::paginate(10);

        return view('admin.findings.index')
            ->with('findings', $findings);
    }


    /**
     * Show the form for creating a new Finding.
     */
    public function create()
    {
        if(!session()->has('current_case_id')){
            Flash::error(__('messages.not_selected',['model' => __('models/case_models.singular')]));
            return redirect(route('admin.caseModels.index'));
        }
        //Get the case name that is currently selected
        $case = \App\Models\Admin\CaseModel::find(session()->get('current_case_id'))->title;

        return view('admin.findings.create')->with('case', $case);
    }

    /**
     * Store a newly created Finding in storage.
     */
    public function store(CreateFindingRequest $request)
    {
        $input = $request->all();

        $case_id = session()->pull('current_case_id');  // Get current case and remove it from the session

        $input['user_id'] = auth()->user()->id; // Use the current user id as the user_id
        $input['case_id'] = $case_id; // Use the current case id as the case_id


        /** @var Finding $finding */
        $finding = Finding::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/findings.singular')]));

        return redirect(route('admin.caseModels.show', $case_id.'#case-findings'));
    }

    /**
     * Display the specified Finding.
     */
    public function show($id)
    {
        /** @var Finding $finding */
        $finding = Finding::find($id);

        if (empty($finding)) {
            Flash::error(__('models/findings.singular').' '.__('messages.not_found'));

            return redirect(route('admin.findings.index'));
        }

        return view('admin.findings.show')->with('finding', $finding);
    }

    /**
     * Show the form for editing the specified Finding.
     */
    public function edit($id)
    {
        /** @var Finding $finding */
        $finding = Finding::find($id);

        if (empty($finding)) {
            Flash::error(__('models/findings.singular').' '.__('messages.not_found'));

            return redirect(route('admin.findings.index'));
        }

        return view('admin.findings.edit')->with('finding', $finding);
    }

    /**
     * Update the specified Finding in storage.
     */
    public function update($id, UpdateFindingRequest $request)
    {
        /** @var Finding $finding */
        $finding = Finding::find($id);

        if (empty($finding)) {
            Flash::error(__('models/findings.singular').' '.__('messages.not_found'));

            return redirect(route('admin.findings.index'));
        }

        $finding->fill($request->all());
        $finding->save();

        Flash::success(__('messages.updated', ['model' => __('models/findings.singular')]));

        return redirect(route('admin.findings.index'));
    }

    /**
     * Remove the specified Finding from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Finding $finding */
        $finding = Finding::find($id);

        if (empty($finding)) {
            Flash::error(__('models/findings.singular').' '.__('messages.not_found'));

            return redirect(route('admin.findings.index'));
        }

        $finding->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/findings.singular')]));

        return redirect(route('admin.findings.index'));
    }
}
