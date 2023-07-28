<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/findings.fields.title').':') !!}
    <p>{{ $finding->title }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', __('models/findings.fields.content').':') !!}
    <p>{{ $finding->content }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/findings.fields.user_id').':') !!}
    <p>{{ $finding->user_id }}</p>
</div>

