<div class="form-group">
    <label>Name room</label>
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name room']) !!}
    @if($errors->has('name'))
        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('room.index')}}" class="btn btn-primary">Cancel</a>