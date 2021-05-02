<div class="form-group">
    <label>Year</label>
    {!! Form::text('year', null, ['class'=>'form-control','placeholder'=>'Year']) !!}
    @if($errors->has('year'))
        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('year') }}</small>
    @endif
</div>

<div class="form-group">
    <label>Active</label>
    {!! Form::select('active',['n' => 'No Active' , 'y' => 'Active'],null,['class' => 'form-control custom-select']) !!}
    @if($errors->has('active'))
        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('active') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('academic.index')}}" class="btn btn-primary">Cancel</a>