<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/events.fields.title').':') !!}
    <p>{{ $event->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/events.fields.slug').':') !!}
    <p>{{ $event->slug }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', __('models/events.fields.content').':') !!}
    <p>{{ $event->content }}</p>
</div>

