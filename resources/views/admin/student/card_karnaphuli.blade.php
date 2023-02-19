<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WPIMS</title>
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



        .grid-container {
            position: relative;
            top: 1px;
            /* bottom: -87px; */
            border-radius: 10px;
            display: grid;
            /* grid-template-columns: auto auto auto auto; */

            background-color: #fff;

        }

        .grid-container>div {

            text-align: center;
            height: 30px;


        }

        .item1 {

            grid-column: 1/ span 2;
            border-radius: 0px 0px 0px 5px;
            background-color: rgb(16, 100, 21);
            font-size: 10px;
            color: #fff;
            
        }

        .item2 {
            grid-column: 3/ span 3;
            border-radius: 0px 0px 5px 0px;
            background-color: rgb(216, 29, 29);
            font-size: 13px;

        }

        .item2 span {
            top: 3px;
            position: relative;
            color: #fff;

        }

        .logoo3 {
            position: absolute;
            height: 35px;
            width: 140px;
            bottom: 20px;
            right: -35px;

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
            <div class="col-3 col-2-5" {{-- style="max-width:260px; max-height:375px" --}}>
                <div class="card text-center" style="width: 2.17in;height:4.18in">
                    <div class="card-header bg-white border-0"
                        style="padding:10px 0 0 10px;background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="left ">
                                    <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                        style="width:.6in ; height:.6in"
                                        class="text-center rounded-circle mx-auto d-block">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="right text-center">
                                    <div class="scl-cd-dec text-wrap text-bold">
                                        <h2
                                            style="padding-top: 3px; position: relative;top: 4px;margin: 2px;text-align: center; font-size:14px ;color:rgb(104, 8, 12)">
                                            <strong> {{ siteConfig('name') }}</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/uploads/students/') }}/{{ $student->student->image }}"
                            width="70" alt=""
                            style="border: 2px solid #000;min-height: 70px;max-height: 90px"
                            class="text-center rounded mx-auto d-block border border-dark">
                        @isset($card['nickname'])
                            <h2
                                style="padding-top: 3px;    position: relative;top: 4px;margin: 2px;text-align: center; font-size:18px ;color:rgb(4, 34, 133)">
                                <strong> {{ $student->student->name }} </strong></h2>
                        @endisset
                        <table class="table"
                            style="text-align:left;font-size:{{ $card['body_size'] != null ? $card['body_size'] : 0 }}px">
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
                                        <td><strong>{{ __('Father') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->student->father->f_name }}</td>
                                    </tr>
                                @endisset
                                @isset($card['mname'])
                                    <tr>
                                        <td><strong>{{ __('Mother') }}</strong> </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->student->mother->m_name }}</td>
                                    </tr>
                                @endisset
                                <tr>
                                    <td><strong>{{ __('Group') }}</strong> </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->group->name }}</td>
                                </tr>
                                @isset($card['class'])
                                    <tr>
                                        <td><strong>{{ __('Class') }}</strong></td>
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
                                        <td><strong>{{ __('Roll') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->rank }}</td>
                                    </tr>
                                @endisset
                                @isset($card['department'])
                                    <tr>
                                        <td><strong>{{ __('Department') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->department }}</td>
                                    </tr>
                                @endisset
                                @isset($card['admissiondate'])
                                    <tr>
                                        <td><strong>{{ __('Admission') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->admission_date }}</td>
                                    </tr>
                                @endisset
                                @isset($card['dob'])
                                    <tr>
                                        <td><strong>{{ __('DOB') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->student->dob }}</td>
                                    </tr>
                                @endisset
                                @isset($card['blood'])
                                    <tr>
                                        <td><strong>{{ __('Blood Group') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->student->blood->name ?? '' }}</td>
                                    </tr>
                                @endisset
                                @isset($card['contact'])
                                    <tr>
                                        <td><strong>{{ __('Contact') }}</strong></td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $student->student->mobile }}</td>
                                    </tr>
                                @endisset
                                <tr>
                                    <td><strong>{{ __('Validity') }}</strong> </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong>{{ __('31 June 2024') }}</strong></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer" style="float:right;background-color:transparent;border:none">

                        <div class="col-4 ml-4" style="float: right; padding-right:3px">
                            <img src="{{ asset('assets/img/signature/signature.png') }}" width="40" alt="">
                        </div>

                    </div>
                    <div class="card-footer text-muted"
                        style="background-color:{{ $card['bgcolor'] }};font-size:{{ $card['body_size'] != null ? $card['body_size'] : 0 }}px">
                        <div class=" grid-container">
                            <div class="item1 p-2">{{ __('Karnaphuli, Chattogram') }}</div>
                            <div class="item2"> <span>{{ __('Principal') }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
</body>

</html>
