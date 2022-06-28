
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Document')}}</title>
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
    <style>
        h1 i {
    font-size: 53px;
    font-weight: 800;
    color: #5a8f6f;
}
    </style>
</head>
<body>
    <div class="text-center">
        <img src="{{ asset('assets/img/loader.gif') }}" alt="" id="loader" style="display: none;margin:0 auto !important;">
    </div>
    <section class="padding-y-20 border-bottom" style="color:black">
        <div class="row mb-2">
            <div class="col-12 text-center">
                <h1>
                    <i>{{ siteConfig('name') }}</i>
                </h1>
                <h5>{{ __('Admission Form') }}</h5>
            </div>
            <hr>

        </div>
        <div class="container" style="text-transform: uppercase">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <table class="table table-bordered table-personal">
                            <tr>
                                <td style="font-weight:bold">{{ __('Name')}}</td>
                                <td style="text-transform: initial">{{ $getData->name }}</td>
                                <td style="font-weight:bold">{{ __('Name Bangla')}}</td>
                                <td style="text-transform: initial">{{ $getData->name_bn }} </td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold">{{ __('Date of Birth')}}</td>
                                <td style="text-transform: initial">{{ $getData->dob }}</td>
                                <td style="font-weight:bold">{{ __('Gender')}}</td>
                                <td style="text-transform: initial">{{ $getData->gender->name }}</td>
                            </tr>
                       
                            <tr>
                                <td style="font-weight:bold">{{ __('Blood Group')}}</td>
                                <td style="text-transform: initial">{{ $getData->name }}</td>
                                <td style="font-weight:bold">{{ __('Birth Certificate')}}</td>
                                <td style="text-transform: initial">{{ $getData->birth_certificate }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold">{{ __('Application ID')}}</td>
                               <td style="text-transform: initial">{{ $getData->id }}</td>
                               <td style="font-weight:bold">{{ __('Religion')}}</td>
                                <td style="text-transform: initial">{{ $getData->religion_id ? $getData->religion->name : 'N/A'  }}</td>
                            </tr>
       
                        </table>

                    <table class="table table-bordered table-personal">
                        <tr>
                            <td style="font-weight:bold">{{ __('Address')}}</td>
                           <td style="text-transform: initial">{{ $getData->address }}</td>
                            <td style="font-weight:bold">{{ __('Area / Town')}}</td>
                           <td style="text-transform: initial">{{ $getData->area }} </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Post / Zip Code')}}</td>
                            <td style="text-transform: initial">{{ $getData->zip }} </td>
                            <td style="font-weight:bold">{{ __('City')}} </td>
                            <td style="text-transform: initial">{{ $getData->city->name }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Country')}}</td>
                            <td style="text-transform: initial">{{ $getData->country->name }}</td>
                            <td style="font-weight:bold">{{ __('Nationality')}}</td>
                            <td style="text-transform: initial">{{ $getData->nationality }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Contact Mobile')}}</td>
                           <td style="text-transform: initial">{{ $getData->mobile }}</td>
                            <td style="font-weight:bold">{{ __('E-mail')}}</td>
                           <td style="text-transform: initial">{{ $getData->email ?  $getData->email : 'N/A'}} </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Freedom Fighter')}}</td>
                            <td style="text-transform: initial">{{ $getData->freedom_fighter == 1 ? 'Yes' : 'No' }}</td>
                            <td style="font-weight:bold">{{ __('Disability')}} </td>
                            <td style="text-transform: initial">{{ $getData->disability == 1 ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <img src="{{ asset('storage/uploads/students/') }}/{{ $getData->image }}" class="img-thumbnail" width="180" height="220" alt="">
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-personal">
                                <tr>
                                    <td style="font-weight:bold">{{ __('Class')}}</td>
                                    <td style="text-transform: initial">{{ $getData->class_id ? $getData->classes->name : 'N\A' }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">{{ __('Session')}}</td>
                                    <td style="text-transform: initial">{{ $getData->session_id ? $getData->sessions->year : 'N\A' }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">{{ __('Group')}}</td>
                                    <td style="text-transform: initial">{{ $getData->group_id ? $getData->group->name : 'N\A' }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">{{ __('Applied Date')}}</td>
                                    <td style="text-transform: initial">{{ $getData->created_at->format('Y-m-d') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-guardian">
                        <tr>
                            <td style="font-weight:bold">{{ __('Father Name')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_name }}</td>
                            <td style="font-weight:bold">{{ __('Father Name Bangla')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_name_bn }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Father Mobile')}} </td>
                            <td style="text-transform: initial">{{ $getData->f_mobile ? $getData->f_mobile : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Father Email ')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_email ? $getData->f_email : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Father Date of Birth')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_dob ? $getData->f_dob : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Father Occupation')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_occupation ? $getData->f_occupation : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Father NID')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_nid ? $getData->f_nid : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Father Birth Certificate.')}}</td>
                            <td style="text-transform: initial">{{ $getData->f_birth_certificate ? $getData->f_birth_certificate : 'N\A' }}</td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-guardian mt-4">
                        <tr>
                            <td style="font-weight:bold">{{ __('Mother Name')}}</td>
                            <td style="text-transform: initial">{{ $getData->m_name ? $getData->m_name : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Mother Name Bangla')}}</td>
                            <td style="text-transform: initial">{{ $getData->m_name_bn ? $getData->m_name_bn : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Mother Mobile')}} </td>
                            <td style="text-transform: initial">{{ $getData->m_mobile ? $getData->m_mobile : 'N\A' }}</td>
                            <td style="font-weight:bold">Mother Email </td>
                            <td style="text-transform: initial">{{ $getData->m_email ? $getData->m_email : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Mother Date of Birth')}}</td>
                            <td style="text-transform: initial">{{ $getData->m_dob ? $getData->m_dob : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Mother Occupation')}}</td>
                            <td style="text-transform: initial">{{ $getData->m_occupation ? $getData->m_occupation : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Mother NID')}}</td>
                            <td style="text-transform: initial">{{ $getData->m_nid ? $getData->m_nid : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Mother Birth Certificate.')}}</td>
                            <td style="text-transform: initial">{{ $getData->m_birth_certificate ? $getData->m_birth_certificate : 'N\A' }}</td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-guardian mt-4">
                        <tr>
                            <td style="font-weight:bold">{{ __('Guardian Name')}}</td>
                            <td style="text-transform: initial">{{ $getData->g_name ? $getData->g_name : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Guardian Name Bangla')}}</td>
                            <td style="text-transform: initial">{{ $getData->g_name_bn ? $getData->g_name_bn : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Guardian Mobile')}} </td>
                            <td style="text-transform: initial">{{ $getData->g_mobile ? $getData->g_mobile : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Guardian Email')}} </td>
                            <td style="text-transform: initial">{{ $getData->g_email ? $getData->g_email : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Guardian Date of Birth')}}</td>
                            <td style="text-transform: initial">{{ $getData->g_dob ? $getData->g_dob : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Guardian Occupation')}}</td>
                            <td style="text-transform: initial">{{ $getData->g_occupation ? $getData->g_occupation : 'N\A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">{{ __('Guardian NID')}}</td>
                            <td style="text-transform: initial">{{ $getData->g_nid ? $getData->g_nid : 'N\A' }}</td>
                            <td style="font-weight:bold">{{ __('Guardian Birth Certificate.')}}</td>
                            <td style="text-transform: initial">{{ $getData->g_birth_certificate ? $getData->g_birth_certificate : 'N\A' }}</td>
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