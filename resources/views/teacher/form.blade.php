<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Teacher Name</label>
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Student Name']) !!}
            @if($errors->has('name'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Teacher Phone</label>
            {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>'Student Phone']) !!}
            @if($errors->has('phone'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('phone') }}</small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Teacher Email']) !!}
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
<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{route('teacher.index')}}" class="btn btn-primary">Back</a>