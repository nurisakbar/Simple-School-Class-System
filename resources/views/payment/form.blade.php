<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Student</label>
            {!! Form::select('student_id',$student,null,['class' => 'form-control custom-select']) !!}
            @if($errors->has('student_id'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('student_id') }}</small>
            @endif
        </div>
        
        <div class="form-group">
            <label>Payment Type</label>
            {!! Form::select('payment_type',['dsp' => 'Dsp' , 'spp' => 'Spp' , 'dll' => 'Dll'],null,['class' => 'form-control custom-select']) !!}
            @if($errors->has('payment_type'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('payment_type') }}</small>
            @endif
        </div>
        
        <div class="form-group">
            <label>Amount</label>
            {!! Form::text('amount',null,['class' => 'form-control']) !!}
            @if($errors->has('amount'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('amount') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label></label>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('payment.index')}}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label>Description</label>
            {!! Form::textarea('description',null,['class' => 'form-control' , 'rows' => 2,'cols'=>2]) !!}
            @if($errors->has('description'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
            @endif
        </div>
    </div>
</div>