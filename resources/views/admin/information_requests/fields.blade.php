<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/information_requests.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/information_requests.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('reason', __('models/information_requests.fields.reason').':') !!}
    {!! Form::textarea('reason', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>