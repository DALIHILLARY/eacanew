<!-- Forum Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('forum_category_id', __('models/forum_topics.fields.forum_category_id').':') !!}
    <p>{{ $forumTopic->forum_category_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/forum_topics.fields.user_id').':') !!}
    <p>{{ $forumTopic->user_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/forum_topics.fields.name').':') !!}
    <p>{{ $forumTopic->name }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/forum_topics.fields.slug').':') !!}
    <p>{{ $forumTopic->slug }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/forum_topics.fields.description').':') !!}
    <p>{{ $forumTopic->description }}</p>
</div>

