
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon/114x114.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/favicon/96x96.png') }}">

    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">


    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons/css/themify-icons.css') }}">


    <!-- stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/print.css?ver:1.1') }}">
</head>
<body>
    <div class="text-center">
        <img src="{{ asset('assets/img/loader.gif') }}" alt="" id="loader" style="display: none;margin:0 auto !important;">
    </div>
    <section class="padding-y-20 border-bottom" style="color:black">
        <div class="row mb-2">
            <div class="col-12 text-center">
    
                <h3>Institution Name Here</h3>
                <h3>School Admission Form</h3>
            </div>

        </div>
        <div class="container" style="text-transform: uppercase">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <table class="table table-bordered table-personal">
                            <tr>
                                <td>Name</td>
                                <td>{{ $getData->name }}</td>
                                <td>Name Bangla</td>
                                <td>{{ $getData->name_bn }} </td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ $getData->dob }}</td>
                                <td>Gender</td>
                                <td>{{ $getData->gender->name }}</td>
                            </tr>
                       
                            <tr>
                                <td>Blood Group</td>
                                <td>{{ $getData->name }}</td>
                                <td>Birth Certificate</td>
                                <td>{{ $getData->birth_certificate }}</td>
                            </tr>
                            <tr>
                                <td>Student's ID</td>
                               <td>{{ $getData->id }}</td> 
                               <td>Religion</td>
                                <td>{{ $getData->religion_id ? $getData->religion->name : 'N/A'  }}</td>  
                            </tr>
       
                        </table>

                    <table class="table table-bordered table-personal">
                        <tr>
                            <td>Address</td>
                           <td>{{ $getData->address }}</td>
                            <td>Area / Town</td>
                           <td>{{ $getData->area }} </td>
                        </tr>
                        <tr>
                            <td>Post / Zip Code</td>
                            <td>{{ $getData->zip }} </td>
                            <td>City </td>
                            <td>{{ $getData->city->name }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $getData->country->name }}</td>
                            <td>Nationality</td>
                            <td>{{ $getData->nationality }}</td>
                        </tr>
                        <tr>
                            <td>Contact Mobile</td>
                           <td>{{ $getData->mobile }}</td>
                            <td>E-mail</td>
                           <td>{{ $getData->email ?  $getData->email : 'N/A'}} </td>
                        </tr>
                        <tr>
                            <td>Freedom Fighter</td>
                            <td>{{ $getData->freedom_fighter == 1 ? 'Yes' : 'No' }}</td>
                            <td>Disability </td>
                            <td>{{ $getData->disability == 1 ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <img src="{{ asset('assets/img/students/') }}/{{ $getData->image }}" class="img-thumbnail" width="180" height="220" alt="">
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-guardian">
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $getData->f_name }}</td>
                            <td>Father Name Bangla</td>
                            <td>{{ $getData->f_name_bn }}</td>
                        </tr>
                        <tr>
                            <td>Father Mobile </td>
                            <td>{{ $getData->f_mobile ? $getData->f_mobile : 'N\A' }}</td>
                            <td>Father Email </td>
                            <td>{{ $getData->f_email ? $getData->f_email : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Father Date of Birth</td>
                            <td>{{ $getData->f_dob ? $getData->f_dob : 'N\A' }}</td>
                            <td>Father Occupation</td>
                            <td>{{ $getData->f_occupation ? $getData->f_occupation : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Father NID</td>
                            <td>{{ $getData->f_nid ? $getData->f_nid : 'N\A' }}</td>
                            <td>Father Birth Certificate.</td>
                            <td>{{ $getData->f_birth_certificate ? $getData->f_birth_certificate : 'N\A' }}</td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-guardian mt-4">
                        <tr>
                            <td>Mother Name</td>
                            <td>{{ $getData->m_name ? $getData->m_name : 'N\A' }}</td>
                            <td>Mother Name Bangla</td>
                            <td>{{ $getData->m_name_bn ? $getData->m_name_bn : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Mother Mobile </td>
                            <td>{{ $getData->m_mobile ? $getData->m_mobile : 'N\A' }}</td>
                            <td>Mother Email </td>
                            <td>{{ $getData->m_email ? $getData->m_email : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Mother Date of Birth</td>
                            <td>{{ $getData->m_dob ? $getData->m_dob : 'N\A' }}</td>
                            <td>Mother Occupation</td>
                            <td>{{ $getData->m_occupation ? $getData->m_occupation : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Mother NID</td>
                            <td>{{ $getData->m_nid ? $getData->m_nid : 'N\A' }}</td>
                            <td>Mother Birth Certificate.</td>
                            <td>{{ $getData->m_birth_certificate ? $getData->m_birth_certificate : 'N\A' }}</td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-guardian mt-4">
                        <tr>
                            <td>Guardian Name</td>
                            <td>{{ $getData->g_name ? $getData->g_name : 'N\A' }}</td>
                            <td>Guardian Name Bangla</td>
                            <td>{{ $getData->g_name_bn ? $getData->g_name_bn : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Guardian Mobile </td>
                            <td>{{ $getData->g_mobile ? $getData->g_mobile : 'N\A' }}</td>
                            <td>Guardian Email </td>
                            <td>{{ $getData->g_email ? $getData->g_email : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Guardian Date of Birth</td>
                            <td>{{ $getData->g_dob ? $getData->g_dob : 'N\A' }}</td>
                            <td>Guardian Occupation</td>
                            <td>{{ $getData->g_occupation ? $getData->g_occupation : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td>Guardian NID</td>
                            <td>{{ $getData->g_nid ? $getData->g_nid : 'N\A' }}</td>
                            <td>Guardian Birth Certificate.</td>
                            <td>{{ $getData->g_birth_certificate ? $getData->g_birth_certificate : 'N\A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    
    
    </section>
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('assets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
{{--</div>--}}
</body>
</html>