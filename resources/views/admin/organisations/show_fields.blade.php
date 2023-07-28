<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/organisations.fields.name').':') !!}
    <p>{{ $organisation->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('models/organisations.fields.email').':') !!}
    <p>{{ $organisation->email }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', __('models/organisations.fields.slug').':') !!}
    <p>{{ $organisation->slug }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', __('models/organisations.fields.phone').':') !!}
    <p>{{ $organisation->phone }}</p>
</div>

<!-- Website Field -->
<div class="col-sm-12">
    {!! Form::label('website', __('models/organisations.fields.website').':') !!}
    <p>{{ $organisation->website }}</p>
</div>

<!-- Physical Address Field -->
<div class="col-sm-12">
    {!! Form::label('physical_address', __('models/organisations.fields.physical_address').':') !!}
    <p>{{ $organisation->physical_address }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/organisations.fields.description').':') !!}
    <p>{{ $organisation->description }}</p>
</div>

<!-- Country Id Field -->
<div class="col-sm-12">
    {!! Form::label('country_id', __('models/organisations.fields.country_id').':') !!}
    <p>{{ $organisation->country_id }}</p>
</div>

