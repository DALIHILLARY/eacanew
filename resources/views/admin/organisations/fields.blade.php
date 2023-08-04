<!-- Country Field -->
<div class="form-group col-sm-12">
    {!! Form::label('country_id', __('models/organisations.fields.country_id') . ':') !!}
    {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('logo', __('models/organisations.fields.logo') . ':') !!}
    {!! Form::file('logo', ['class' => 'filepond', 'accept' => 'image/*']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('models/organisations.fields.name') . ':') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', __('models/organisations.fields.email') . ':') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('phone', __('models/organisations.fields.phone') . ':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-12">
    {!! Form::label('website', __('models/organisations.fields.website') . ':') !!}
    {!! Form::text('website', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Physical Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('physical_address', __('models/organisations.fields.physical_address') . ':') !!}
    {!! Form::text('physical_address', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/organisations.fields.description') . ':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>


@push('page_scripts')
    <script>

    </script>
@endpush
