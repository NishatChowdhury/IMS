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

            .item2 span{
            top: 3px;
            position: relative;
            color: #fff;

        }






        .logoo {
            height: 315px;
            width: 239px;
    padding: 2px;
    margin-top: 71px;
}

.logoo img {
    height: 42%;
    width: 100%;
    color: white;
    border-radius: 10px;
    background-position-x: bottom;
}
        .logoo3 {
            position: absolute;
            height: 35px;
            width: 140px;
            bottom: 20px;
            left: -35px;

        }

        .logoo3 img {
            height: 100%;
            width: 50%;
            color: white;
            border-radius: 10px;
            background-position-x: bottom;
        }

    </style>

</head>

@foreach ($students->chunk(5) as $key => $chunk)
    <div class="row" style="{{ ($key + 1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach ($chunk as $student)
            <div class="col-3 col-2-5">
                <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;  ">
                    <div class="  " style="height: 1.9in;">
                        <div class="row">
                            <div class="col-md-12 ">
                                <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" alt=""
                                    style="height: 47px;   width: 55px ; border-radius: 3px; ;position: absolute ; top: 3px ; left: 21px;">
                                <div class="nat">
                                    <img src="{{ asset('assets/img/logos/bg2.JPG') }}" alt=""
                                        style="height: 54px; width: 238px; border-radius: 3px;">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="right text-center">
                                    <div class="scl-cd-dec text-wrap text-bold ">
                                        <h2
                                            style="position: relative;top:4px;margin: 1px;text-align: center;font-size: 18px;color: #000;font-weight: bold;font-family: sans-serif;">
                                            {{ siteConfig('name') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('storage/uploads/students/') }}/{{ $student->student->image ?? '' }}"
                            style="    width: 90px;  height: 90px;   position: relative; left: 1px; top: 10px;"
                            class="text-center rounded mx-auto d-block border border-dark">
                        <div class="logoo ">
                            <img src="{{ asset('assets/img/logos/sid3.JPG') }}">
                        </div>

                    </div>

                    <div class="card-body text-center">
                        <h1 class="card-title text-bold nName"
                            style="padding-top: 3px;position: relative;top: -11px;margin: 2px;text-align: center; font-size:{{ $card['title_size'] != null ? $card['title_size'] : 0 }}px ;color:{{ $card['titlecolor'] }};font-weight: bold;">
                            {{ $student->student->name }}</h1>
                        <div class="row">
                            <div class="right col-12" style="    margin-top: -13px; line-height: 15px;">
                                <div class="stu-cd-dec" style="text-align: left">

                                    <table class="table" style="font-size: 12px;">
                                        <tbody>
                                            @isset($card['fullname'])
                                                <tr>
                                                    <td><strong> {{ __('Name') }} </strong></td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td><strong> {{ $student->student->name }} </strong></td>
                                                </tr>
                                            @endisset
                                            @isset($card['fname'])
                                                <tr>
                                                    <td> {{ __('Father') }} </td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>{{ $student->student->father->f_name }}</td>
                                                </tr>
                                            @endisset
                                            @isset($card['mname'])
                                                <tr>
                                                    <td> {{ __('Mother') }} </td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>{{ $student->student->mother->m_name }}</td>
                                                </tr>
                                            @endisset
                                            @isset($card['session'])
                                                <tr>
                                                    <td> {{ __('Session') }} </td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>{{ $student->session->year }}</td>
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
                                                    <td>{{ $student->rank }}</td>
                                                </tr>
                                            @endisset
                                            @isset($card['department'])
                                                <tr>
                                                    <td> {{ __('Department') }} </td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>{{ $student->department }}</td>
                                                </tr>
                                            @endisset
                                            @isset($card['admissiondate'])
                                                <tr>
                                                    <td> {{ __('Admission') }} </td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>{{ $student->admission_date }}</td>
                                                </tr>
                                            @endisset
                                            @isset($card['dob'])
                                                <tr>
                                                    <td> {{ __('DOB') }} </td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>{{ $student->student->dob }}</td>
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
                                                    <td>{{ $student->student->mobile }}</td>
                                                </tr>
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="sinn">
                        <img src="{{ asset('assets/img/logos/re.png') }}" alt=""
                            style="    height: 34px;    width: 86px;   position: relative;   left: 154px;    top: 34px;">
                    <h5 id="idsignature"
                        style="position: relative; top: 16px;  left: 159px;  font-size: 16px;  color: white;">
                        {{ $card['signature'] }} </h5>
                    </p>

                </div>
            <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;  ">
                                            <div class="  " style="height: 1.9in;">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                    <img  src="{{asset('assets/img/logos/klr.png')}}"  alt="" style="    height: 64px;   width: 75px ; border-radius: 3px; ;position: absolute ; top: -6px ; left: 21px;">
                                                    <div class="nat">
                                                      <img  src="{{asset('assets/img/logos/bg2.JPG')}}"  alt="" style="height: 54px; width: 238px; border-radius: 3px;">
                                                  </div>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="right text-center">
                                                            <div class="scl-cd-dec text-wrap text-bold ">
                                                                <h2
                                                                    style="position: relative;top:4px;margin: 1px;text-align: center;font-size: 18px;color: #000;font-weight: bold;font-family: sans-serif;">
                                                                    Jalalabad Grammar School
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="{{asset('assets/img/logos/nam.jpg')}}" style="    width: 90px;  height: 90px;   position: relative; left: 1px; top: 10px;" class="text-center rounded mx-auto d-block border border-dark">
                                                <div class="logoo ">
                                             <img src="{{asset('assets/img/logos/sid3.JPG')}}">
                                                </div>

                                            </div>

                                            <div class="card-body text-center">

                                            <!-- <div  style=" text-align: center; margin-top: 13px; font-size: 18px; font-weight: bold;  color: white;  background-color: #3C3CB9;   height: 34px;  width: 2.487in; margin-left: -10px; padding: 2px;">
                                              <p class="p-0">Sukirti Chakma Poran</p>
                                                    </div> -->
                                                <h1 class="card-title text-bold nName"
                                                    style="padding-top: 3px;position: relative;top: -11px;margin: 2px;text-align: center; font-size:15px ;color:rgb(35, 12, 167);font-weight: bold;">
                                                    {{ __('Student Name') }}</h1>
                                                <div class="row">
                                                    <div class="right col-12" style="    margin-top: -13px; line-height: 15px;">
                                                        <div class="stu-cd-dec" style="text-align: left">
                                                            <table class="table" style="font-size: 12px;">
                                                            <tbody>
                                                                    <tr class="tname" style="display: block;">
                                                                        <td><strong> Name </strong></td>
                                                                        <td>:</td>
                                                                        <td><strong> Student Name </strong></td>
                                                                    </tr>
                                                                    <!-- <tr class="tfname" style="display: block;">
                                                                        <td><b>{{ __('Father') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td><strong> Father's Name </strong></td>
                                                                    </tr>
                                                                    <tr class="tmname" style="display: block;">
                                                                        <td> <b>{{ __('Mother') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td><strong> Mother's Name </strong></td>
                                                                    </tr> -->
                                                                    <tr class="tcname" style="display: block;">
                                                                        <td> <b>{{ __('Class') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td> {{ __('Seven') }} </td>
                                                                    </tr>
                                                                    <tr class="tsname" style="display: block;">
                                                                        <td><b>{{ __('Section') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="trname" style="display: block;">
                                                                        <td><b>{{ __('Roll') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="tgname" style="display: block;">
                                                                        <td><b>{{ __('Group') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="tbname" style="display: block;">
                                                                        <td><b>{{ __('Blood Group') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="tpname" style="display: block;">
                                                                        <td><b>{{ __('Contact') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <!-- <tr class="tdname">
                                                                        <td><b>{{ __('Depertmant') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="tdobname">
                                                                        <td><b>{{ __('Date Of Birth') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="taname">
                                                                        <td><b>{{ __('Admission Date') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr> -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="sinn">
                                                <img src="{{asset('assets/img/logos/re.png')}}"  alt="" style="    height: 34px;    width: 86px;   position: relative;   left: 154px;    top: 34px;">
                                                 <!-- <hr style="    position: relative;top: 25px; width: 97px; left: 142px; background-color: white;"> -->
                                                <h5 style="     position: relative; top: 16px;  left: 159px;  font-size: 16px;  color: white;">Signature </h5>
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
