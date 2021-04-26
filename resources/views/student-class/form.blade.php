<div class="form-group">
    <label>Title</label>
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Class Name']) !!}
    @if($errors->has('title'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('title') }}</small>
    @endif
</div>