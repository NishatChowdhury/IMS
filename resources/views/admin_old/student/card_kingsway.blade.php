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

.wrapperrr{
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

@foreach ($students->chunk(5) as $key => $chunk)
    <div class="row" style="{{ ($key + 1) % 4 == 0 ? 'page-break-after: always' : '' }}">
        @foreach ($chunk as $student)
            <div class="col-3 col-2-5">
            <div class="card" style="width: 3.9in; height: 2.5in; margin-left: 50px;      background-color: #191970;">
                                        <div style="border: 1px solid  white; margin: 10px;     padding: 0;  box-sizing: border-box;height: 223px;">
                                            <div class=" " style="">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                    <div class="nat">
                                                      <!-- <img src="image/bg2.JPG" alt="" style="height: 70px; width: 280px; border-radius: 3px;"> -->
                                                            <h2> KINGS'&nbsp; WAY&nbsp; SCHOOL</h2>
                                                               <h3> “BHABANA”, SOUTH MUNSI PUKUR PAAR, CTG</h3>
                                                                       </div>
                                                    </div>
                                                    
                                            
                                                </div>
                                            </div>
                                            <div class="card-body text-center bg-white" style=" position: relative ;  padding: 5px 10px;   height: 1.43in;   margin: 3px;">

                                                <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" style="width:70px ; height:70px ;    width: 70px;   position: absolute; left: 265px;" class="text-center rounded mx-auto d-block border border-dark">
                                                <h1 class=" text-bold  "
                                                    style="position: relative;top: -2px;margin: 2px;text-align: center; font-size:15px ;    -webkit-text-stroke-width: 0.4px; -webkit-text-stroke-color: rgb(20, 19, 19);  color: red;">
                                                  IDENTITY CARD</h1>
                                                    <h1 class=" text-bold "
                                                    style="position: relative;top: -2px;margin: 2px;text-align: center; font-size:15px ;    color: rgb(12 96 74);">
                                                    Class-Play</h1>
                                                    <h1 class=" text-bold "
                                                    style="position: relative;top: -2px;margin: 2px;text-align: center; font-size:15px ;    color: rgb(12 96 74);">
                                                    KWS/2020/007/07</h1>
                                                    <!-- <h6 class="card-title text-bold nName"> {{ __('Student Name') }} </h6> -->

                                                  
                                                <div class="row bg-image"  >
                                                    <div class="right col-12" style="float:left; margin-top: -3px;">
                                                        <div class="stu-cd-dec" style="text-align: left">
                                                        <table class="table" style="font-size: 12px;">
                                                                <tbody>
                                                                    <tr class="tname" style="display: block;">
                                                                        <td><strong> Name </strong></td>
                                                                        <td>:</td>
                                                                        <td><strong> Student Name </strong></td>
                                                                    </tr>
                                                                    <tr class="tfname" style="display: block;">
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
                                                                    </tr>
                                                                    <!-- <tr class="tcname">
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
                                                                    <tr class="trname">
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
                                                                    <tr class="tpname">
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

                                                <div>

                                            <img src="sin.png" alt="" class="img1" style="    height: 30px;  width: 50px;         position: absolute;   top: 92px; left: 275px;">

                                                </div>
                                            </div>

                                            <div class="logoo " >
                                            <!-- <img src="{{asset('assets/img/logos/klr.png')}}" width="100%" style="border-radius: 50%;"> -->
                                               <img src="{{asset('assets/img/logos/klr.png')}}" style="height: 120%; Width:130%" >

                                        </div>

                                            <div class="wrapperr">
                                    <div style="text-align: left; margin-top: 3px; margin-left:5px">Cell : 01837215075</div>
                                    <div> <img src="klr.png" alt="" style="    height: 17px;  width: 50px;  border-radius: 50%;   "></div>
                                    <div style=" margin-top: 3px;">Head Mistress</div>
                
              </div>  
             </div>
           </div>
            </div>
        @endforeach
    </div>
@endforeach

<div class="col-12" style="padding-top: 50px;">
                                    <div class="card"
                                        style="    height: 2.5in; width: 3.9in;       margin-left: 35px; background-color: #191970;   color: white; ">
                                        <div class="card-body text-center"
                                            style="border: 1px solid white;   margin: 5px 5px -25px 5px;">
                                            <div class="row text-left  "
                                                style="text-align: left!important; margin-left: -0.6rem;  margin-right: -0.6rem;  border-bottom: 1px solid white;">
                                                <div class="col-md-3 ">
                                                    <img src="{{asset('assets/img/logos/klr.png')}}" 
                                                        style="    width: 60px;  height: 40px;">
                                                </div>
                                                <div class="col-md-9">
                                                    <h3>INSTRUCTION</h3>
                                                </div>
                                            </div>
                                            <div class="crd-add-dec text-bold "
                                                style="margin: 1px; height: 1.43in;   text-align: center ;   color: black;   background-color: white; padding-left:5px ;font-size: 15px;   font-weight: bold;    margin-left: -5px;  margin-right: -5px;" >

                                                <p
                                                    style=" text-align: left;  font-size: 15px;    margin-top: 0;  margin-bottom: 0; padding-left:5px">
                                                    1. Useable only for education purpose</p>
                                                <p
                                                    style=" text-align: left;font-size: 15px;    margin-top: 0;  margin-bottom: 0;padding-left:5px">
                                                    2. This card is valid upto 31/12/2023 </p>
                                                <table class="table" style="font-size: 12px; margin-top:3px">
                                                    <tbody>
                                                        <tr>
                                                            <td> </td>
                                                            <td></td>
                                                            <td>
                                                                <p  style="    margin: -3px; margin-left:10px; text-align: left;  font-size: 16px;">
                                                                    IF Found Please Return To</p>
                                                                <p style="   margin:0px; margin-left: 40px;  text-align: left;  font-size: 16px;">
                                                                    Kings' Way School</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Address</td>
                                                            <td>:</td>
                                                            <td id="baddress">“BHABANA”, South Munshi Pukur Paar, Mukbul
                                                                Sawdagor Lane, Kapasgola, Chittagong</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="wrapperrr">
                                            <div> <img src="{{asset('assets/img/logos/klr.png')}}"  alt=""
                                                    style="height: 37px;  width: 50px;  border-radius: 50%;   "></div>
                                          

                                        </div>
                                    </div>
                                </div>

</body>

</html>
