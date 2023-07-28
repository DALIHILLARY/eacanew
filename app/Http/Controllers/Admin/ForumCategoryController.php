<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateForumCategoryRequest;
use App\Http\Requests\Admin\UpdateForumCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\ForumCategory;
use Illuminate\Http\Request;
use Flash;

class ForumCategoryController extends AppBaseController
{
    /**
     * Display a listing of the ForumCategory.
     */
    public function index(Request $request)
    {
        /** @var ForumCategory $forumCategories */
        $forumCategories = ForumCategory::latest()->paginate(10);

        return view('admin.forum_categories.index')
            ->with('forumCategories', $forumCategories);
    }


    /**
     * Show the form for creating a new ForumCategory.
     */
    public function create()
    {
        return view('admin.forum_categories.create');
    }

    /**
     * Store a newly created ForumCategory in storage.
     */
    public function store(CreateForumCategoryRequest $request)
    {
        $input = $request->all();

        /** @var ForumCategory $forumCategory */
        $forumCategory = ForumCategory::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/forum_categories.singular')]));

        return redirect(route('admin.forumCategories.index'));
    }

    /**
     * Display the specified ForumCategory.
     */
    public function show($id)
    {
        /** @var ForumCategory $forumCategory */
        $forumCategory = ForumCategory::find($id);

        if (empty($forumCategory)) {
            Flash::error(__('models/forum_categories.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumCategories.index'));
        }

        return view('admin.forum_categories.show')->with('forumCategory', $forumCategory);
    }

    /**
     * Show the form for editing the specified ForumCategory.
     */
    public function edit($id)
    {
        /** @var ForumCategory $forumCategory */
        $forumCategory = ForumCategory::find($id);

        if (empty($forumCategory)) {
            Flash::error(__('models/forum_categories.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumCategories.index'));
        }

        return view('admin.forum_categories.edit')->with('forumCategory', $forumCategory);
    }

    /**
     * Update the specified ForumCategory in storage.
     */
    public function update($id, UpdateForumCategoryRequest $request)
    {
        /** @var ForumCategory $forumCategory */
        $forumCategory = ForumCategory::find($id);

        if (empty($forumCategory)) {
            Flash::error(__('models/forum_categories.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumCategories.index'));
        }

        $forumCategory->fill($request->all());
        $forumCategory->save();

        Flash::success(__('messages.updated', ['model' => __('models/forum_categories.singular')]));

        return redirect(route('admin.forumCategories.index'));
    }

    /**
     * Remove the specified ForumCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var ForumCategory $forumCategory */
        $forumCategory = ForumCategory::find($id);

        if (empty($forumCategory)) {
            Flash::error(__('models/forum_categories.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumCategories.index'));
        }

        $forumCategory->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/forum_categories.singular')]));

        return redirect(route('admin.forumCategories.index'));
    }
}
