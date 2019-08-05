@extends('layouts.app')
@inject('blood_type' , App\Models\Blood_type)
@inject('city' , App\Models\City)
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
                        <h3 class="box-title">Name : {{$client->name}}</h3>
                    </div>

                    <div class="box-header with-border" style="    color: #155724;
    background-color: #d4edda;
        padding-left: 2pc;
    border-color: #c3e6cb;">
                        <h3 class="box-title">phone : {{$client->phone}}</h3>
                    </div>

                    <div class="box-header with-border" style="color: #856404;
    background-color: #fff3cd;
        padding-left: 2pc;
    border-color: #ffeeba;">
                        <h3 class="box-title">E-mail : {{$client->email}}</h3>
                    </div>

                    <div class="box-header with-border" style="    color: #0c5460;
    background-color: #d1ecf1;
        padding-left: 2pc;
    border-color: #bee5eb;">
                        <h3 class="box-title">Blood type : {{$blood_type->find($client->blood_type_id)->type}}</h3>
                    </div>

                    <div class="box-header with-border" style="
                                color: #383d41;
    background-color: #e2e3e5;
    border-color: #d6d8db;

        padding-left: 2pc;">
                        <h3 class="box-title">Api_token : {{$client->api_token}}</h3>
                    </div>

                    <div class="box-header with-border" style="    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
        padding-left: 2pc;
">
                        <h3 class="box-title">Created at : {{$client->created_at}}</h3>
                    </div>

                    <div class="box-header with-border" style="
    /*                color: #721c24;*/
    /*background-color: #f8d7da;*/
    /*border-color: #f5c6cb;*/
                        color: #155724;
    background-color: #d4edda;
        padding-left: 2pc;
    border-color: #c3e6cb;">
                        <h3 class="box-title">activation : active</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="box-body" style="color: #856404;
    background-color: #fff3cd;
        padding-left: 2pc;
    border-color: #ffeeba;">


                        <strong><i class="fa fa-map-marker margin-r-5" style="color: #ce0000"></i> Location</strong>

                        <p class="text-muted">{{$governorate->name}}, {{$city->find($client->city_id)->name}}</p>

                        <hr>



                    </div>
                    <br>
                    <div style="    padding-left: 2pc; padding-bottom: 1pc;">

                        <a class="btn btn-danger" style="margin-right: 1pc"
                           onclick="return confirm('Please confirm delete');"
                           href="{{url('/delete_client/'.$client->id)}}"
                        >
                            <i class="fas fa-trash-alt"  style="font-size: 21px;color: white;">
                                Delete
                            </i>
                        </a>
                        @if($client->activation == 'true')
                        <a class="btn btn-danger" onclick="return confirm('Please confirm blocking the client');"
                           href="{{url('/block/'.$client->id)}}"
                        >
                            <i class="fas fa-ban" style="font-size: 21px;color: white;">
                                Block
                            </i>
                        </a>
                        @endif
                        @if($client->activation == 'false')
                        <a class="btn btn-success" onclick="return confirm('Please confirm UN-blocking the client');"
                        href="{{url('/block/'.$client->id)}}"
                        >
                            <i class="fas fa-key" style="font-size: 21px;color: white;">
                               Un Block
                            </i>
                        </a>
                        @endif

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