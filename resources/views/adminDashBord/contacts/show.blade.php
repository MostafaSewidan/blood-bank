@extends('layouts.app')

@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">CLIENT DATA</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="box box-primary">
                    <br>
                    <div class="box-header with-border" style="    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
        padding-left: 2pc;
">
                        <h3 class="box-title">Name : {{$contact->name}}</h3>
                    </div>

                    <div class="box-header with-border" style="    color: #155724;
    background-color: #d4edda;
        padding-left: 2pc;
    border-color: #c3e6cb;">
                        <h3 class="box-title">phone : {{$contact->phone}}</h3>
                    </div>

                    <div class="box-header with-border" style="    color: #0c5460;
    background-color: #d1ecf1;
        padding-left: 2pc;
    border-color: #bee5eb;">
                        <h3 class="box-title">E-mail : {{$contact->email}}</h3>
                    </div>

                    <div class="box-header with-border" style="color: #856404;
    background-color: #fff3cd;
        padding-left: 2pc;
    border-color: #ffeeba;">
                        <center style="color: #004085;">
                            <h2>
                                {{$contact->sms_title}}
                            </h2>
                            <br>
                            <h4>
                                {{$contact->sms_body}}
                            </h4>
                        </center>
                    </div>


                    <div class="box-header with-border" style="    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
        padding-left: 2pc;
">
                        <h3 class="box-title">Created at : {{$contact->created_at}}</h3>
                    </div>




                    <div style="    padding-left: 2pc; padding-bottom: 1pc;">

                        {!! Form::open(['url'=>'/contacts/'.$contact->id , 'method'=>'delete']) !!}

                        <button type="submit" onclick="return confirm('Please confirm delete');" style="background-color: white;
    border: none;">
                            <i class="fas fa-trash-alt"  style="font-size: 21px;color: #b50000;"></i>
                        </button>

                        {!! Form::close() !!}

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection