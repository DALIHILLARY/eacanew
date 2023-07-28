<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/informationRequests.fields.user_id').':') !!}
    <p>{{ $informationRequest->user_id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/informationRequests.fields.description').':') !!}
    <p>{{ $informationRequest->description }}</p>
</div>

<!-- Reason Field -->
<div class="col-sm-12">
    {!! Form::label('reason', __('models/informationRequests.fields.reason').':') !!}
    <p>{{ $informationRequest->reason }}</p>
</div>

