<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('WPIMS') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        * {
            font-family: Arial;
        }

        .table td {
            padding: 0;
            border-top: none;
        }

        .card-body {
            padding: 0 10px 10px 10px;
        }

        .card-footer {
            padding: 0;
        }

        .col-2-5 {
            flex: 0 0 20% !important;
            max-width: 20% !important;
        }

        <style>.checkbox {
            padding: 10px;
            margin: 10px 0;
        }

        input.largerCheckbox {
            width: 20px;
            height: 20px;
            background-color: transparent;
        }

        .checkbox label {
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }

        .radio-inline input {
            width: 15px;
            height: 15px;
            background-color: transparent;
        }

        label span {
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }

        .table td,
        .table th {
            padding: 1px;
            vertical-align: top;
            border-top: 0;
        }

        .card-body {
            padding: 5px 10px;
        }

        .scl-cd-dec h6 {
            margin-bottom: 0px !important;
            font-size: 10px;
        }

        .scl-cd-dec p {
            font-size: 8px;
        }

        .card-header1 {
            border-bottom: 1px solid #d8d8d8;
            padding: 9px 0px 9px 20px;
            background: #f7f7f7;
        }

        .checkbox {
            padding: 10px;
            margin: 10px 0;
        }

        input.largerCheckbox {
            width: 20px;
            height: 20px;
            background-color: transparent;
        }

        .checkbox label {
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }

        .radio-inline input {
            width: 15px;
            height: 15px;
            background-color: transparent;
        }

        label span {
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }

        .table td,
        .table th {
            padding: 1px;
            vertical-align: top;
            border-top: 0;
        }

        .card-body {
            padding: 5px 10px;
        }

        .scl-cd-dec h6 {
            margin-bottom: 0px !important;
            font-size: 10px;
        }

        .scl-cd-dec p {
            font-size: 8px;
        }

        .card-header1 {
            border-bottom: 1px solid #d8d8d8;
            padding: 9px 0px 9px 20px;
            background: #f7f7f7;
        }



        .grid-container {
            position: relative;
            top: 1px;
            border-radius: 10px;
            display: grid;
            background-color: #fff;

        }

        .grid-container>div {

            text-align: center;
            height: 36px;
        }

        .item1 {

            grid-column: 1/ span 2;
            border-radius: 0px 0px 0px 5px;
            background-color: rgb(13, 94, 13);
            font-size: 11px;
            color: #fff;


        }

        .item2 {
            grid-column: 3/ span 3;
            border-radius: 0px 0px 5px 0px;
            background-color: rgb(194, 41, 41);
            font-size: 15px;

        }

        .item2 span {
            top: 3px;
            position: relative;
            color: #fff;

        }





        .nat {
            position: relative;
            background-color: #191970;
            text-align: center;
            border-bottom: 1px solid white;
        }

        .nat h2 {
            color: red;
            font-weight: 700;
            font-size: 1.9rem;
            -webkit-text-stroke-width: .4px;
            -webkit-text-stroke-color: rgb(234, 231, 231);
        }

        .nat h3 {
            color: rgb(248, 246, 246);
            font-weight: 300;
            font-size: .96rem;
        }

        .wrapperr {
            display: grid;
            grid-template-columns: 115px 125px 120px;
            color: #fff;
            text-align: center;
            font-size: 10px;
            background-color: #191970;
            position: relative;
            top: -16px;
            height: 20px;
        }

        .logoo {
            opacity: 0.1;
            position: absolute;
            height: 100px;
            width: 100px;
            margin: 2px;
            top: 88px;
            left: 123px;

            align-items: center;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 200px;

        }

        .wrapperrr {
            position: relative;
            top: -12px;
            display: grid;
            grid-template-columns: 150px 140px;
            color: #fff;
            margin-left: 105px;
            text-align: center;
        }
    </style>

</head>

@foreach ($students->chunk(4) as $key => $chunk)
    <div class="row" style="{{ ($key + 1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach ($chunk as $student)
            <div class="col-3 col-3-5">
                <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;  ">
                    <div class="  "
                        style="   background: linear-gradient(#3C3CB9, #3C3CB9 45%, #3C3CB9 45%,  #3C3CB9 100%);    height: 1.9in;">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="left ">
                                    <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                        style=" height: 54px;  width: 73px;  text-align: center; margin: 5px;   border-radius: 6px; position: relative; top: 5px;"
                                        class="text-center  mx-auto d-block ">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="right text-center">
                                    <div class="scl-cd-dec text-wrap text-bold ">
                                        <h2
                                            style="position: relative;top: 10px; margin: 1px;text-align: center;  font-size: 14px;  color: #fff; font-weight: bold;     font-family: sans-serif;">
                                            {{ siteConfig('name') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <img src="{{ asset('storage/uploads/students/') }}/{{ $student->student->image }}"
                            style="    width: 90px;  height: 90px;   position: relative; left: 1px; top: 24px;"
                            class="text-center rounded mx-auto d-block border border-dark">
                    </div>
                    <div
                        style=" text-align: center; font-size: 18px; font-weight: bold; position: relative; top: 28px;">
                        <p>{{ $card['title'] }}</p>
                    </div>
                    <div class="card-body text-center">

                        <div
                            style=" text-align: center; margin-top: 12px; font-size: 18px; font-weight: bold;  color: white;  background-color: #3C3CB9;   height: 32px;  width: 2.487in; margin-left: -10px; padding: 2px;">
                            <p class="p-0">{{ $student->student->name ?? '' }}</p>
                        </div>
                        <div class="row">
                            <div class="right col-12" style="float:left; margin-top: 3px;">
                                <div class="stu-cd-dec" style="text-align: left">
                                    <table class="table" style="font-size: 12px; font-weight:600">
                                        <tbody>
                                            @isset($card['fullname'])
                                                        <tr>
                                                            <td><strong> {{ __('Name') }} </strong></td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td><strong> {{ $student->student->name ?? '' }} </strong></td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['fname'])
                                                        <tr>
                                                            <td> {{ __('Father') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->student->father->f_name  ?? ''}}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['mname'])
                                                        <tr>
                                                            <td> {{ __('Mother') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->student->mother->m_name  ?? ''}}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['session'])
                                                        <tr>
                                                            <td> {{ __('Session') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->session->year ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['class'])
                                                        <tr>
                                                            <td> {{ __('Class') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>
                                                                {{ $student->classes->name ?? '' }}&nbsp;
                                                                @if ($card['group'])
                                                                    {{ $student->group->name ?? '' }}&nbsp;
                                                                @endif
                                                                @if ($card['section'])
                                                                    {{ $student->section->name ?? '' }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['roll'])
                                                        <tr>
                                                            <td> {{ __('Roll') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->rank ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['department'])
                                                        <tr>
                                                            <td> {{ __('Department') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->department ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['admissiondate'])
                                                        <tr>
                                                            <td> {{ __('Admission') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->admission_date ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['dob'])
                                                        <tr>
                                                            <td> {{ __('DOB') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->student->dob ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['blood'])
                                                        <tr>
                                                            <td> {{ __('Blood Group') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->student->blood->name ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($card['contact'])
                                                        <tr>
                                                            <td> {{ __('Contact') }} </td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>{{ $student->student->mobile ?? '' }}</td>
                                                        </tr>
                                                    @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="sinn">
                        <img src="{{ asset('assets/img/signature/jalalabadSignature.png') }}" alt=""
                            style="    height: 33px; width: 88px;  position: relative;   left: 126px;  top: 75px;">
                        <hr
                            style="position: relative;     position: relative;  top: 38px;   width: 132px;  left: 105px;">
                    <h5 style="position: relative;  top: 22px;  left: 108px; font-size: 15px;">
                        {{ $card['signature'] }} </h5>
                    </p>

                </div>
            </div>
        @endforeach
    </div>
@endforeach

<div class="col-12" style="padding-top: 50px;">
    <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 33px;">
        <div class="card-body text-center">
            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" width="60"
                style=" height: 74px;   width: 96px;  text-align: center;  margin: 10px;   border-radius: 6px;">


            <div class="row">
                <div class="col-md-12">
                    <div class="card-back-dec text-bold" style="text-align: left; margin-top: -16px;font-size: 12px">
                        <h2
                            style="    text-align: center;   position: relative;  top: 23px;   font-size: 20px;  font-weight: bold;">
                            {{ __('If Found Please Return The Card To') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="" style="margin-top: 27px;">
                    <p style="margin-bottom: 7px;"><strong>{{ siteConfig('name') }} <br> </strong>
                    <p style=" margin-bottom: 5px;font-weight: 600;  font-size: 14px;">{{ siteConfig('address') }}</p>
                    </p>
                </div>
                <div class="crd-add-dec text-bold"
                    style="    text-align: center;   position: relative; left: 58px;top: -6px;">
                    <table class="table" style="font-size: 12px; font-weight:bold">
                        <tbody>
                            <tr>
                                <td> {{ __('Phone') }} </td>
                                <td>:</td>
                                <td id="bphone">{{ siteConfig('phone') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
