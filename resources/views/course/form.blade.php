<div class="form-group">
    <label>Name Mata Pelajaran</label>
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama Mata Pelajaran']) !!}
    @if($errors->has('name'))
        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('course.index')}}" class="btn btn-primary">Cancel</a>