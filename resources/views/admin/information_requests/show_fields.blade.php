<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/information_requests.fields.user_id').':') !!}
    <p>{{ $informationRequest->user_id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/information_requests.fields.description').':') !!}
    <p>{{ $informationRequest->description }}</p>
</div>

<!-- Reason Field -->
<div class="col-sm-12">
    {!! Form::label('reason', __('models/information_requests.fields.reason').':') !!}
    <p>{{ $informationRequest->reason }}</p>
</div>

