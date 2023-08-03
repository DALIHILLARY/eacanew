<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePublicationRequest;
use App\Http\Requests\Admin\UpdatePublicationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Publication;
use Illuminate\Http\Request;
use Flash;

class PublicationController extends AppBaseController
{
    /**
     * Display a listing of the Publication.
     */
    public function index(Request $request)
    {
        /** @var Publication $publications */
        $publications = Publication::paginate(10);

        return view('admin.publications.index')
            ->with('publications', $publications);
    }


    /**
     * Show the form for creating a new Publication.
     */
    public function create()
    {
        return view('admin.publications.create');
    }

    /**
     * Store a newly created Publication in storage.
     */
    public function store(CreatePublicationRequest $request)
    {
        $input = $request->all();

        /** @var Publication $publication */
        $publication = Publication::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/publications.singular')]));

        return redirect(route('admin.publications.index'));
    }

    /**
     * Display the specified Publication.
     */
    public function show($id)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('models/publications.singular').' '.__('messages.not_found'));

            return redirect(route('admin.publications.index'));
        }

        return view('admin.publications.show')->with('publication', $publication);
    }

    /**
     * Show the form for editing the specified Publication.
     */
    public function edit($id)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('models/publications.singular').' '.__('messages.not_found'));

            return redirect(route('admin.publications.index'));
        }

        return view('admin.publications.edit')->with('publication', $publication);
    }

    /**
     * Update the specified Publication in storage.
     */
    public function update($id, UpdatePublicationRequest $request)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('models/publications.singular').' '.__('messages.not_found'));

            return redirect(route('admin.publications.index'));
        }

        $publication->fill($request->all());
        $publication->save();

        Flash::success(__('messages.updated', ['model' => __('models/publications.singular')]));

        return redirect(route('admin.publications.index'));
    }

    /**
     * Remove the specified Publication from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('models/publications.singular').' '.__('messages.not_found'));

            return redirect(route('admin.publications.index'));
        }

        $publication->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/publications.singular')]));

        return redirect(route('admin.publications.index'));
    }
}
