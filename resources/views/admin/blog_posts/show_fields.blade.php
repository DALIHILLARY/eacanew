<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/blog_posts.fields.title').':') !!}
    <p>{{ $blogPost->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/blog_posts.fields.slug').':') !!}
    <p>{{ $blogPost->slug }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', __('models/blog_posts.fields.content').':') !!}
    <p>{{ $blogPost->content }}</p>
</div>

