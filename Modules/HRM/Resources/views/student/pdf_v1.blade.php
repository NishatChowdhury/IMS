<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WPIMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        *{
            font-family: Arial;
        }
        .table{
            margin-top: -9px;
        }
        .table td{
            padding: 0;
            border-top: none;
        }
        .card-body{
            padding: 0 10px 10px 20px;
        }
        .card-footer{
            padding: 0;
        }
        .col-2-5{
            flex: 0 0 20% !important;
            max-width: 20% !important;
        }
    </style>

</head>
<body>
@foreach($students->chunk(5) as $key => $chunk)
    <div class="row" style="{{ ($key+1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach($chunk as $student)
            <div class="col-3 col-2-5" {{--style="max-width:260px; max-height:375px"--}}>
                <div class="card text-center" style="width: 2.17in;height:3.42in">
                    <div class="card-header" style="padding:10px 0 0 10px;background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">
                        <div class="row">
                            <div class="col-md-2">
                                <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="40">
                            </div>
                            <div class="col-md-10">
                                <h6 class="scl-cd-name" style="font-size:{{ $card['name_size'] !=null ? $card['name_size'] :  0}}px;margin-bottom: 0;"><b> {{ siteConfig('name') }}</b></h6>
                            </div>
                        </div>
                        <div>
                            <p class="scl-cd-add" style="font-size:{{ $card['address_size'] !=null ? $card['address_size']:0 }}px;margin-left: 31px"><b>{{ __('Knowledge Is Power') }}</b></p>

                        </div>
                    </div>
                    <div class="card-body">
                        <h6  id="idtitle" class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px;margin-bottom: 0"><strong>{{ $card['title'] }}</strong></h6>
                        <img src="{{ asset('storage/uploads/students/') }}/{{ $student->student->image ?? ''}}" width="70" alt="" style="border: 2px solid #000;min-height: 70px;max-height: 90px">
                        @isset($card['nickname'])
                            <h5 class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px;font-weight: bold;margin-top:5px"> {{ $student->student->name ?? ''}} </h5>
                        @endisset

                        <table class="table" style="text-align:left;font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                            <tbody>
                            @isset($card['fullname'])
                                <tr>
                                    <td><strong> Name </strong></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong> {{ $student->student->name  ?? ''}} </strong></td>
                                </tr>
                            @endisset
                                <tr>
                                    <td><strong> Guardian </strong></td>
                                    <td>&nbsp;:&nbsp;</td>  
                                    <td><strong> {{ $student->student->guardian->g_name  ?? ''}} </strong></td>
                                </tr>
                            @isset($card['fname'])
                                <tr>
                                    <td> Father </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->father->f_name  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['mname'])
                                <tr>
                                    <td> Mother </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->mother->m_name  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['session'])
                                <tr>
                                    <td> Session </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->session->year  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['class'])
                                <tr>
                                    <td><strong>Class</strong></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>
                                        <strong>{{ $student->classes->name ?? '' }}&nbsp;</strong>
                                        @isset($card['group'])
                                            {{ $student->group->name ?? '' }}&nbsp;
                                        @endisset
                                        @isset($card['section'])
                                            {{ $student->section->name ?? '' }}
                                        @endisset
                                    </td>
                                </tr>
                            @endisset
                            @isset($card['roll'])
                                <tr>
                                    <td> Roll </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->rank  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['department'])
                                <tr>
                                    <td> Department </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->department  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['admissiondate'])
                                <tr>
                                    <td> Admission </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->admission_date  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['dob'])
                                <tr>
                                    <td> DOB </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->dob  ?? ''}}</td>
                                </tr>
                            @endisset
                            @isset($card['blood'])
                                <tr>
                                    <td> Blood Group </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->bloodGroup->name ?? '' }}</td>
                                </tr>
                            @endisset
                            @isset($card['contact'])
                                <tr>
                                    <td><strong>Contact</strong>  </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong>{{ $student->student->mobile  ?? ''}}</strong></td>
                                </tr>
                            @endisset
                            <tr>
                                <td><strong>Validity</strong>  </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><strong>{{ __('31-12-23')}}</strong></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer" style="float:right;background-color:transparent;border:none">
                        <div class="col-5" style="float: right;">
                            <img src="{{ asset('assets/img/signature/signature.png') }}" width="40" alt="">
                        </div>
                    </div>
                    <div class="card-footer text-muted" style="background-color:{{ $card['bgcolor'] }};font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                        <div class="row">
                            <div class="col">
                                
                            </div>
                            <div class="col">
                                <p id="idsignature" class="card-title" style="color:{{ $card['titlecolor'] }}; margin-bottom: 3px"> <strong style="color:{{ $card['bgfont']}}">{{ $card['signature'] }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--        <p>&nbsp;</p>--}}
    </div>
@endforeach


<div class="row">
    <div class="col-3 col-2-5" style="max-width:260px; max-height:375px">
        <div class="card" style="width: 2.17in;height:3.42in">
            <div class="card-body">
                <div class="back-top" style="font-size:12px">
                    <div style="padding-top:15px">
                        <p class="text-center"><b>{{ __('IF FOUND PLEASE RETURN THE CARD TO') }}</b></p>
                    </div>
                </div>
                <div class="back-middle text-center">
                    <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="50">
                    <h6 class="scl-cd-name" style=""><strong> {{ siteConfig('name') }}</strong></h6>
                    <p class="scl-cd-add" style="font-size:15px">{{ siteConfig('address') }}</p>
                </div>
                <div class="back-bottom" style="font-size:12px">
                    <table class="table">
                        <tr>
                            <td>Cell</td>
                            <td style="padding: 0 5px">:</td>
                            <td>{{ __('0312550249') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
</div>
</body>
</html>
