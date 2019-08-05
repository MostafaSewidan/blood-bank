@extends('layouts.app')

@section('content2')
    <div class="login-box-body">
        <div>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reset Password</h3>

                    {!! Form::open(['url'=>'reset' , 'method'=>'post','role'=>'form']) !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            {!! Form::password('old_password' , ['class'=>'form-control' ,'id'=>'exampleInputPassword1','placeholder'=>'Old Password','required'=>'true','autocomplete'=>'current-password']) !!}

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            {!! Form::password('password' , ['class'=>'form-control' ,'id'=>'exampleInputPassword1','placeholder'=>'New Password','required'=>'true','autocomplete'=>'current-password']) !!}

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm New Password</label>
                            {!! Form::password('password_confirmation' , ['class'=>'form-control' ,'id'=>'exampleInputPassword1','placeholder'=>'Confirm New Password','required'=>'true','autocomplete'=>'current-password']) !!}

                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Reset</button>
                    </div>
                    {!! Form::close() !!}


                </div>




    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
