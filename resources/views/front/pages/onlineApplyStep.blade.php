@extends('layouts.front-inner')

@section('title','Inner Page')
@section('style')
<style>
    .custom_shadow{
        box-shadow: rgb(100 100 111 / 26%) 0px 7px 29px 0px;
    }
    .cl1{
        background: #0e5a66;
    }
    span.form-header {
    font-size: 21px;
    font-weight: 600;
    /* background: rebeccapurple; */
    color: #fff;
}
.items-box {
    padding: 15px;
    background: #66cc56;
    text-align: center;
    border-radius: 2%;
    transition: .5s;
    color: #fff;
    font-weight: 900;
    cursor: pointer;
    box-shadow: rgb(100 100 111 / 26%) 0px 7px 29px 0px;
}

.items-box:hover {
    background: #629d58;
}
span.className {
    font-size: 30px;
}

span.GroupName {
    font-size: 30px;
    /* font-style: italic; */
}

</style>
@endsection

@section('content')

     <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Result </a>
                        </li>
                        <li class="breadcrumb-item">
                            
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                      </div>
                      <div class="row">
                         

                         <div class="table-responsive my-4">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col" class="font-weight-semiBold">Name</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($admissionStep as $admission)
                                <tr>
                                  <td>{{ $admission->classes->name }} {{ $admission->group_id ? $admission->group->name : '' }}</td>
                                  <td>{{ $admission->end }}</td>
                                  <td>
                                    <a href="{{ url('/online-apply') }}/{{ $admission->id }}" class="btn btn-link">View</a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                         

                      </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section> 



@stop