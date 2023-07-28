<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/forum_categories.fields.name').':') !!}
    <p>{{ $forumCategory->name }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/forum_categories.fields.slug').':') !!}
    <p>{{ $forumCategory->slug }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/forum_categories.fields.description').':') !!}
    <p>{{ $forumCategory->description }}</p>
</div>

