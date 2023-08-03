<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/tags.fields.name').':') !!}
    <p>{{ $tag->name }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/tags.fields.slug').':') !!}
    <p>{{ $tag->slug }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/tags.fields.description').':') !!}
    <p>{{ $tag->description }}</p>
</div>

