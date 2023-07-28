<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/case_models.fields.title').':') !!}
    <p>{{ $caseModel->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/case_models.fields.description').':') !!}
    <p>{!! $caseModel->description !!}</p>
</div>

