@extends('layouts.student')

@section('title','Profile')

@section('content')
    @php
        $user = auth()->guard('student')->user();
        $student = $user->student;
    @endphp
    <div class="padding-y-80 bg-cover" data-dark-overlay="6" style="background:url(assets/img/breadcrumb-bg.jpg) no-repeat">
        <div class="container">
            <h2 class="text-white">
                Students Profile
            </h2>
            <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Page</a></li>
                <li class="breadcrumb-item">Students Profile</li>
            </ol>
        </div>
    </div>

    <section class="paddingTop-50 paddingBottom-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="card shadow-v1">
                        <div class="card-header text-center border-bottom pt-5 mb-4">
                            <img class="rounded-circle mb-4" src="{{ asset('storage/uploads/students/') }}/{{ $student->image }}" width="200" height="200" alt="">
                            <h4>
                                {{ auth()->guard('student')->user()->name }}
                            </h4>
                            <p>
                                {{ $student->studentId }} <br>
                                {{ $student->studentAcademic->classes->name }} {{ $student->studentAcademic->group->name ?? '' }} {{ $student->studentAcademic->section->name ?? '' }}
                            </p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item m-2">
                                    <i class="ti-shopping-cart text-primary"></i>
                                    <span class="d-block">Rank</span>
                                    <span class="h6">{{ $student->rank }}</span>
                                </li>
                                <li class="list-inline-item m-2">
                                    <i class="ti-heart text-primary"></i>
                                    <span class="d-block">DOB</span>
{{--                                    <span class="h6">{{ $student->dob ? $student->dob->format('Y-m-d') : '' }}</span>--}}
                                </li>
                            </ul>
                        </div>
                        <div class="card-body border-bottom">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <span class="d-block">Email address:</span>
                                    <a class="h6" href="mailto:{{ $student->email }}">{{ $student->email }}</a>
                                </li>
                                <li class="mb-3">
                                    <span class="d-block">Phone:</span>
                                    <a class="h6" href="callto:{{ $student->mobile }}">{{ $student->mobile }}</a>
                                </li>
                                <li class="mb-3">
                                    <span class="d-block">Location:</span>
                                    <a class="h6" href="#">{{ $student->address }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <p>
                                Quick Action:
                            </p>
                            <ul class="list-inline mb-0">
{{--                                <li class="list-inline-item">--}}
{{--                                    <a href="#" class="btn btn-outline-facebook iconbox iconbox-sm">--}}
{{--                                        <i class="ti-facebook"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="list-inline-item">--}}
{{--                                    <a href="#" class="btn btn-outline-twitter iconbox iconbox-sm">--}}
{{--                                        <i class="ti-twitter"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="list-inline-item">--}}
{{--                                    <a href="#" class="btn btn-outline-google-plus iconbox iconbox-sm">--}}
{{--                                        <i class="ti-google"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-linkedin iconbox iconbox-sm"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="Logout">
                                        <i class="ti-control-stop"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END col-md-4 -->
                <div class="col-lg-8 mt-4">
                    <div class="card padding-30 shadow-v1">
                        <ul class="nav tab-line tab-line border-bottom mb-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Tabs_1-1" role="tab" aria-selected="true">
                                    <i class="ti-download mr-1"></i>
                                    Attendance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Tabs_1-2" role="tab" aria-selected="true">
                                    <i class="fas fa-file-contract mr-1"></i>
                                    Result
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Tabs_1-2" role="tab" aria-selected="true">
                                    <i class="fas fa-dollar-sign mr-1"></i>
                                    Payment
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Tabs_1-1" role="tabpanel">
                                <div class="table-responsive my-4">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">In Time</th>
                                            <th scope="col">Out Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($attendances as $day)
                                        <tr>
                                            <th scope="row" class="text-dark font-weight-semiBold">{{ $day->date->format('Y-m-d') }}</th>
                                            <td>{{$day->entry}} </td>
                                            <td>{{$day->exit}} </td>
{{--                                            <td>{{ minTime($student->studentId,$day->format('Y-m-d')) }}</td>--}}
{{--                                            <td>{{ maxTime($student->studentId,$day->format('Y-m-d')) }}</td>--}}
                                            <td>
                                                <a href="#" class="btn btn-link">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $attendances->links() }}
                                </div>
                            </div> <!-- END tab-pane -->
                            <div class="tab-pane fade" id="Tabs_1-2" role="tabpanel">
                                <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col"><b>Name</b></th>
                                            <th scope="col"><b>Date</b></th>
                                            <th scope="col"><b>Mark's</b></th>
                                            <th scope="col"><b>GPA</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="modal" data-target=".bd-example-modal-lg" >
                                                <td>Maynuddin</td>
                                                <td>10.21.22</td>
                                                <td>89</td>
                                                <td>A</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="result">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content p-4">
                                                    <div class="row">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title h4" id="mySmallModalLabel">Mark Sheet</h5>
                                                        </div>

                                                        <table class="table table-bordered p-8">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col"><b>Name</b></th>
                                                                <th scope="col"><b>Date</b></th>
                                                                <th scope="col"><b>Mark's</b></th>
                                                                <th scope="col"><b>GPA</b></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Maynuddin</td>
                                                                    <td>10.21.22</td>
                                                                    <td>89</td>
                                                                    <td>A</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- END row-->
                            </div> <!-- END tab-pane -->
                        </div> <!-- END tab-content-->
                    </div> <!-- END card-->
                </div> <!-- END col-md-8 -->
            </div> <!--END row-->
        </div> <!--END container-->
    </section>
@stop

