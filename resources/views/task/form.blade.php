<div class="form-group">
    <label>Subject</label>
    {!! Form::text('subject', null, ['class'=>'form-control','placeholder'=>'Subject']) !!}
    @if($errors->has('subject'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('subject') }}</small>
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
    <div class="col-md-4">
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
    <div class="col-md-3">
        <div class="form-group">
            <label>End Date</label>
            {{ Form::date('end_date',null,['class' => 'form-control']) }}
            @if($errors->has('end_date'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('end_date') }}</small>
            @endif
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('task.index')}}" class="btn btn-primary">Cancel</a>