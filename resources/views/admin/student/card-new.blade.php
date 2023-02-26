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
        .col-2-5{
            flex: 0 0 20% !important;
            max-width: 20% !important;
        }

        <style>
        .checkbox {
            padding: 10px;
            margin: 10px 0;
        }
        input.largerCheckbox {
            width: 20px;
            height: 20px;
            background-color: transparent;
        }
        .checkbox label{
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }
        .radio-inline input{
            width: 15px;
            height: 15px;
            background-color: transparent;
        }
        label span{
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }
        .table td, .table th {
            padding: 1px;
            vertical-align: top;
            border-top: 0;
        }
        .card-body{
            padding: 5px 10px;
        }
        .scl-cd-dec h6{
            margin-bottom: 0px !important;
            font-size: 10px;
        }
        .scl-cd-dec p{
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
    background-color: rgb(25, 134, 223);
    font-size: 10px;
  color: #fff;


}

.item2 {
    grid-column: 3/ span 3;
    border-radius: 0px 0px 5px 0px;
    background-color: red;
    font-size: 13px;

}

.item2 span{
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
<!-- <body>
@foreach($students->chunk(5) as $key => $chunk)
    <div class="row" style="{{ ($key+1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach($chunk as $student)
            <div class="col-3 col-2-5" {{--style="max-width:260px; max-height:375px"--}}>
                <div class="card text-center" style="width: 2.17in;height:3.42in">
                    <div class="card-header" style="padding:10px 0 0 10px;background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">
                        <div class="row">
                            <div class="col-md-2">
                                <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="30">
                            </div>
                            <div class="col-md-10">
                                <h6 class="scl-cd-name" style="font-size:{{ $card['name_size'] !=null ? $card['name_size'] :  0}}px;margin-bottom: 0;"><strong> {{ siteConfig('name') }}</strong></h6>
                            </div>
                        </div>
                        <div>
                            <p class="scl-cd-add" style="font-size:{{ $card['address_size'] !=null ? $card['address_size']:0 }}px;margin-bottom: 0;">{{ siteConfig('address') }}</p>

                        </div>
                    </div>
                    <div class="card-body">
                        <h6  id="idtitle" class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px;margin-bottom: 0"><strong>{{ $card['title'] }}</strong></h6>
                        <img src="{{ asset('storage/uploads/students/') }}/{{ $student->student->image }}" width="70" alt="" style="border: 2px solid #000;min-height: 70px;max-height: 90px">
                        @isset($card['nickname'])
                            <h6 class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px"> {{ $student->student->name }} </h6>
                        @endisset

                        <table class="table" style="text-align:left;font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                            <tbody>
                            @isset($card['fullname'])
                                <tr>
                                    <td><strong> Name </strong></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong> {{ $student->student->name }} </strong></td>
                                </tr>
                            @endisset
                            @isset($card['fname'])
                                <tr>
                                    <td> Father </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->father->f_name }}</td>
                                </tr>
                            @endisset
                            @isset($card['mname'])
                                <tr>
                                    <td> Mother </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->mother->m_name }}</td>
                                </tr>
                            @endisset
                            @isset($card['class'])
                                <tr>
                                    <td> Class </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>
                                        {{ $student->classes->name ?? '' }}&nbsp;
                                        @if($card['group'])
                                            {{ $student->group->name ?? '' }}&nbsp;
                                        @endif
                                        @if($card['section'])
                                            {{ $student->section->name ?? '' }}
                                        @endif
                                    </td>
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
                                    <td>{{ $student->student->dob }}</td>
                                </tr>
                            @endisset
                            @isset($card['blood'])
                                <tr>
                                    <td> Blood Group </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->blood->name ?? '' }}</td>
                                </tr>
                            @endisset
                            @isset($card['contact'])
                                <tr>
                                    <td> Contact </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->mobile }}</td>
                                </tr>
                            @endisset
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
                                <p class="card-title" style="color:{{ $card['bgfont']}};"> <strong>ID : {{ $student->student->studentId }}</strong> </p>
                            </div>
                            <div class="col">
                                <p id="idsignature" class="card-title" style="color:{{ $card['titlecolor'] }};"> <strong style="color:{{ $card['bgfont']}}">{{ $card['signature'] }}</strong></p>
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
                    <ul style="padding-left: 15px;padding-top:15px">
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
                <div class="back-bottom" style="font-size:12px">
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
</div> -->

@foreach($students->chunk(5) as $key => $chunk)
    <div class="row" style="{{ ($key+1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach($chunk as $student)
            <div class="col-3 col-2-5" {{--style="max-width:260px; max-height:375px"--}}>
                <div class="card text-center" style="width: 2.17in;height:3.92in">
                    <div class="card-header bg-white border-0" style="padding:10px 0 0 10px;background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">
                
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="left ">
                                                            <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" style="width:.6in ; height:.6in" class="text-center rounded-circle mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="right text-center" >
                                                            <div class="scl-cd-dec text-wrap text-bold" >
                                                            <h2 style="padding-top: 3px;    position: relative;top: 4px;margin: 2px;text-align: center; font-size:12px ;color:green">KARNAPHULI ABDUL JALAL CHOWDHURY COLLEGE</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                          
             
                    </div>
                    <div class="card-body">
                    <figure class="figure ">
                    <figcaption class="figure-caption text-center border border-dark p-0" style="height: 18px;position: relative;left: 24px;position: relative;background-color: green;color: white; width: 70px;">ID Card</figcaption>
                    <img src="http://127.0.0.1:8000/storage/uploads/students/" width="70" alt="" style="border: 2px solid #000;min-height: 70px;max-height: 90px" class="text-center  mx-auto d-block ">
                    <h2 style="padding-top: 2px;    position: relative;top: 2px;margin: 2px;text-align: center; font-size:15px ;color:black">Md. Hosen Zisad</h2>
                    </figure>       
                       
                      
                             <table class="table" style="text-align:left;font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                            <tbody>
                            @isset($card['fullname'])
                                <tr>
                                    <td><strong> Name </strong></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong> {{ $student->student->name }} </strong></td>
                                </tr>
                            @endisset
                            @isset($card['fname'])
                                <tr>
                                    <td> Father </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->father->f_name }}</td>
                                </tr>
                            @endisset
                            @isset($card['mname'])
                                <tr>
                                    <td> Mother </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->mother->m_name }}</td>
                                </tr>
                            @endisset
                            @isset($card['class'])
                                <tr>
                                    <td> Class </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>
                                        {{ $student->classes->name ?? '' }}&nbsp;
                                        @if($card['group'])
                                            {{ $student->group->name ?? '' }}&nbsp;
                                        @endif
                                        @if($card['section'])
                                            {{ $student->section->name ?? '' }}
                                        @endif
                                    </td>
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
                                    <td>{{ $student->student->dob }}</td>
                                </tr>
                            @endisset
                            @isset($card['blood'])
                                <tr>
                                    <td> Blood Group </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->blood->name ?? '' }}</td>
                                </tr>
                            @endisset
                            @isset($card['contact'])
                                <tr>
                                    <td> Contact </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $student->student->mobile }}</td>
                                </tr>
                            @endisset
                            </tbody>
                        </table>

                    </div>
                    <!-- <div class="card-footer" style="float:right;background-color:transparent;border:none">
                     
                    <div class="col-4 ml-4" style="float: right; padding-right:2px">
                            <img src="{{ asset('assets/img/signature/signature.png') }}" width="40" alt="">
                        </div>
                    
                    </div> -->


                    <div class="card-footer row" style="float:right;background-color:transparent;border:none">
                     <div class="col text-center ml-3" style="float:right; padding-right:2px">
                           <h6 class="text-center  " style=" font-size:9px;margin-top: 12px;">Validity:13 june, 2023</h6>
        
                        </div>
                    <div class="col" style="float:right; padding-right:3px ;padding-top:2px">
                            <img src="http://127.0.0.1:8000/assets/img/signature/signature.png" width="35" alt="">
                        </div>
                    
                    </div>
                    <div class="card-footer text-muted" style="background-color:{{ $card['bgcolor'] }};font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                      
                        <div class=" grid-container">
                                                <div class="item1">Shikalbaha, Budpura, Karnaphuli, Chattogram - 4317</div>
                                                  <div class="item2"> <span>signature</span>
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
                    <ul style="padding-left: 15px;padding-top:15px">
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
                <div class="back-bottom" style="font-size:12px">
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

<!-- <div class="row">
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
</div> -->

</body>
</html>
