@extends('layouts.app')
<?php $categories = \App\Models\Category::all();?>
@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CREATE POST
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">ADD Post</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">



                {!! Form::open(
                                                                    [
                                                                         'url' =>'/store_post',
                                                                        'method'=>'post',
                                                                        'files'=>true
                                                                    ])
                                                                 !!}

                <div class="form-group">
                    <label> SELECT THE CATEGORY </label>

                    <select class="form-control"  name="category_id">
                        @foreach( $categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <label> WRITE POST TITLE</label>
                    {!! Form::text('title' ,old('title'),['class'=>"form-control"]) !!}
                <br>
                <label> WRITE POST BODY</label>
                {!! Form::text('body' ,old('body') ,['class'=>"form-control"]) !!}
                <br>
                <label> SELECT POST IMAGE</label>
                {!! Form::file('file') !!}

                    <br>
                    <button type = 'submit' class="btn btn-primary"><i class="fas fa-plus"></i>  ADD</button>
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection