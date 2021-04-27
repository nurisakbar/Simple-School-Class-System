<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Student ID</label>
            {!! Form::text('student_id', null, ['class'=>'form-control','placeholder'=>'Student ID']) !!}
            @if($errors->has('student_id'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('student_id') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Class</label>
            {!! Form::select('student_class_id', $class, null, ['class'=>'form-control']) !!}
            @if($errors->has('student_id'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('student_id') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Student Name</label>
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Student Name']) !!}
            @if($errors->has('name'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Student Email']) !!}
            @if($errors->has('email'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Password</label>
            {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password']) !!}
            @if($errors->has('password'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('password') }}</small>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label>Address</label>
    {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>'Student Address']) !!}
    @if($errors->has('address'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('address') }}</small>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('student.index') }}" class="btn btn-primary">Back</a>
</div>