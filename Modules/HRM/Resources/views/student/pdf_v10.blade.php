<!doctype html>
<htm llang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <eta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>{{ __('WPIMS') }}</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                crossorigin="anonymous">

            <style>
                * {
                    font-family: Arial;
                }

                .table td {
                    padding: 0;
                    bordertop: none;
                }

                .card-body {
                    padding: 0 10px 10px 10px;
                }

                .card-footer {
                    padding: 0;
                }

                .col-2-5 {
                    flex: 00 20% !important;
                    max-width: 20% !important;
                }

                style.checkbox {
                    padding: 10px;
                    margin: 10px 0;
                }

                input.largerChecbox {
                    width: 20px;
                    height: 20px;
                    backgound-color: transparent;
                }

                .checkbox label {
                    position: absolute;
                    margin-left: 5px;
                    margin-top: -2px;
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
                
                .font {    
    width: 2.5in; 
    height: 3.9in;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 1px solid black;
    overflow: hidden;
    border-radius: 10px;
   }

   .back {
color: #080808;
   }

.bottom1{ 
    border-radius: 0 0 9px 9px;
    height: 84%;
    width: 2.488in;
    height: .47in;
    background-color: #f74;

}

.circle1{
    width: 450px;
    height: 550px;
    background-color: #f74;
    border-radius: 50%;
}


.circle2{
    width: 450px;
    height: 550px;
    background-color: white;
    border-radius: 50%;
    position: absolute;
    top: -396px;
    left: -4.5px;
    border: 14px solid #f0d8d8;

   }


.bg{
    position: absolute;
    top: 60px;
    left: -102px;
    border: 1px solid #f788;
}
            </style>

    </head>

    @foreach ($students->chunk(5) as $key => $chunk)
        <div class="row" style="{{ ($key + 1) % 4 == 0 ? 'page-break-after: always' : '' }}">
            @foreach ($chunk as $student)
                <div class="col-3 col-2-5">
                <div class="card" style="width: 2.5in;height: 3.9in;margin-left: 50px;border-radius: 10px;  ">
                                        <div class="font " >
                                           <div class="bg">
                                             <div class="circle1" style="background-color:{{ $card['bgcolor'] }}"></div>
                                             <div class="circle2"></div>
                                                  </div>
                                          <div class="" style=" height: 1.9in;">
                                                <div class="row ">
                                              <div class="col-md-3 ">
                                                    <img  src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"  alt="" style=" height: 63px;width: 64px;border-radius: 3px;position: absolute;top: 4px;left: 20px;">
                                                  
                                                  </div>
                                                  
                                                    <div class="col-md-9 ">
                                                      <div class="right text-center">
                                                            <div class="scl-cd-dec text-wrap text-bold ">
                                                                <h2 class="scl-cd-name" style=" position: relative;  top: 10px;  margin: 1px; text-align: center;  font-size: {{ $card['name_size'] != null ? $card['name_size'] : 0 }}px;  color:{{ $card['bgfont'] }};  font-weight: bold;  font-family: sans-serif;">
                                                                  {{ siteConfig('name') }}
                                                                </h2>
                                                            </div>
                                                      </div> 
                                                    </div>
                                                   
                                              </div>
                                                <img src="{{ asset('storage/uploads/students/') }}/{{ $student->student->image ?? '' }}" style="width: 98px;height: 95px;position: relative;left: 1px;top: 30px;" class="text-center rounded-circle mx-auto d-block border border-dark">
                                                                              
                                          </div>
                                         
                                            <div class="card-body text-center">
                                                <h1 class="card-title text-bold nName"
                                                    style="padding-top: 3px;position: relative;top: -14px;margin: 2px;text-align: center; font-size:{{ $card['title_size'] != null ? $card['title_size'] : 0 }}px ;color:{{ $card['titlecolor'] }}">
                                                    {{ $student->student->name ?? '' }}</h1>
                                                <div class="row">
                                                    <div class="right col-12" style="margin-top: 0px; ">
                                                      <div class="stu-cd-dec" style="text-align: left">
                                                      <table class="table" style="font-size: 12px;">
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
                                                                    <td>{{ $student->student->father->f_name ?? '' }}</td>
                                                                </tr>
                                                            @endisset
                                                            @isset($card['mname'])
                                                                <tr>
                                                                    <td> {{ __('Mother') }} </td>
                                                                    <td>&nbsp;:&nbsp;</td>
                                                                    <td>{{ $student->student->mother->m_name ?? '' }}</td>
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
                                              <img src="{{ asset('assets/img/signature/signature.png') }}"  alt="" style="    height: 34px; width: 86px; position: absolute; left: 154px; top: 320px;">
                                                <hr style="position: absolute;top: 333px;width: 91px;left: 143px;background-color: white;">
                                                <h5 style="    position: absolute; top: 350px; left: 162px; font-size: 16px;color: black; text-align: right;">{{ $card['signature'] }} </h5>
                                          </p>
                                           
                                        </div>
                                      </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class=" col-12" style="padding-top: 50px;">
    <div class="card back" style="width: 2.5in; height: 3.9in; margin-left: 33px; border-radius: 10px;   border: 1px solid black;">
                                            <div class="card-body text-center">
                                      
                                            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" 
                                                    width="60" style="  height: 65px;  width: 68px;  text-align: center;  margin: 10px;   border-radius: 6px;">

                        
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-back-dec text-bold"
                                                            style="text-align: left; margin-top: -16px;font-size: 12px">
                                                            <h2 style="    text-align: center;   position: relative;  top: 23px;   font-size: 20px;  font-weight: bold;">{{ __('If Found Please Return The Card To') }}</h2>
                                                      </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="" style="margin-top: 25px;">
                                                      <p style="margin-bottom: 7px;"><strong>{{ siteConfig('name') }} <br> </strong>
                                                        <p style=" margin-bottom: 5px;">{{ siteConfig('address') }}</p></p>
                                                    </div>
                           

                                                   <div class="crd-add-dec text-bold "style="    text-align: center;   position: relative; left: 58px;top: -6px;">                                         
                                                <table class="table" style="font-size: 12px;">
                                                  <tbody>
                                                   <tr>
                                                  <td> {{ __('Phone') }} </td>
                                                   <td>:</td>
                                                      <td id="bphone">{{ siteConfig('phone') }}
                                                   </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                       
                                                        <p class="bottom1"  style="background-color:{{ $card['bgcolor'] }};  text-align: center;position: absolute;left: -53px;top: 84px">

                                                        </p>
                                                

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    </div>

    </body>

    </html>
