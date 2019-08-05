@extends('layouts.app')
@inject('govenorate_name' , App\Models\Governorate)
@section('content2')

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Cities
            {{--            <small>it all starts here</small>--}}
        </h1>


    </section>
    <br>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Number of clients</span>
                    <span class="info-box-number">{{$clients}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>



        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-ambulance"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Donation request</span>
                <span class="info-box-number">{{$donations}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box" style="    margin-top: 10%;">
            <div class="box-header with-border">
                <h3 class="box-title">All Cities</h3>

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

                {!! Form::open(
                                    [
                                        'url'=>'/city_name',
                                        'action'=>'post' ,
                                        'class'=>'sidebar-form',
                                        'style'=>'margin-right: 72%'
                                    ]
                                ) !!}

                    <div class="input-group">

                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Search with city name...']) !!}
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
                        'url'=>'/city_governotate',
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

                <a href="{{url('/create_city')}}" class="btn btn-primary"><i class="fas fa-plus"></i>  Add City</a>

                <table class="table" style="margin-top: 10px;">
                    <thead class="thead-dark" style="background: #333333;
    color: white;">
                    <tr class="text-center">
                        <th scope="col" class="text-center">#</th>

                        <th scope="col" class="text-center">Governorate name</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Edit</th>
                        <th scope="col" class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $cities as $city )
                        <tr>
                            <td scope="row" class="text-center">
                                <label>{{$city->governorate_id}}</label>
                            </td>

                            <td class="text-center">

                                <label>{{optional($city->governorate)->name}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$city->name}}</label>
                            </td>

                            <td class="text-center">
                                <a href='{{url('/edit_form_city/'.$city->id)}}' >
                                    <i class="fas fa-pen-square" style="    font-size: 25px;"></i>
                                </a>
                            </td>

                            <td class="text-center">

                                <a
                                        href='{{url('/destroy_city/'.$city->id)}}'
                                        onclick="return confirm('Please confirm delete');"

                                >
                                    <i class="fas fa-trash-alt"  style="font-size: 21px;color: #b50000;"></i>
                                </a>

                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                <hr style="border-top: 1px solid #d2caca;">

                <center>
                    {{ $cities->links() }}
                </center>


            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection