@extends('layouts.app')

@section('content2')

    <section class="content-header">
        <h1>
            App Settings
            {{--            <small>it all starts here</small>--}}
        </h1>
    </section>
    <br>

    <div class="box box-warning" style="   border-top-color: #00a65a ">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: #00a65a">General Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['url'=>'/app_settings/edit' , 'method'=>'post' ,'class'=>'form' , 'style' =>'font-size: 1pc;
    margin-left: 2pc;
    margin-right: 2pc;
    color: #00a65a;']) !!}
                <!-- text input -->
                @foreach( $app_settings as $app_setting)
                    <div class="form-group">
                        <label>E-mail</label>
                        {!! Form::text('email' , $app_setting->email, ['class' => 'form-control' ]) !!}
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        {!! Form::text('phone' , $app_setting->phone, ['class' => 'form-control' ]) !!}
                    </div>

                    <div class="form-group">
                        <label>Facebook Link</label>
                        {!! Form::text('facebook_link' , $app_setting->facebook_link, ['class' => 'form-control' ]) !!}
                    </div>

                    <div class="form-group">
                        <label>Twitter Link</label>
                        {!! Form::text('twitter_link' , $app_setting->twitter_link, ['class' => 'form-control' ]) !!}
                    </div>

                    <div class="form-group">
                        <label>Youtube Link</label>
                        {!! Form::text('youtube_link' , $app_setting->youtube_link, ['class' => 'form-control' ]) !!}
                    </div>

                    <div class="form-group">
                        <label>Google Plus Link</label>
                        {!! Form::text('googleplus_link' , $app_setting->googleplus_link, ['class' => 'form-control' ]) !!}
                    </div>

                    <div class="form-group">
                        <label>Whats App</label>
                        {!! Form::text('whats_app' , $app_setting->whats_app, ['class' => 'form-control' ]) !!}
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                        <label>About App</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="about_app">{{$app_setting->about_app}}</textarea>
                    </div>

                @endforeach
                <br>
                <button type="submit" class="btn btn-success" style="    background-color: #00a65a;
    border-color: #008d4c;
    font-size: 20px;
    font-weight: bolder;"><i class="fas fa-pen"></i>  Update</button>

            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
@endsection