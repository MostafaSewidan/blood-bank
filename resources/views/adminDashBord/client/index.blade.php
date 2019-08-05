@extends('layouts.app')
@inject('blood_type' , App\Models\Blood_type)
@inject('city' , App\Models\City)
<?php $governorates = \App\Models\Governorate::all();?>
@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CLIENTS
            {{--            <small>it all starts here</small>--}}
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All clients</h3>

                {!! Form::open(
                                    [
                                        'url'=>'/client_name',
                                        'action'=>'post' ,
                                        'class'=>'sidebar-form',
                                        'style'=>'margin-right: 72%'
                                    ]
                                ) !!}

                <div class="input-group">

                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Search with client name...']) !!}
                    <span class="input-group-btn">
                             <button type="submit"   id="search-btn" class="btn btn-flat">
                                 <i class="fa fa-search"></i>
                             </button>
                        </span>

                </div>
                {!! Form::close() !!}

                <label style="    margin-left: 1%;">Select with Governorate name</label>
                {!! Form::open(
                    [
                        'url'=>'/client_governotate',
                        'action'=>'post' ,
                        'class'=>'form-inline',
                        'style'=>'margin-left: 1%'
                    ]
                ) !!}
                <div class="form-group">
                    <select class="form-control" style="width: 14pc;" name="governorate_id">
                        @foreach( $governorates as $governorate)
                            <option value="{{$governorate->id}}"> {{$governorate->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                {!! Form::close() !!}


                <br><br>



                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>


            {{--            (the content )              --}}
            <div class="box-body">



                <table class="table" style="margin-top: 10px;">
                    <thead class="thead-dark" style="background: #333333;
    color: white;">
                    <tr class="text-center">
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Blood Type</th>
                        <th scope="col" class="text-center">Address</th>
                        <th scope="col" class="text-center">Phone</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Activation</th>
                        <th scope="col" class="text-center">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $clients as $client )
                        <tr>
                            <td scope="row" class="text-center">
                                <label>{{$client->id}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$client->name}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$blood_type->find($client->blood_type_id)->type}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$city->find($client->city_id)->name}}</label>
                            </td>

                            <td class="text-center">

                                <label>{{$client->phone}}</label>

                            </td>

                            <td class="text-center">

                                <label>{{$client->email}}</label>

                            </td>

                            <td class="text-center">

                                <label>true</label>

                            </td>

                            <td class="text-center">

                                <a href="{{url('/manage_client/'.$client->id)}}" style="background-color: #3c8dbc;
    color: white;
    padding: 3px 7px 3px 7px;
    border-radius: 5px;
    font-size: 18px;"><i class="fa fa-tools"></i></a>

                            </td>




                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection