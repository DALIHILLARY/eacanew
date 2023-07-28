<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/case_types.fields.name').':') !!}
    <p>{{ $caseType->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/case_types.fields.description').':') !!}
    <p>{{ $caseType->description }}</p>
</div>

