<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateForumTopicRequest;
use App\Http\Requests\Admin\UpdateForumTopicRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\ForumCategory;
use App\Models\Admin\ForumTopic;
use Illuminate\Http\Request;
use Flash;

class ForumTopicController extends AppBaseController
{
    /**
     * Display a listing of the ForumTopic.
     */
    public function index(Request $request)
    {
        /** @var ForumTopic $forumTopics */
        $forumTopics = ForumTopic::with('author','forumCategory')->latest()->paginate(10);

        return view('admin.forum_topics.index')
            ->with('forumTopics', $forumTopics);
    }


    /**
     * Show the form for creating a new ForumTopic.
     */
    public function create()
    {
        $forum_categories = ForumCategory::pluck('name', 'id');
        return view('admin.forum_topics.create')->with('forum_categories', $forum_categories);
    }

    /**
     * Store a newly created ForumTopic in storage.
     */
    public function store(CreateForumTopicRequest $request)
    {
        $input = $request->all();
        $input = array_merge($input, ['user_id' => auth()->user()->id]); // The user who created the topic

        /** @var ForumTopic $forumTopic */
        $forumTopic = ForumTopic::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/forum_topics.singular')]));

        return redirect(route('admin.forumTopics.index'));
    }

    /**
     * Display the specified ForumTopic.
     */
    public function show($id)
    {
        /** @var ForumTopic $forumTopic */
        $forumTopic = ForumTopic::find($id);

        if (empty($forumTopic)) {
            Flash::error(__('models/forum_topics.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumTopics.index'));
        }

        return view('admin.forum_topics.show')->with('forumTopic', $forumTopic);
    }

    /**
     * Show the form for editing the specified ForumTopic.
     */
    public function edit($id)
    {
        /** @var ForumTopic $forumTopic */
        $forumTopic = ForumTopic::find($id);

        if (empty($forumTopic)) {
            Flash::error(__('models/forum_topics.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumTopics.index'));
        }
        $forum_categories = ForumCategory::pluck('name', 'id');


        return view('admin.forum_topics.edit', compact('forumTopic', 'forum_categories'));
    }

    /**
     * Update the specified ForumTopic in storage.
     */
    public function update($id, UpdateForumTopicRequest $request)
    {
        /** @var ForumTopic $forumTopic */
        $forumTopic = ForumTopic::find($id);

        if (empty($forumTopic)) {
            Flash::error(__('models/forum_topics.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumTopics.index'));
        }
        $forumTopic->fill($request->all());
        $forumTopic->save();

        Flash::success(__('messages.updated', ['model' => __('models/forum_topics.singular')]));

        return redirect(route('admin.forumTopics.index'));
    }

    /**
     * Remove the specified ForumTopic from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var ForumTopic $forumTopic */
        $forumTopic = ForumTopic::find($id);

        if (empty($forumTopic)) {
            Flash::error(__('models/forum_topics.singular').' '.__('messages.not_found'));

            return redirect(route('admin.forumTopics.index'));
        }

        $forumTopic->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/forum_topics.singular')]));

        return redirect(route('admin.forumTopics.index'));
    }
}
