<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/profiles.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation', __('models/profiles.fields.designation').':') !!}
    {!! Form::text('designation', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', __('models/profiles.fields.phone_number').':') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Date Joined Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_joined', __('models/profiles.fields.date_joined').':') !!}
    {!! Form::text('date_joined', null, ['class' => 'form-control','id'=>'date_joined']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_joined').datepicker()
    </script>
@endpush

<!-- Date Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_birth', __('models/profiles.fields.date_of_birth').':') !!}
    {!! Form::text('date_of_birth', null, ['class' => 'form-control','id'=>'date_of_birth']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_birth').datepicker()
    </script>
@endpush

<!-- Passport Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passport_number', __('models/profiles.fields.passport_number').':') !!}
    {!! Form::text('passport_number', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Date Joined Organisation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_joined_organisation', __('models/profiles.fields.date_joined_organisation').':') !!}
    {!! Form::text('date_joined_organisation', null, ['class' => 'form-control','id'=>'date_joined_organisation']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_joined_organisation').datepicker()
    </script>
@endpush

<!-- Area Of Expertise Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('area_of_expertise', __('models/profiles.fields.area_of_expertise').':') !!}
    {!! Form::textarea('area_of_expertise', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Area Of Training Of Trainer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('area_of_training_of_trainer', __('models/profiles.fields.area_of_training_of_trainer').':') !!}
    {!! Form::textarea('area_of_training_of_trainer', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>