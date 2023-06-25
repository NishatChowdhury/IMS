@extends('examandresult::layouts.master')
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');
    @import url("https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css");

    .cursive {
        font-family: 'Pinyon Script', cursive;
    }

    .sans {
        font-family: 'Open Sans', sans-serif;
    }

    * {
        font-family: "Open Sans", sans-serif;
        margin: 0;
        padding: 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Oswald", sans-serif;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    a {
        color: #000;
    }

    p {
        margin: 0;
    }

    :root {
        --color1: #ECDDD6;
        --color2: #776A68;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #1f2d3d !important;
    }

    .welcome_part {
        background: var(--color1);
        color: #000;
    }

    .nav-link:hover {
        color: var(--color1);
    }

    /* Menubar End */

    .Border {

        background: var(--color1);
    }

    .Board-Name {
        color: var(--color2);
        text-align: center;
        font-size: 27px;
        font-family: 'Open Sans';
        text-transform: uppercase;
    }

    .service_con h4 {
        margin-top: 10px;
        text-decoration: underline;
        text-transform: uppercase;
    }

    .table-bordered td {
        border: 1px solid black;
    }

    .Name p {
        font-weight: bold;
        font-size: 18px;
    }

    .Name p span {
        font-family: 'Pinyon Script', cursive;
        font-weight: bold;
        font-size: 20px;
        margin-left: 32px;
    }

    .pm-course-title .pm-earned-text {
        font-size: 20px;
    }

    .pm-credits-text {
        font-size: 15px;
    }

    .underline {
        margin-bottom: 7px;
    }

    .pm-certified {
        font-size: 24px;
    }

    .pm-empty-space {
        height: 80px;
        width: 100%;
        display: block;
    }
</style>

@section('title', 'Exam Mgmt | Result Details')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div style="float: right;" class="no-print">
                        <a href="javascript:window.print()" role="button" class="btn btn-success btn-sm" title="PRINT"><i
                                class="fas fa-print"></i></a>
                        <a href="{{ url('c-p') }}/{{ $result->id }}" role="button" class="btn btn-danger btn-sm"
                            title="Download PDF"><i class="fas fa-file-pdf" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container ">
                    <div class="Border">
                        <!-- Menu Bar Start -->

                        <div class=" py-3  col-md-12 col-sm-12 col-lg-12">
                            <div class="container">
                                <h2 class="text-dark text-center">{{ siteconfig('name') ?? '' }}</h2>
                                <p class="text-dark text-center">{{ siteconfig('address') }}</p>
                            </div>
                        </div>
                        <hr style="margin-top:0px;margin-bottom: 0px;height: 4px;">
                        <!-- Menu Bar End -->

                        <!-- Welcome Part Start -->
                        <div class="welcome_part py-2 mx-2">
                            <div class="container">
                                <div class="welcome_con_main d-flex justify-content-center">
                                    <div class="welcome_con text-white text-center">
                                        <h2 class="text-dark text-center">{{ $result->exam->name ?? '' }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Welcome Part End -->


                        <!-- Service Part Start -->
                        <div class="service_part">
                            <div class="container">
                                <div class="service_con_main ">
                                    <div class="row gy-5">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="service_con text-left ">
                                                {{-- <p style="font-size: x-large; font-weight: bold;" class="my-4">Serial No.
                                                    CB 6178589</p>

                                                <p style="font-weight: 700;">
                                                    CBCS08 &nbsp; 80864078
                                                </p> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="service_con text-center">
                                                <div class="service_icon">
                                                    <img src="{{ asset('/assets/img/logos/') }}/{{ siteConfig('logo') }}"
                                                        style="width: 38%;" alt="" />
                                                </div>
                                                <h4>{{ __('Academic Transcript') }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="service_con text-center">
                                                <div class="container w-25 ">
                                                    <table class=" text-center w-25" cellspacing="0" align="center"
                                                        border="1">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ __('letter Grade') }}</th>
                                                                <th>{{ __('Class interval') }}</th>
                                                                <th>{{ __('Grade Point') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ __('A+') }}</td>
                                                                <td>{{ __('80-100') }}</td>
                                                                <td>{{ __('5.00') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('A') }}</td>
                                                                <td>{{ __('70-79') }}</td>
                                                                <td>{{ __('4.00') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('A-') }}</td>
                                                                <td>{{ __('60-69') }}</td>
                                                                <td>{{ __('3.50') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('B') }}</td>
                                                                <td>{{ __('50-59') }}</td>
                                                                <td>{{ __('3.00') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('C') }}</td>
                                                                <td>{{ __('40-49') }}</td>
                                                                <td>{{ __('2.00') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('D') }}</td>
                                                                <td>{{ __('33-39') }}</td>
                                                                <td>{{ __('1.00') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('F') }}</td>
                                                                <td>{{ __('0-32') }}</td>
                                                                <td>{{ __('0.00') }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Service Part End -->

                        <!-- Name part start -->
                        <div class="container mb-3">
                            <div class="Name col-md-12 col-sm-4 mx-3 my-1">
                                <p>{{ __('Name of Student') }}&nbsp;&nbsp;&nbsp;&nbsp; <Span class="cursive"
                                        style="margin-left: 72px;">{{ $result->studentAcademic->student->name ?? '' }}</Span>
                                </p>
                            </div>
                            <div class="Name col-md-12 col-sm-4 mx-3 my-1">
                                <p>{{ __('Father Name') }}&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<Span class="cursive"
                                        style="margin-left: 76px;">{{ $result->studentAcademic->student->father->f_name ?? '' }}</Span>
                                </p>
                            </div>
                            <div class="Name col-md-12 col-sm-4 mx-3 my-1">
                                <p>{{ __('Mother Name') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <Span class="cursive"
                                        style="margin-left: 73px;">{{ $result->studentAcademic->student->mother->m_name ?? '' }}</Span>
                                </p>
                            </div>
                            <div class="Name col-md-12 col-sm-4 mx-3 my-1">
                                <p>{{ __('Name of Institution') }}&nbsp;&nbsp; <Span
                                        class="cursive">{{ siteconfig('name') }}</Span>
                                </p>
                            </div>
                        </div>
                        <!-- Name part end -->

                        <!-- cnter &info start -->
                        <div class="Center_info">
                            <div class="container">
                                <div class="testi_con_main ">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="Name col-md-6 col-sm-4 mx-3 my-1">
                                                <p>{{ __('StudentID :') }} <Span class="cursive testi_con1"
                                                        style="margin-left: -55px; position: relative;left: 113px;">{{ $result->studentAcademic->student->studentId ?? '' }}</Span>
                                                </p>
                                            </div>
                                            <div class="Name col-md-6 col-sm-4 mx-3 my-1">
                                                <p>{{ __('Current Rank:') }} <Span class="testi_con1"
                                                        style="font-family: none; position: relative;left: 145px;">{{ $result->studentAcademic->rank ?? '' }}</Span>
                                                </p>
                                            </div>
                                            <div class="Name col-md-6 col-sm-4 mx-3 my-1">
                                                <p>{{ __('Grade Point:') }} <Span class="cursive testi_con1"
                                                        style="margin-left: -72px; position: relative;left: 203px;">{{ $result->gpa ?? '' }}</Span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="testi_con col-6 text-center text-md-start text-sm-center text-right">
                                            <div class="Name col-md-6 col-sm-4 mx-3 my-1">
                                                <p style="text-align: right;">{{ __('Result Rank:') }}<span
                                                        class="testi_con_span "
                                                        style=" margin-left: -10px;  position: relative; left: 81px;">{{ $result->rank ?? '' }}</Span>
                                                </p>
                                            </div>
                                            <div class="Name col-md-6 col-sm-4 mx-3 my-1">
                                                <p style="text-align: right;">{{ __('Total Mark:') }}<span
                                                        class="testi_con_span "
                                                        style=" margin-left: -10px;  position: relative; left: 81px;">{{ $result->total_mark ?? '' }}</Span>
                                                </p>
                                            </div>
                                            <div class="Name col-md-6 col-sm-4 mx-3 my-1">
                                                <p style="text-align: right;">{{ __('Exam Date:') }}<span
                                                        class="testi_con_span "
                                                        style=" margin-left: -10px;  position: relative; left: 81px;">{{ $result->exam->start }}
                                                        - {{ $result->exam->end }}</Span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cnter &info end -->


                        <!-- result part start  -->
                        <div class="container">
                            <div class=" justify-content-center d-flex result_table">
                                <table id="" class="table table-bordered" width="94%" style="margin-top: 60px;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Code') }}</th>
                                            <th>{{ __('Exam Mark') }}</th>
                                            <th>{{ __('Result Mark') }}</th>
                                            <th>{{ __('Grade') }}</th>
                                            <th>{{ __('Grade point') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($marks as $mark)
                                            <tr>
                                                <td>{{ $mark->subject->name }}</td>
                                                <td>{{ $mark->subject->code }}</td>
                                                <td>{{ $mark->full_mark }}</td>
                                                <td>
                                                    @if ($mark->objective > 0)
                                                        Objective: {{ $mark->objective }}<br>
                                                    @endif
                                                    @if ($mark->written > 0)
                                                        Written: {{ $mark->written }}<br>
                                                    @endif
                                                    @if ($mark->practical > 0)
                                                        Practical: {{ $mark->practical }}<br>
                                                    @endif
                                                    @if ($mark->viva > 0)
                                                        Viva: {{ $mark->viva }}
                                                    @endif
                                                </td>
                                                <td>{{ $mark->grade }}</td>
                                                <td>{{ $mark->gpa }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>

                        </div>
                        <!-- END container-->
                        <!-- result part end -->

                        <!-- last part start -->

                        <div class="col-xs-12 mt-2">
                            <div class="row">
                                <div class=" d-flex justify-content-around  pm-certificate-footer w-100">
                                    <div class="col-sm-6 col-lg-7 text-center pm-certified ">
                                        <span class="pm-empty-space block underline"></span>
                                        {{-- <span style="font-size: 20px;
    font-weight: bold;" class="bold ">Date of
                                            Publication of Result &nbsp; June 17, 2023 </span> --}}
                                    </div>

                                    <div class="col-4 pm-certified col-lg-4 text-center">

                                        <span class="pm-empty-space block underline"></span>
                                        <span style="font-size: 20px;
    font-weight: bold;"
                                            class="bold ">{{ __('Controller of Examinations') }} </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- last part End -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
