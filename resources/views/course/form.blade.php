<div class="form-group">
    <label>Name course</label>
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name course']) !!}
    @if($errors->has('name'))
        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('course.index')}}" class="btn btn-primary">Cancel</a>