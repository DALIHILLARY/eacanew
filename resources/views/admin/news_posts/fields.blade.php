<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/news_posts.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', __('models/news_posts.fields.slug').':') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', __('models/news_posts.fields.content').':') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'required']) !!}
</div>