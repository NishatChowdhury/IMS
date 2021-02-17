@extends('layouts.fixed')

@section('title','Settings | Email Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Email Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Email Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add Email Data</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>Mail Driver </th>
                                    <th>Mail Host</th>
                                    <th>Mail Port</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Encryption</th>
                                    <th>Mail From Address</th>
                                    <th>Mail From Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @php $i = 1; @endphp
                                <tbody>
                                    @foreach($allData as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->mail_driver }}</td>
                                            <td>{{ $data->mail_host }}</td>
                                            <td>{{ $data->mail_port }}</td>
                                            <td>{{ $data->username }}</td>
                                            <td>{{ $data->password }}</td>
                                            <td>{{ $data->encryption }}</td>
                                            <td>{{ $data->from_address }}</td>
                                            <td>{{ $data->from_name }}</td>
                                            <td>
                                                <a type="button" class="btn btn-warning btn-sm edit" value="{{ $data->id }}">Edit</a> ||
                                                {!! Form::open(['action'=>['emailSettingController@destroy',$data->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--<form>--}}
                    {{ Form::open(['action'=>'emailSettingController@store','method'=>'post','files'=>true]) }}
                    <div class="form-group row">
                        <label for="mail_driver" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Mail Driver:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="mail_driver" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mail_host" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Mail Host:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="mail_host" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mail_port" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Mail Port:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="mail_port" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Username:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Password:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="encryption" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Encryption:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="encryption" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="from_address" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">From Address:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="from_address" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="from_name" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">From Name:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="from_name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Save Email Data</button>
                    </div>
                    {{ Form::close() }}
                    {{--</form>--}}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->



    <!-- ***/ Pop Up Model for Edit Session Class -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=>'emailSettingController@update', 'method'=>'post']) !!}
                    {!! Form::hidden('id', null, ['id'=>'id']) !!}
                    <div class="form-group row">
                        <label for="mail_driver" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Mail Driver:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('mail_driver',null,['class'=>'form-control mail_driver']) }}
{{--                                <input type="text" name="mail_driver" class="form-control mail_driver" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mail_host" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Mail Host:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('mail_host',null,['class'=>'form-control mail_host']) }}
{{--                                <input type="text" name="mail_host" class="form-control mail_host" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mail_port" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Mail Port:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('mail_port',null,['class'=>'form-control mail_port']) }}
{{--                                <input type="text" name="mail_port" class="form-control mail_port" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Username:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('username',null,['class'=>'form-control username']) }}

{{--                                <input type="text" name="username" class="form-control username" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Password:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('password',null,['class'=>'form-control password']) }}

{{--                                <input type="text" name="password" class="form-control password" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="encryption" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Encryption:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('encryption',null,['class'=>'form-control encryption']) }}

{{--                                <input type="text" name="encryption" class="form-control encryption" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="from_address" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">From Address:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('from_address',null,['class'=>'form-control from_address']) }}

{{--                                <input type="text" name="from_address" class="form-control from_address" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="from_name" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">From Name:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('from_name',null,['class'=>'form-control from_name']) }}

{{--                                <input type="text" name="from_name" class="form-control from_name" id=""  aria-describedby="">--}}
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-warning  btn-sm" > <i class="fas fa-plus-circle"></i> Update</button>
                    </div>

                    {!! Form::close() !!}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

@stop
@section('script')
    <script>
        $(document).on('click','.edit',function () {
            $('#edit').modal('show');
            var id = $(this).attr('value');
            console.log(id);
            $.ajax({
                method  : 'post',
                url     :  '{{ url('admin/setting/email/edit') }}',
                data    :   {id:id,"_token":"{{ csrf_token() }}"},
                dataType : 'json',
                success:function (response) {
                    console.log(response);
                    $("#id").val(response.id);
                    $(".mail_driver").val(response.mail_driver);
                    $(".mail_host").val(response.mail_host);
                    $(".mail_port").val(response.mail_port);
                    $(".username").val(response.username);
                    $(".password").val(response.password);
                    $(".encryption").val(response.encryption);
                    $(".from_address").val(response.from_address);
                    $(".from_name").val(response.from_name);
                },
                erorr:function (err) {
                    console.log(err);
                }
            });
        });

        function confirmDelete(){
            var x = confirm('Are you sure you want delete this calender schedule?');
            return !!x;
        }
    </script>
@stop




