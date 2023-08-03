<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateNewsPostRequest;
use App\Http\Requests\Admin\UpdateNewsPostRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\NewsPost;
use Illuminate\Http\Request;
use Flash;

class NewsPostController extends AppBaseController
{
    /**
     * Display a listing of the NewsPost.
     */
    public function index(Request $request)
    {
        /** @var NewsPost $newsPosts */
        $newsPosts = NewsPost::paginate(10);

        return view('admin.news_posts.index')
            ->with('newsPosts', $newsPosts);
    }


    /**
     * Show the form for creating a new NewsPost.
     */
    public function create()
    {
        return view('admin.news_posts.create');
    }

    /**
     * Store a newly created NewsPost in storage.
     */
    public function store(CreateNewsPostRequest $request)
    {
        $input = $request->all();

        /** @var NewsPost $newsPost */
        $newsPost = NewsPost::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/news_posts.singular')]));

        return redirect(route('admin.newsPosts.index'));
    }

    /**
     * Display the specified NewsPost.
     */
    public function show($id)
    {
        /** @var NewsPost $newsPost */
        $newsPost = NewsPost::find($id);

        if (empty($newsPost)) {
            Flash::error(__('models/news_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.newsPosts.index'));
        }

        return view('admin.news_posts.show')->with('newsPost', $newsPost);
    }

    /**
     * Show the form for editing the specified NewsPost.
     */
    public function edit($id)
    {
        /** @var NewsPost $newsPost */
        $newsPost = NewsPost::find($id);

        if (empty($newsPost)) {
            Flash::error(__('models/news_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.newsPosts.index'));
        }

        return view('admin.news_posts.edit')->with('newsPost', $newsPost);
    }

    /**
     * Update the specified NewsPost in storage.
     */
    public function update($id, UpdateNewsPostRequest $request)
    {
        /** @var NewsPost $newsPost */
        $newsPost = NewsPost::find($id);

        if (empty($newsPost)) {
            Flash::error(__('models/news_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.newsPosts.index'));
        }

        $newsPost->fill($request->all());
        $newsPost->save();

        Flash::success(__('messages.updated', ['model' => __('models/news_posts.singular')]));

        return redirect(route('admin.newsPosts.index'));
    }

    /**
     * Remove the specified NewsPost from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var NewsPost $newsPost */
        $newsPost = NewsPost::find($id);

        if (empty($newsPost)) {
            Flash::error(__('models/news_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.newsPosts.index'));
        }

        $newsPost->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/news_posts.singular')]));

        return redirect(route('admin.newsPosts.index'));
    }
}
