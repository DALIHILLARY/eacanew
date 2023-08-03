<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateBlogPostRequest;
use App\Http\Requests\Admin\UpdateBlogPostRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\BlogPost;
use Illuminate\Http\Request;
use Flash;

class BlogPostController extends AppBaseController
{
    /**
     * Display a listing of the BlogPost.
     */
    public function index(Request $request)
    {
        /** @var BlogPost $blogPosts */
        $blogPosts = BlogPost::paginate(10);

        return view('admin.blog_posts.index')
            ->with('blogPosts', $blogPosts);
    }


    /**
     * Show the form for creating a new BlogPost.
     */
    public function create()
    {
        return view('admin.blog_posts.create');
    }

    /**
     * Store a newly created BlogPost in storage.
     */
    public function store(CreateBlogPostRequest $request)
    {
        $input = $request->all();

        /** @var BlogPost $blogPost */
        $blogPost = BlogPost::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/blog_posts.singular')]));

        return redirect(route('admin.blogPosts.index'));
    }

    /**
     * Display the specified BlogPost.
     */
    public function show($id)
    {
        /** @var BlogPost $blogPost */
        $blogPost = BlogPost::find($id);

        if (empty($blogPost)) {
            Flash::error(__('models/blog_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.blogPosts.index'));
        }

        return view('admin.blog_posts.show')->with('blogPost', $blogPost);
    }

    /**
     * Show the form for editing the specified BlogPost.
     */
    public function edit($id)
    {
        /** @var BlogPost $blogPost */
        $blogPost = BlogPost::find($id);

        if (empty($blogPost)) {
            Flash::error(__('models/blog_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.blogPosts.index'));
        }

        return view('admin.blog_posts.edit')->with('blogPost', $blogPost);
    }

    /**
     * Update the specified BlogPost in storage.
     */
    public function update($id, UpdateBlogPostRequest $request)
    {
        /** @var BlogPost $blogPost */
        $blogPost = BlogPost::find($id);

        if (empty($blogPost)) {
            Flash::error(__('models/blog_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.blogPosts.index'));
        }

        $blogPost->fill($request->all());
        $blogPost->save();

        Flash::success(__('messages.updated', ['model' => __('models/blog_posts.singular')]));

        return redirect(route('admin.blogPosts.index'));
    }

    /**
     * Remove the specified BlogPost from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var BlogPost $blogPost */
        $blogPost = BlogPost::find($id);

        if (empty($blogPost)) {
            Flash::error(__('models/blog_posts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.blogPosts.index'));
        }

        $blogPost->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/blog_posts.singular')]));

        return redirect(route('admin.blogPosts.index'));
    }
}
