@extends('layouts.app')

@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Governorates
{{--            <small>it all starts here</small>--}}
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Governorates</h3>

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


                <a href="{{url('/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>  Add Governorate</a>

                <table class="table" style="margin-top: 10px;">
                    <thead class="thead-dark" style="background: #333333;
    color: white;">
                    <tr class="text-center">
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Edit</th>
                        <th scope="col" class="text-center">Delete</th>
                        <th scope="col" class="text-center">Governorate Cities</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $governorates as $governorate )
                        <tr>
                            <td scope="row" class="text-center">
                                {{$governorate->id}}
                            </td>

                            <td class="text-center">
                                {{$governorate->name}}
                            </td>

                            <td class="text-center">
                                <a href='{{url('/edit_form/'.$governorate->id)}}' >
                                    <i class="fas fa-pen-square" style="    font-size: 25px;"></i>
                                </a>
                            </td>

                            <td class="text-center">

                                <a
                                        href='{{url('/destroy/'.$governorate->id)}}'
                                        onclick="return confirm('Please confirm delete');"

                                   >
                                    <i class="fas fa-trash-alt"  style="font-size: 21px;color: #b50000;"></i>
                                </a>

                            </td>

                            <td class="text-center">

                                {!! Form::open(
                    [
                        'url'=>'/city_governotate',
                        'action'=>'post' ,
                        'class'=>'form-inline',
                        'style'=>'margin-left: 1%'
                    ]
                ) !!}
                                <select class="form-control" style="width: 14pc;display:none" name="governorate_id">

                                        <option value="{{$governorate->id}}"> {{$governorate->name}}</option>

                                </select>

                                <button style="    background-color: white;
    border: none;
    color: #3c8dbc;" type="submit"><i class="fas fa-eye" style="font-size: 21px;"></i></button>
                                {!! Form::close() !!}

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