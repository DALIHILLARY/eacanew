<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/news_posts.fields.title').':') !!}
    <p>{{ $newsPost->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/news_posts.fields.slug').':') !!}
    <p>{{ $newsPost->slug }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', __('models/news_posts.fields.content').':') !!}
    <p>{{ $newsPost->content }}</p>
</div>

