<!doctype html>
<htm llang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <eta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('WPIMS') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
         * {
            font-family: Arial;
        }
 
        .table td {
            padding: 0;
            bordertop: none;
        }

        .card-body{
            padding: 0 10px 10px 10px;
        }
 
        .card-footer {
            padding: 0;
        }

        .col-2-5 {
            flex: 00 20% !important;
            max-width: 20% !important;
        }
 
        <style>.checkbox {
            padding: 10px;
            margn: 10px 0;
        }

        input.largerChecbox {
            width: 20px;
            height: 20px;
            backgound-color: transparent;
        }

        .checkbox label {
            position: absolute;
            margin-left: 5px;
            margin-top:-2px;
        }

        .radio-inline inut {
            width: 15px;
            height: 15px;
            backgrond-color: transparent;
        }

        label span {
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }

        .table td,
        .table th {
            padding: 1px;
            vertical-alig: top;
            border-top: 0;
        }
 
        .card-body {
            padding: 5px 10px;
        }

        .scl-cd-dec h6 {
            margin-botto: 0px !important;
            font-size: 10px;
        }
 
        .scl-cd-dec p {
            font-size: 8px;
         }

        .card-header1 {
            border-botto: 1px solid #d8d8d8;
            padding: 9px 0px 9px 20px;
            background: #f7f7f7;
        }

        .checkbox {
            paddig: 10px;
            margin: 10px 0;
        }
 
        input.largerCheckbox {
            width: 20px;
            height:20px;
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

        .font {
    height: 375px;
    width: 225px;
    position: relative;
    border-radius: 10px;
    background-image: url("{{asset('assets/img/logos/BGFont7.png')}}");
    background-size: 240px 375px;
    background-repeat: no-repeat;
   }

   .back {
    height: 375px;
    width: 225px;
    position: relative;
    border-radius: 10px;
    background-image: url("{{asset('assets/img/logos/BGBack7.png')}}");
    background-size: 240px 375px;
    background-repeat: no-repeat;
   }
    </style>

</head>

@foreach ($students->chunk(5) as $key => $chunk)
    <div class="row" style="{{ ($key + 1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach ($chunk as $student)
            <div class="col-3 col-2-5">
            <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;  ">
                                        <div class="font" style="padding-bottom: 0px;  width: 2.5in;   height: 3.882in;">
                                            <div  style="height: 1.9in;">
                                                <div class="row">
                                                 
                                                    
                                                    <div class="col-md-9">
                                                        <div class="right text-center">
                                                            <div class="scl-cd-dec text-wrap text-bold ">
                                                                <h2 style="    position: relative;top: 9px; margin: 1px; text-align: center; font-size: 18px; color: #080808;; font-weight: bold; font-family: sans-serif;">
                                                                    Web Point Limited School School
                                                                </h2>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-3 ">
                                                    <img  src="{{asset('assets/img/logos/klr.png')}}"  alt="" style=" height: 82px;width: 87px;border-radius: 3px;position: absolute;top: 1px;left: -29px">
                                                  
                                                    </div>
                                                </div>
                                                <img src="{{asset('assets/img/logos/nam.jpg')}}" style="width: 98px;height: 95px;position: relative;left: 1px;top: 30px;" class="text-center rounded-circle mx-auto d-block border border-dark">
                                                                              
                                            </div>
                                         
                                            <div class="card-body text-center">

                                            <!-- <div  style=" text-align: center; margin-top: 13px; font-size: 18px; font-weight: bold;  color: white;  background-color: #3C3CB9;   height: 34px;  width: 2.487in; margin-left: -10px; padding: 2px;">
                                              <p class="p-0">Sukirti Chakma Poran</p>
                                                    </div> -->
                                                <h1 class="card-title text-bold nName"
                                                    style="padding-top: 3px;position: relative;top: -11px;margin: 2px;text-align: center; font-size:15px ;color:rgb(35, 12, 167)">
                                                    {{ __('Student Name') }}</h1>
                                                <div class="row">
                                                    <div class="right col-12" style="    margin-top: 0px; ">
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
                                                                    <tr class="tsname">
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
                                                                    <tr class="tgname">
                                                                        <td><b>{{ __('Group') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="tbname">
                                                                        <td><b>{{ __('Blood Group') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                    <!--   <tr class="tpname" style="display: block;">
                                                                        <td><b>{{ __('Contact') }}</b>
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>{{ __('Lorem ipsum.') }}
                                                                        </td>
                                                                    </tr>
                                                                  <tr class="tdname">
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
                                                <img src="{{asset('assets/img/logos/re.png')}}"  alt="" style="    height: 34px; width: 86px; position: absolute; left: 154px; top: 320px;">
                                                <hr style="position: absolute;top: 333px;width: 91px;left: 143px;background-color: white;">
                                                <h5 style="    position: absolute; top: 350px; left: 162px; font-size: 16px;color: black; text-align: right;">Signature </h5>
                                            </p>
                                           
                                        </div>
                                        </div>
            </div>
        @endforeach
    </div>
@endforeach

                       <div class=" col-12" style="padding-top: 50px;">
                                        <div class="card back" style="width: 2.5in; height: 3.9in; margin-left: 33px;">
                                            <div class="card-body text-center">
                                            <img src="{{asset('assets/img/logos/jalal.png')}}" 
                                                    width="60" style=" height: 74px;   width: 96px;  text-align: center;  margin: 10px;   border-radius: 6px;">

                        
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-back-dec text-bold"
                                                            style="text-align: left; margin-top: -16px;font-size: 12px">
                                                            <h2 style="    text-align: center;   position: relative;  top: 23px;   font-size: 20px;  font-weight: bold;">If Found Please Return The Card To</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="row">
                                                    <div class="" style="margin-top: 27px;">
                                                        <p style="margin-bottom: 7px;"><strong>{{ siteConfig('name') }} <br> </strong>
                                                        <p style=" margin-bottom: 5px;font-weight: 600;  font-size: 14px;">Hazi Abdul Mia Road(Chadni),
                                                             Shitaljharna R/A,  Jalalabad,&nbsp;<br>
                                                               Baizid Bostami, <br>
                                                                  Chattogram</p></p>
                                                    </div>
                                                    <div class="crd-add-dec text-bold"
                                                        style="    text-align: center;   position: relative; left: 58px;top: -6px;">
                                                        <table class="table" style="font-size: 12px; font-weight:bold">
                                                            <tbody>
                                                                <tr>
                                                                    <td>  {{ __('Phone') }} </td>
                                                                    <td>:</td>
                                                                    <td id="bphone">01892-962257 <br>
                                                                      01878-895646  </td>
                                                                </tr>
                                                                <!-- <tr>
                                                                    <td> {{ __('Email') }} </td>
                                                                    <td>:</td>
                                                                    <td id="bemail">{{ __('Example99@gmail.com.') }}</td>
                                                                </tr> -->
                                                                <!-- <tr>
                                                                    <td> {{ __('Website') }} </td>
                                                                    <td>:</td>
                                                                    <td id="bwebsite">{{ __('www.example99.org') }}</td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

</body>

</html>
