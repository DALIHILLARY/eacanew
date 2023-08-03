<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/publications.fields.title').':') !!}
    <p>{{ $publication->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/publications.fields.slug').':') !!}
    <p>{{ $publication->slug }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', __('models/publications.fields.content').':') !!}
    <p>{{ $publication->content }}</p>
</div>

