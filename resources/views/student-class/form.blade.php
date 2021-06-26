<div class="form-group">
    <label>Nama Kelas</label>
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Class Name']) !!}
    @if($errors->has('title'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('title') }}</small>
    @endif
</div>
<div class="form-group">
    <label>Walikelas</label>
    {!! Form::select('teacher_id',$teachers, null, ['class'=>'form-control']) !!}
    @if($errors->has('title'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('title') }}</small>
    @endif
</div>