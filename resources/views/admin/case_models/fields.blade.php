<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', __('models/case_models.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('categories', __('models/case_models.fields.category').':') !!}
    {!! Form::select('categories[]', $categories, null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'multiple' =>'multiple']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('countries', __('models/case_models.fields.country').':') !!}
    {!! Form::select('countries[]', $countries, null, ['class' => 'form-control', 'required', 'maxlength' => 255,'multiple' =>'multiple']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/case_models.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>