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
        .table td{
            padding: 0;
            border-top: none;
        }
        .card-body{
            padding: 0 10px 10px 10px;
        }
        .card-footer{
            padding: 0;
        }
    </style>

</head>
<body>
@foreach($students->chunk(3) as $chunk)
    <div class="row" style="margin: 25px;">
        @foreach($chunk as $student)
            <div class="col-4" {{--style="max-width:260px; max-height:375px"--}}>
                <div class="card text-center" style="width: 18rem;height:25rem">
                    <div class="card-header" style="padding:10px 0 0 10px;background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">
                        <div class="row">
                            <div class="col-md-2">
                                <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="50">
                            </div>
                            <div class="col-md-10">
                                <h6 class="scl-cd-name" style="font-size:{{ $card['name_size'] !=null ? $card['name_size'] :  0}}px"><strong> {{ siteConfig('name') }}</strong></h6>
                                <p class="scl-cd-add" style="font-size:{{ $card['address_size'] !=null ? $card['address_size']:0 }}px">{{ siteConfig('address') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6  id="idtitle" class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px"><strong>{{ $card['title'] }}</strong></h6>
                        <img src="{{asset('assets/img/students')}}/{{ $student->image }}" width="75" alt="" style="margin-bottom:10px;border: 2px solid #000;min-height: 75px;">
                        @isset($card['nickname'])
                            <h6 class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px"> {{ $student->name }} </h6>
                        @endisset

                        <table class="table" style="text-align:left;font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                            <tbody>
                            @isset($card['fullname'])
                                <tr>
                                    <td><strong> Name </strong></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong> {{ $student->name }} </strong></td>
                                </tr>
                            @endisset
                            @isset($card['fname'])
                                <tr>
                                    <td> Father </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->father }}</td>
                                </tr>
                            @endisset
                            @isset($card['mname'])
                                <tr>
                                    <td> Mother </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->mother }}</td>
                                </tr>
                            @endisset
                            @isset($card['class'])
                                <tr>
                                    <td> Class </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->classes->name ?? '' }}&nbsp;{{ $student->group->name ?? '' }}{{ $student->section->name ?? '' }}</td>
                                </tr>
                            @endisset
                            @isset($card['roll'])
                                <tr>
                                    <td> Roll </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->rank }}</td>
                                </tr>
                            @endisset
                            @isset($card['department'])
                                <tr>
                                    <td> Department </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->department }}</td>
                                </tr>
                            @endisset
                            @isset($card['admissiondate'])
                                <tr>
                                    <td> Admission </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->admission_date }}</td>
                                </tr>
                            @endisset
                            @isset($card['dob'])
                                <tr>
                                    <td> DOB </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->dob }}</td>
                                </tr>
                            @endisset
                            @isset($card['blood'])
                                <tr>
                                    <td> Blood Group </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->blood->name ?? '' }}</td>
                                </tr>
                            @endisset
                            @isset($card['contact'])
                                <tr>
                                    <td> Contact </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->mobile }}</td>
                                </tr>
                            @endisset
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer" style="float:right;background-color:white;border:none">
                        <div class="col-5" style="float: right;">
                            <img src="{{ asset('assets/img/signature/signature.png') }}" width="75" alt="">
                        </div>
                    </div>
                    <div class="card-footer text-muted" style="background-color:{{ $card['bgcolor'] }};font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                        <div class="row">
                            <div class="col">
                                <p class="card-title" style="color:{{ $card['bgfont']}};"> <strong>ID : {{ $student->studentId }}</strong> </p>
                            </div>
                            <div class="col">
                                <p id="idsignature" class="card-title" style="color:{{ $card['titlecolor'] }};"> <strong style="color:{{ $card['bgfont']}}">{{ $card['signature'] }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <p>&nbsp;</p>
    </div>
@endforeach


<div class="row" style="margin: 25px;">
    <div class="col-4" style="max-width:260px; max-height:375px">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <div class="back-top" style="font-size:15px">
                    <ul>
                        <li>This card is valid till {{ $card['validity'] }}</li>
                        <li>This card is not transferable</li>
                        <li>This finder of this card may please drop it to the nearest post office.</li>
                    </ul>
                </div>
                <div class="back-middle text-center">
                    <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="50">
                    <h6 class="scl-cd-name" style=""><strong> {{ siteConfig('name') }}</strong></h6>
                    <p class="scl-cd-add" style="font-size:15px">{{ siteConfig('address') }}</p>
                </div>
                <div class="back-bottom" style="font-size:15px">
                    <table class="table">
                        <tr>
                            <td>Phone</td>
                            <td style="padding: 0 5px">:</td>
                            <td>{{ $card['bPhone'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td style="padding: 0 5px">:</td>
                            <td>{{ $card['bemail'] }}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td style="padding: 0 5px">:</td>
                            <td>{{ $card['bWebsite'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
</div>

<div class="row">
    <div class="col-4">
        <table>
            <tr>
                <td>Background Color</td>
                <td>:</td>
                <td>{{ $card['bgcolor'] }}</td>
            </tr>
            <tr>
                <td>Background Font Color</td>
                <td>:</td>
                <td>{{ $card['bgfont'] }}</td>
            </tr>
            <tr>
                <td>Title Color</td>
                <td>:</td>
                <td>{{ $card['titlecolor'] }}</td>
            </tr>
        </table>
    </div>
</div>


</body>
</html>
