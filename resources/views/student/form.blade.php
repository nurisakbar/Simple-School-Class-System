<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>NIPD</label>
                    {!! Form::text('student_id', null, ['class'=>'form-control','placeholder'=>'NIPD']) !!}
                    @if($errors->has('student_id'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('student_id') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>NISN</label>
                    {!! Form::text('student_id_second', null, ['class'=>'form-control','placeholder'=>'NISN']) !!}
                    @if($errors->has('student_id_second'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('student_id') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Kelas</label>
                    {!! Form::select('student_class_id', $class, null, ['class'=>'form-control']) !!}
                    @if($errors->has('student_id'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('student_id') }}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    {!! Form::text('born_place', null, ['class'=>'form-control','placeholder'=>'Tempat Lahir']) !!}
                    @if($errors->has('born_place'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('born_place') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    {!! Form::date('born_date', null, ['class'=>'form-control','placeholder'=>'Tanggal Lahir']) !!}
                    @if($errors->has('born_date'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('born_date') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Agama</label>
                    <select name="religion" class="form-control">
                        @foreach($religions as $religion)
                        <option value="{{$religion}}">{{$religion}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('born_date'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('born_date') }}</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Siswa</label>
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Student Name']) !!}
                    @if($errors->has('name'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NIK</label>
                    {!! Form::text('nik', null, ['class'=>'form-control','placeholder'=>'NIK']) !!}
                    @if($errors->has('nik'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('nik') }}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    {!! Form::select('gender',['m'=>'Laki Laki','f'=>'Perempuan'], null, ['class'=>'form-control']) !!}
                    @if($errors->has('address'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('address') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label>Address</label>
                    {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>'Student Address']) !!}
                    @if($errors->has('address'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('address') }}</small>
                    @endif
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Siswa</label>
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Student Name']) !!}
                    @if($errors->has('name'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NIK</label>
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Student Name']) !!}
                    @if($errors->has('name'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
                    @endif
                </div>
            </div>
        </div> --}}
    </div>
</div>

<div class="row">
    <div class="col-md-6"  style="border-right:1px dashed black;">
        <h5>Data Ayah</h5>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Ayah</label>
                    {!! Form::text('father_name', null, ['class'=>'form-control','placeholder'=>'Nama Ayah']) !!}
                    @if($errors->has('father_name'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('father_name') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    {!! Form::date('father_born_date', null, ['class'=>'form-control','placeholder'=>'Tanggal Lahir']) !!}
                    @if($errors->has('born_date'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('born_date') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pendidikan</label>
                    <select name="father_latest_education" class="form-control">
                        @foreach($educations as $education)
                        <option value="{{$education}}">{{$education}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('father_latest_education'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('father_latest_education') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pekerjan</label>
                    <select name="father_work" class="form-control">
                        @foreach($workKinds as $workKind)
                        <option value="{{$workKind}}">{{$workKind}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('father_work'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('father_work') }}</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h5>Data Ibu</h5>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Ayah</label>
                    {!! Form::text('mother_name', null, ['class'=>'form-control','placeholder'=>'Nama Ayah']) !!}
                    @if($errors->has('father_name'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('father_name') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    {!! Form::date('mother_born_date', null, ['class'=>'form-control','placeholder'=>'Tanggal Lahir']) !!}
                    @if($errors->has('born_date'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('born_date') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pendidikan</label>
                    <select name="mother_latest_education" class="form-control">
                        @foreach($educations as $education)
                        <option value="{{$education}}">{{$education}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('father_latest_education'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('father_latest_education') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pekerjan</label>
                    <select name="mother_work" class="form-control">
                        @foreach($workKinds as $workKind)
                        <option value="{{$workKind}}">{{$workKind}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('father_work'))
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('father_work') }}</small>
                    @endif
                </div>
            </div>
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
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('student.index') }}" class="btn btn-primary">Back</a>
</div>