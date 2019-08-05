@extends('layouts.app')
<?php
    $blood_types = \App\Models\Blood_type::all();
    $governorates = \App\Models\Governorate::all();

?>
@inject('city' , App\Models\City)
@section('content2')

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
           Donation Requeasts
            {{--            <small>it all starts here</small>--}}
        </h1>
    </section>
<br><br>
    <section class="content" >
        <div class="col-md-12">
        <div class="box box-warning box-solid" style="    border: 1px solid #00a65a;">
            <div class="box-header with-border" style="    background-color: #00a65a;">
                <h3 class="box-title">Search</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div>

                {!! Form::open(
                           [
                               'url'=>'/donations/search',
                               'action'=>'post' ,
                               'style'=>'margin-right: 3%;margin-left: 3%;color:#00a65a'
                           ]
                       ) !!}

                <div class="form-group col-lg-6">

                    <label style="    font-size: 18px;
        margin-left: 11px;"> From</label>
                    {!! Form::date('date_from',old('date'),['class'=>'form-control']) !!}
                </div>


                <div class="form-group col-lg-6">
                    <label style="    font-size: 18px;
        margin-left: 11px;"> To</label>
                    {!! Form::date('date_to',old('date'),['class'=>'form-control']) !!}
                </div>



                <div class="form-group col-lg-6">

                    <label style="    font-size: 18px;
        margin-left: 11px;"> Blood Type</label>
                    <select class="form-control"  name="blood_type_id">
                        <option value="0">select blood type....</option>
                        @foreach( $blood_types as $blood_type)
                            <option value="{{$blood_type->id}}"> {{$blood_type->type}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-lg-6">

                    <label style="    font-size: 18px;
        margin-left: 11px;">  Governorate</label>
                    <select class="form-control"  name="governorate_id">
                        <option value="0">select Governorate....</option>
                        @foreach( $governorates as $governorate)
                            <option value="{{$governorate->id}}"> {{$governorate->name}}</option>
                        @endforeach
                    </select>
                </div>

                <hr style="    border-top: 1px solid #51a65a;">

                <button type="submit" class="btn btn-success" style="margin-bottom: 1pc;"><i class="fas fa-search"></i> Search</button>
                {!! Form::close() !!}

            </div>

        </div>

    </div>
    </section>
    <!-- Main content -->
    <section class="content" style=" margin-top: 6pc;">


        <!-- Default box -->
        <div class="box" >
            <div class="box-header with-border">
                <h3 class="box-title">All Contacts</h3>

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
                        <th scope="col" class="text-center">patient name</th>
                        <th scope="col" class="text-center">Governorate</th>
                        <th scope="col" class="text-center">Blood Type</th>
                        <th scope="col" class="text-center">Hospital</th>
                        <th scope="col" class="text-center">show details</th>
                        <th scope="col" class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $requests as $request )
                        <tr>

                            <td class="text-center">

                                <label>{{$request->patient_name}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$request->city->governorate()->pluck('name')}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$blood_type->find($request->blood_type_id)->type}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$request->hospital_name}}</label>
                            </td>

                            <td class="text-center">
                                <a href='{{route('donations.show',$request->id)}}' >
                                    <i class="fas fa-eye" style="font-size: 21px;"></i>
                                </a>
                            </td>



                            <td class="text-center">
                                {!! Form::open(['url'=>'/donations/'.$request->id , 'method'=>'delete']) !!}

                                <button type="submit" onclick="return confirm('Please confirm delete');" style="background-color: white;
    border: none;">
                                    <i class="fas fa-trash-alt"  style="font-size: 21px;color: #b50000;"></i>
                                </button>

                                {!! Form::close() !!}
                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
                <br>
                <hr style="border-top: 1px solid #d2caca;">

                <center>
                    {{ $requests->links() }}
                </center>


            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection