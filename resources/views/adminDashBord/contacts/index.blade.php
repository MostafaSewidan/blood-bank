@extends('layouts.app')

@section('content2')

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
           Contacts
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
                               'url'=>'/contacts/search',
                               'action'=>'post' ,
                               'style'=>'margin-right: 3%;margin-left: 3%;color:#00a65a'
                           ]
                       ) !!}

                <div class="form-group">

                    <label style="    font-size: 23px;
        margin-left: 11px;"> From</label>
                    {!! Form::date('date_from',old('date'),['class'=>'form-control']) !!}
                </div>

                <hr style="    border-top: 1px solid #51a65a;">

                <div class="form-group">
                    <label style="    font-size: 23px;
        margin-left: 11px;"> To</label>
                    {!! Form::date('date_to',old('date'),['class'=>'form-control']) !!}
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
                        <th scope="col" class="text-center">Client name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Phone</th>
                        <th scope="col" class="text-center">SMS Title</th>
                        <th scope="col" class="text-center">show details</th>
                        <th scope="col" class="text-center">show Client</th>
                        <th scope="col" class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $contacts as $contact )
                        <tr>

                            <td class="text-center">

                                <label>{{$contact->name}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$contact->email}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$contact->phone}}</label>
                            </td>

                            <td class="text-center">
                                <label>{{$contact->sms_title}}</label>
                            </td>

                            <td class="text-center">
                                <a href='{{route('contacts.show',$contact->id)}}' >
                                    <i class="fas fa-eye" style="font-size: 21px;"></i>
                                </a>
                            </td>

                            <td class="text-center">

                                <a
                                        href='{{url('/manage_client/'.$contact->client_id)}}'

                                >
                                    <i class="fas fa-user-edit" style="font-size: 21px"></i>
                                </a>

                            </td>

                            <td class="text-center">
                                {!! Form::open(['url'=>'/contacts/'.$contact->id , 'method'=>'delete']) !!}

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
                    {{ $contacts->links() }}
                </center>


            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection