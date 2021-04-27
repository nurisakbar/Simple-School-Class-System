<div class="form-group">
    <label>Subject</label>
    {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Material Title']) !!}
    @if($errors->has('title'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('title') }}</small>
    @endif
</div>
<div class="form-group">
    <label>Description</label>
    {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Student Address']) !!}
    @if($errors->has('description'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('description') }}</small>
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Upload File ( * pdf or ppt only)</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.pptx,.ppt">
            @if($errors->has('file'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('file') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Select Class</label>
            <select name="schedule_id" class="form-control">
                @foreach($schedules as $schedule)
                    <option value="{{$schedule->id}}">{{$schedule->class->name}} - {{$schedule->room->name}} - {{$schedule->course->name}}</option>
                @endforeach
            </select>
                @if($errors->has('student_id'))
                    <small id="emailHelp" class="form-text text-muted">{{ $errors->first('student_id') }}</small>
                @endif
        </div>
    </div>
   
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('material.index')}}" class="btn btn-primary">Cancel</a>