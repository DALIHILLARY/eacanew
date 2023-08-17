<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/profiles.fields.user_id').':') !!}
    <p>{{ $profile->user_id }}</p>
</div>

<!-- Designation Field -->
<div class="col-sm-12">
    {!! Form::label('designation', __('models/profiles.fields.designation').':') !!}
    <p>{{ $profile->designation }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', __('models/profiles.fields.phone_number').':') !!}
    <p>{{ $profile->phone_number }}</p>
</div>

<!-- Date Joined Field -->
<div class="col-sm-12">
    {!! Form::label('date_joined', __('models/profiles.fields.date_joined').':') !!}
    <p>{{ $profile->date_joined }}</p>
</div>

<!-- Date Of Birth Field -->
<div class="col-sm-12">
    {!! Form::label('date_of_birth', __('models/profiles.fields.date_of_birth').':') !!}
    <p>{{ $profile->date_of_birth }}</p>
</div>

<!-- Passport Number Field -->
<div class="col-sm-12">
    {!! Form::label('passport_number', __('models/profiles.fields.passport_number').':') !!}
    <p>{{ $profile->passport_number }}</p>
</div>

<!-- Date Joined Organisation Field -->
<div class="col-sm-12">
    {!! Form::label('date_joined_organisation', __('models/profiles.fields.date_joined_organisation').':') !!}
    <p>{{ $profile->date_joined_organisation }}</p>
</div>

<!-- Area Of Expertise Field -->
<div class="col-sm-12">
    {!! Form::label('area_of_expertise', __('models/profiles.fields.area_of_expertise').':') !!}
    <p>{{ $profile->area_of_expertise }}</p>
</div>

<!-- Area Of Training Of Trainer Field -->
<div class="col-sm-12">
    {!! Form::label('area_of_training_of_trainer', __('models/profiles.fields.area_of_training_of_trainer').':') !!}
    <p>{{ $profile->area_of_training_of_trainer }}</p>
</div>

