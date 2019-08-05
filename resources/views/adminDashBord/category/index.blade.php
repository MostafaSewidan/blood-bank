@extends('layouts.app')

@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CATEGORY
{{--            <small>it all starts here</small>--}}
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Categories</h3>

                {!! Form::open(
                                    [
                                        'url'=>'/category_name',
                                        'action'=>'post' ,
                                        'class'=>'sidebar-form',
                                        'style'=>'margin-right: 72%'
                                    ]
                                ) !!}

                <div class="input-group">

                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Search with category name...']) !!}
                    <span class="input-group-btn">
                             <button type="submit"   id="search-btn" class="btn btn-flat">
                                 <i class="fa fa-search"></i>
                             </button>
                        </span>

                </div>
                {!! Form::close() !!}

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


                <a href="{{url('/create_category')}}" class="btn btn-primary"><i class="fas fa-plus"></i>  Add Category</a>

                <table class="table" style="margin-top: 10px;">
                    <thead class="thead-dark" style="background: #333333;
    color: white;">
                    <tr class="text-center">
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Edit</th>
                        <th scope="col" class="text-center">Delete</th>
                        <th scope="col" class="text-center">Category Posts</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $categories as $Category )
                        <tr>
                            <td scope="row" class="text-center">
                                {{$Category->id}}
                            </td>

                            <td class="text-center">
                                {{$Category->name}}
                            </td>

                            <td class="text-center">
                                <a href='{{url('/edit_category_form/'.$Category->id)}}' >
                                    <i class="fas fa-pen-square" style="    font-size: 25px;"></i>
                                </a>
                            </td>

                            <td class="text-center">

                                <a
                                        href='{{url('/destroy_category/'.$Category->id)}}'
                                        onclick="return confirm('Please confirm delete');"

                                   >
                                    <i class="fas fa-trash-alt"  style="font-size: 21px;color: #b50000;"></i>
                                </a>

                            </td>

                            <td class="text-center">

                                {!! Form::open(
                    [
                        'url'=>'/post_category',
                        'action'=>'post' ,
                        'class'=>'form-inline',
                        'style'=>'margin-left: 1%'
                    ]
                ) !!}
                                <select class="form-control" style="width: 14pc;display:none" name="category_id">

                                        <option value="{{$Category->id}}"> {{$Category->name}}</option>

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