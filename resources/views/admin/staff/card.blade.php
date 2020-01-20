<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .card{
            padding: 7px 5px;
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        }
        .card-head{
            height: 45px;
            border-bottom: 1px solid rgba(0,0,0,.125);
            padding-bottom: 7px;
        }
        .scl-cd-dec{
            /*position: absolute;*/
            /*top: 2px;*/
            /*left: 20px;*/
        }
        .scl-cd-dec h6{
            margin: 0px !important;
            font-size: 10px;
        }
        .scl-cd-dec p{
            margin: 0px !important;
            font-size: 8px;
        }
        .card-body{
            text-align: center;
        }
        .card-body  h6{
            margin-top: 0px;
        }
        .card-body table{
            margin: 0px !important;
            padding: 0px !important;
        }
        .table{
            margin: 0px !important;
        }
        .table tbody tr td{
            margin: 0px !important;
            padding: 0px !important;
            font-size: 13px;
        }

    </style>
</head>
<body>
<section>
    <div>
        @foreach($staffs as $staff)
        <div class="card" style="width: 210px; height:325px; border: 1px solid red;">
            <div class="card-head" style="background-color:{{ $card->bgcolor }};color:{{ $card->bgfont }}">
                <div class="left" style="float: left; width: 20%;">
                    <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="100%" style="border-radius: 50%; width:40px; height: auto;">
                </div>
                <div class="right" style="float: left; margin-left: 8px; margin-top: 5px; width: 80%" >
                    <div class="scl-cd-dec">
                        <h6 class="scl-cd-name" style="font-size:{{ $card->name_size }}px"><strong> {{ siteConfig('name') }}</strong></h6>
                        <p class="scl-cd-add" style="font-size:{{ $card->address_size }}px">{{ siteConfig('address') }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6  id="idtitle" class="card-title" style="color:{{ $card->titlecolor }};font-size:{{ $card->title_size }}px">{{ $card->title }}</h6>
                <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="50">
                <h6 class="card-title" style="color:{{ $card->titlecolor }};font-size:{{ $card->title_size }}px"> {{ $staff->name }} </h6>
                <table class="table" style="font-size:{{ $card->body_size }}px">
                    <tbody>
                    <tr>
                        <td><strong> Name </strong></td>
                        <td>:</td>
                        <td><strong> {{ $staff->name }} </strong></td>
                    </tr>
                    <tr>
                        <td> Father/Husband </td>
                        <td>:</td>
                        <td>{{ $staff->father_husband }}</td>
                    </tr>
                    <tr>
                        <td> Designation </td>
                        <td>:</td>
                        <td>{{ $staff->title }}</td>
                    </tr>
                    <tr>
                        <td> Contact </td>
                        <td>:</td>
                        <td>{{ $staff->mobile }}</td>
                    </tr>
                    <tr>
                        <td> Blood Group </td>
                        <td>:</td>
                        <td>{{ $staff->blood->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body-footer" style="clear: both; margin-top: 15px; color:{{ $card->titlecolor }};font-size:{{ $card->title_size }}px">
                <div class="body-left" style="float: left">
                    <p class="card-title" style="text-align: left"> <strong>ID : 2020{{ $staff->code }}</strong> </p>
                </div>
                <div class="body-right" style="float: right">
                    <p id="idsignature" class="card-title" style="text-align: left; margin-right: 5px"> <strong style="border-top: 1px solid red;">{{ $card->signature }}</strong></p>
                </div>
            </div>
            <div class="card-footer" style="height: 20px;background-color:{{ $card->bgcolor }}"></div>
        </div>
        @endforeach
    </div>
</section>

</body>
</html>