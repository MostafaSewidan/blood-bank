@extends('layouts.app')

@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            UPDATE CITY
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <h3 class="box-title">EDIT FORM</h3>
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
                                                                         'url' =>'/edit_city/'.$city->id,
                                                                        'method'=>'post'
                                                                    ])
                                                                 !!}
                {!! Form::text('name' ,$city->name ,['class'=>"form-control"]) !!}
                <br>
                <button type = 'submit' class="btn btn-primary"><i class="fas fa-plus"></i>  Add</button>
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection