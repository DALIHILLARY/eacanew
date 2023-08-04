<!-- Case Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('case_name', __('models/findings.fields.case_name').':') !!}
    {!! Form::text('case_name', $case , ['class' => 'form-control', 'readonly', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', __('models/findings.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', __('models/findings.fields.content').':') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>