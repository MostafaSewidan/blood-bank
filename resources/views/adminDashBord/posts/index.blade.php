@extends('layouts.app')
@inject('favoret_post' , App\Models\Post)
<?php $categories = \App\Models\Category::all();?>
@section('content2')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Posts
            {{--            <small>it all starts here</small>--}}
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">


        <!-- Default box -->
        <div class="row">

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
                    <div class="box-body" style="color: #51a65a;">

                        {!! Form::open(
                                   [
                                       'url'=>'/post_word',
                                       'action'=>'post' ,
                                       'class'=>'sidebar-form',
                                       'style'=>'margin-right: 72%'
                                   ]
                               ) !!}

                        <div class="input-group">

                            {!! Form::text('word',null,['class'=>'form-control','placeholder'=>'Search with word...']) !!}
                            <span class="input-group-btn">
                             <button type="submit"   id="search-btn" class="btn btn-flat">
                                 <i class="fa fa-search"></i>
                             </button>
                        </span>

                        </div>
                        {!! Form::close() !!}
                        <hr style="    border-top: 1px solid #51a65a;">

                        <label style="    margin-left: 1%;">Select with category name</label>
                        {!! Form::open(
                            [
                                'url'=>'/category_post',
                                'action'=>'post' ,
                                'class'=>'form-inline',
                                'style'=>'margin-left: 1%'

                            ]
                        ) !!}
                        <div class="form-group">
                            <select class="form-control" style="width: 14pc;" name="category_id">
                                @foreach( $categories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <a href="http://blood_bank.com/create_post" class="btn btn-primary"><i class="fas fa-plus"></i>  ADD Post</a>
                <br><br>
            </div>
            @foreach($posts as $post)
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border" style="border-bottom: none">

                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">

{{--                        the post img                    --}}
                        <img class="img-responsive pad" src="{{asset('Adminlte/img/'.$post->image)}}" alt="Photo" height="100" width="1000">

                        <!-- /.post ditales -->
                        <h3>{{$post->title}}</h3>
                        <br>
                        <p>{{$post->body}}</p>
                        <hr style="border-top: 1px solid #51a65a26;">
                        <a href='{{url('/destroy_post/'.$post->id)}}' onclick="return confirm('Please confirm delete');" style="margin-left: 1pc;">
                            <i class="fas fa-trash-alt" style="font-size: 21px;color: #b50000;"></i>
                        </a>

                        <a href="{{url('/favorite_post/'.$post->id)}}">
                            <span class="pull-right text-muted" style="    margin-right: 2pc;
    margin-bottom: 1pc;
    font-size: 17px;">
                                 <span style="padding-right: 3px;
    color: blue;">
                                    {{$favoret_post->find($post->id)->clients()->count()}}
                                 </span>
                                 <i class="fas fa-heart" style="    color: red;"></i>
                            </span>
                        </a>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            @endforeach
            <!-- /.col -->

            <!-- /.end row -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection