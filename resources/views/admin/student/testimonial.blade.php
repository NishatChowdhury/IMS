@extends('layouts.fixed')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/testimonial.css') }}">
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet"> 
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@stop

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Testimonial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Design Student ID</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

   
    <!-- navbar  -->
    <div class="container-fluid ">
        <div class="back m-0 p-0 ">
            <div class="navbaar  mt-5">
                <div class="navv-logo col-3 ">
                    <img style="height: 80px; width: 80px;" class=" img d-block m-auto border img-fluid" src="{{ asset('assets/img/testimonial/p.jpeg') }}" alt="logo">
                </div>
                <div class="navv-heading col-9 mt-2">
                    <h1 class="mt-4 mb-0">Oxford Modern School & College</h1>
                </div>
            </div>
            <div class="m-0 p-0">
                <div class=" d-flex justify-content-center mt-1 ">
                    <h4 class="sectionn m-0">EIIN: 138418</h4>

                </div>
                <div  style="margin-bottom: 0px;" class="cam d-flex justify-content-center m-0">
                    <p class="m-0">Campus: 1 # Motierpool, Pathantuli Road, Doublemooring,Chittagong.</p>
                </div>
                <div style="margin-top: 0px;" class="mac d-flex justify-content-center m-0">
                    <p>Phone: 031-2518963 www.oxfordctg.com</p>

                </div>
            </div>

            <div class="SL d-flex justify-content-center mt-0">
                <div class="col-4 "> 
                <input type="text" id="name" class="form-control-inline " placeholder=" SL.  1310" />
                </div>
                <div class=" col-4 mt-1">
                    <b class="tes"> Testimonial</b>
                   </div>
                <div class="col-4 mt-2">
                     <label for="inputPassword4" class="form-label">Time:</label>
                     <label type="text" id="name" class="form-control-inline ">1:30 Pm </label>
                     </div>
            </div>

           
        
<!-- paragraph -->
            <div class=" para">
               
            <p  class="col-12  ">This is to certify that   :  <b class="p-2">Musharat Sultana Awfi </b>  Father :  <b class="p-2">Father Name </b>
             Mother:<b class="p-2"> Mother Name</b>  <br>
             of Vill: <b class="p-2"> Chittagong </b> P.O: <b class="p-2"> Chittagong </b> P.S: <b class="p-2"> Chittagong </b>
           
            District :<b class="p-2"> Chittagong </b>  <br>  Passed the JSC Examination in the Year :<b class="p-2"> 2022 </b>
            <br> 
            from this school under the Secondary & Higher Secondary Education Board , Chittagong , bearing
            <br> 
            Roll:<b class="p-2"> 1311</b>  Registration No:<b class="p-2"> 123456789 </b>Session :<b class="p-2"> 2021-2022 </b>
            <br> 
            and secured Grade : <b class="p-2"> A+ </b> and Grade Point Average(GPA) :<b class="p-2"> 5.00 </b>
            <br>
            His/Her date of birth is  :<b class="p-2"> 03/00/1997 </b>
            <br>
            While in School,he/she did not take in any activity subursive of the state or of discipline.
            <br>
            He/She bears a good moral character. I wish him/her every success in life.
     
            <div class="d-flex ">
            <div class="col-4">
            <p>Written By <br> <b> Mr. Abdur Rahim</b></p>
            </div> 
            <div class="col-4"></div>
            <div class="col-4">
            <p>Written By <br><b> Mr. Abdur Rahim</b></p>
            </div>   
             </div>
            </p>
            </div>



        </div>


    </div>
    <!-- navbar -->
        
    </section>
@stop


@section('style')
    <style>
        .scl-dec p{
            text-align: center;
            color: #0E0EFF;
            font-size: 24px;
            font-family: Great Vibes;
            font-weight: 700;
            margin-bottom: 0px;
        }
        .scl-dec h1,.scl-dec h3{
            color: #0E0EFF;
            text-align: center;
            font-family: Great Vibes;
            font-weight: 900;
        }
        .dec p{
            padding: 10px;
            font-family: Great Vibes;
            font-size: 24px;
            font-weight: bold;
            color: #0E0EFF;
            text-align: justify;
            margin-bottom: 0px;
        }
    </style>
@endsection