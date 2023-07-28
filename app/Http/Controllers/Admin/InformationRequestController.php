<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateInformationRequestRequest;
use App\Http\Requests\Admin\UpdateInformationRequestRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\InformationRequest;
use Illuminate\Http\Request;
use Flash;

class InformationRequestController extends AppBaseController
{
    /**
     * Display a listing of the InformationRequest.
     */
    public function index(Request $request)
    {
        /** @var InformationRequest $informationRequests */
        $informationRequests = InformationRequest::paginate(10);

        return view('admin.information_requests.index')
            ->with('informationRequests', $informationRequests);
    }


    /**
     * Show the form for creating a new InformationRequest.
     */
    public function create()
    {
        return view('admin.information_requests.create');
    }

    /**
     * Store a newly created InformationRequest in storage.
     */
    public function store(CreateInformationRequestRequest $request)
    {
        $input = $request->all();

        /** @var InformationRequest $informationRequest */
        $informationRequest = InformationRequest::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informationRequests.singular')]));

        return redirect(route('admin.informationRequests.index'));
    }

    /**
     * Display the specified InformationRequest.
     */
    public function show($id)
    {
        /** @var InformationRequest $informationRequest */
        $informationRequest = InformationRequest::find($id);

        if (empty($informationRequest)) {
            Flash::error(__('models/informationRequests.singular').' '.__('messages.not_found'));

            return redirect(route('admin.informationRequests.index'));
        }

        return view('admin.information_requests.show')->with('informationRequest', $informationRequest);
    }

    /**
     * Show the form for editing the specified InformationRequest.
     */
    public function edit($id)
    {
        /** @var InformationRequest $informationRequest */
        $informationRequest = InformationRequest::find($id);

        if (empty($informationRequest)) {
            Flash::error(__('models/informationRequests.singular').' '.__('messages.not_found'));

            return redirect(route('admin.informationRequests.index'));
        }

        return view('admin.information_requests.edit')->with('informationRequest', $informationRequest);
    }

    /**
     * Update the specified InformationRequest in storage.
     */
    public function update($id, UpdateInformationRequestRequest $request)
    {
        /** @var InformationRequest $informationRequest */
        $informationRequest = InformationRequest::find($id);

        if (empty($informationRequest)) {
            Flash::error(__('models/informationRequests.singular').' '.__('messages.not_found'));

            return redirect(route('admin.informationRequests.index'));
        }

        $informationRequest->fill($request->all());
        $informationRequest->save();

        Flash::success(__('messages.updated', ['model' => __('models/informationRequests.singular')]));

        return redirect(route('admin.informationRequests.index'));
    }

    /**
     * Remove the specified InformationRequest from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var InformationRequest $informationRequest */
        $informationRequest = InformationRequest::find($id);

        if (empty($informationRequest)) {
            Flash::error(__('models/informationRequests.singular').' '.__('messages.not_found'));

            return redirect(route('admin.informationRequests.index'));
        }

        $informationRequest->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/informationRequests.singular')]));

        return redirect(route('admin.informationRequests.index'));
    }
}
