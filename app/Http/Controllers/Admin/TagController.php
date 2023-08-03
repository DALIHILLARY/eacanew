<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use Flash;

class TagController extends AppBaseController
{
    /**
     * Display a listing of the Tag.
     */
    public function index(Request $request)
    {
        /** @var Tag $tags */
        $tags = Tag::paginate(10);

        return view('admin.tags.index')
            ->with('tags', $tags);
    }


    /**
     * Show the form for creating a new Tag.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created Tag in storage.
     */
    public function store(CreateTagRequest $request)
    {
        $input = $request->all();

        /** @var Tag $tag */
        $tag = Tag::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tags.singular')]));

        return redirect(route('admin.tags.index'));
    }

    /**
     * Display the specified Tag.
     */
    public function show($id)
    {
        /** @var Tag $tag */
        $tag = Tag::find($id);

        if (empty($tag)) {
            Flash::error(__('models/tags.singular').' '.__('messages.not_found'));

            return redirect(route('admin.tags.index'));
        }

        return view('admin.tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified Tag.
     */
    public function edit($id)
    {
        /** @var Tag $tag */
        $tag = Tag::find($id);

        if (empty($tag)) {
            Flash::error(__('models/tags.singular').' '.__('messages.not_found'));

            return redirect(route('admin.tags.index'));
        }

        return view('admin.tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified Tag in storage.
     */
    public function update($id, UpdateTagRequest $request)
    {
        /** @var Tag $tag */
        $tag = Tag::find($id);

        if (empty($tag)) {
            Flash::error(__('models/tags.singular').' '.__('messages.not_found'));

            return redirect(route('admin.tags.index'));
        }

        $tag->fill($request->all());
        $tag->save();

        Flash::success(__('messages.updated', ['model' => __('models/tags.singular')]));

        return redirect(route('admin.tags.index'));
    }

    /**
     * Remove the specified Tag from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Tag $tag */
        $tag = Tag::find($id);

        if (empty($tag)) {
            Flash::error(__('models/tags.singular').' '.__('messages.not_found'));

            return redirect(route('admin.tags.index'));
        }

        $tag->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/tags.singular')]));

        return redirect(route('admin.tags.index'));
    }
}
