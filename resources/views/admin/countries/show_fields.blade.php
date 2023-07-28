<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', __('models/countries.fields.code').':') !!}
    <p>{{ $country->code }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/countries.fields.name').':') !!}
    <p>{{ $country->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/countries.fields.description').':') !!}
    <p>{{ $country->description }}</p>
</div>

