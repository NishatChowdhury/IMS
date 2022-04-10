
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/logos')); ?>/<?php echo e(siteConfig('logo')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon/114x114.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('assets/img/favicon/96x96.png')); ?>">

    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">


    <!-- Icon fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/themify-icons/css/themify-icons.css')); ?>">


    <!-- stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendors.bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/print.css?ver:1.1')); ?>">
</head>
<body>
    <div class="text-center">
        <img src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="" id="loader" style="display: none;margin:0 auto !important;">
    </div>
    <section class="padding-y-20 border-bottom" style="color:black">
        <div class="row mb-2">
            <div class="col-12 text-center">
                <h3><?php echo e(siteConfig('name')); ?></h3>
                <h4><?php echo e(__('Admission Form')); ?></h4>
            </div>

        </div>
        <div class="container" style="text-transform: uppercase">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <table class="table table-bordered table-personal">
                            <tr>
                                <td style="font-weight:bold">Name</td>
                                <td><?php echo e($getData->name); ?></td>
                                <td style="font-weight:bold">Name Bangla</td>
                                <td><?php echo e($getData->name_bn); ?> </td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold">Date of Birth</td>
                                <td><?php echo e($getData->dob); ?></td>
                                <td style="font-weight:bold">Gender</td>
                                <td><?php echo e($getData->gender->name); ?></td>
                            </tr>
                       
                            <tr>
                                <td style="font-weight:bold">Blood Group</td>
                                <td><?php echo e($getData->name); ?></td>
                                <td style="font-weight:bold">Birth Certificate</td>
                                <td><?php echo e($getData->birth_certificate); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold">Appliction ID</td>
                               <td><?php echo e($getData->id); ?></td> 
                               <td style="font-weight:bold">Religion</td>
                                <td><?php echo e($getData->religion_id ? $getData->religion->name : 'N/A'); ?></td>  
                            </tr>
       
                        </table>

                    <table class="table table-bordered table-personal">
                        <tr>
                            <td style="font-weight:bold">Address</td>
                           <td><?php echo e($getData->address); ?></td>
                            <td style="font-weight:bold">Area / Town</td>
                           <td><?php echo e($getData->area); ?> </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Post / Zip Code</td>
                            <td><?php echo e($getData->zip); ?> </td>
                            <td style="font-weight:bold">City </td>
                            <td><?php echo e($getData->city->name); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Country</td>
                            <td><?php echo e($getData->country->name); ?></td>
                            <td style="font-weight:bold">Nationality</td>
                            <td><?php echo e($getData->nationality); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Contact Mobile</td>
                           <td><?php echo e($getData->mobile); ?></td>
                            <td style="font-weight:bold">E-mail</td>
                           <td><?php echo e($getData->email ?  $getData->email : 'N/A'); ?> </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Freedom Fighter</td>
                            <td><?php echo e($getData->freedom_fighter == 1 ? 'Yes' : 'No'); ?></td>
                            <td style="font-weight:bold">Disability </td>
                            <td><?php echo e($getData->disability == 1 ? 'Yes' : 'No'); ?></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <img src="<?php echo e(asset('storage/uploads/students/')); ?>/<?php echo e($getData->image); ?>" class="img-thumbnail" width="180" height="220" alt="">
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-personal">
                                <tr>
                                    <td style="font-weight:bold">Class</td>
                                    <td><?php echo e($getData->class_id ? $getData->classes->name : 'N\A'); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Session</td>
                                    <td><?php echo e($getData->session_id ? $getData->sessions->year : 'N\A'); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Group</td>
                                    <td><?php echo e($getData->group_id ? $getData->group->name : 'N\A'); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Applied Date</td>
                                    <td><?php echo e($getData->created_at->format('Y-m-d')); ?></td>
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
                            <td style="font-weight:bold">Father Name</td>
                            <td><?php echo e($getData->f_name); ?></td>
                            <td style="font-weight:bold">Father Name Bangla</td>
                            <td><?php echo e($getData->f_name_bn); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Father Mobile </td>
                            <td><?php echo e($getData->f_mobile ? $getData->f_mobile : 'N\A'); ?></td>
                            <td style="font-weight:bold">Father Email </td>
                            <td><?php echo e($getData->f_email ? $getData->f_email : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Father Date of Birth</td>
                            <td><?php echo e($getData->f_dob ? $getData->f_dob : 'N\A'); ?></td>
                            <td style="font-weight:bold">Father Occupation</td>
                            <td><?php echo e($getData->f_occupation ? $getData->f_occupation : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Father NID</td>
                            <td><?php echo e($getData->f_nid ? $getData->f_nid : 'N\A'); ?></td>
                            <td style="font-weight:bold">Father Birth Certificate.</td>
                            <td><?php echo e($getData->f_birth_certificate ? $getData->f_birth_certificate : 'N\A'); ?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-guardian mt-4">
                        <tr>
                            <td style="font-weight:bold">Mother Name</td>
                            <td><?php echo e($getData->m_name ? $getData->m_name : 'N\A'); ?></td>
                            <td style="font-weight:bold">Mother Name Bangla</td>
                            <td><?php echo e($getData->m_name_bn ? $getData->m_name_bn : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Mother Mobile </td>
                            <td><?php echo e($getData->m_mobile ? $getData->m_mobile : 'N\A'); ?></td>
                            <td style="font-weight:bold">Mother Email </td>
                            <td><?php echo e($getData->m_email ? $getData->m_email : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Mother Date of Birth</td>
                            <td><?php echo e($getData->m_dob ? $getData->m_dob : 'N\A'); ?></td>
                            <td style="font-weight:bold">Mother Occupation</td>
                            <td><?php echo e($getData->m_occupation ? $getData->m_occupation : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Mother NID</td>
                            <td><?php echo e($getData->m_nid ? $getData->m_nid : 'N\A'); ?></td>
                            <td style="font-weight:bold">Mother Birth Certificate.</td>
                            <td><?php echo e($getData->m_birth_certificate ? $getData->m_birth_certificate : 'N\A'); ?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-guardian mt-4">
                        <tr>
                            <td style="font-weight:bold">Guardian Name</td>
                            <td><?php echo e($getData->g_name ? $getData->g_name : 'N\A'); ?></td>
                            <td style="font-weight:bold">Guardian Name Bangla</td>
                            <td><?php echo e($getData->g_name_bn ? $getData->g_name_bn : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Guardian Mobile </td>
                            <td><?php echo e($getData->g_mobile ? $getData->g_mobile : 'N\A'); ?></td>
                            <td style="font-weight:bold">Guardian Email </td>
                            <td><?php echo e($getData->g_email ? $getData->g_email : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Guardian Date of Birth</td>
                            <td><?php echo e($getData->g_dob ? $getData->g_dob : 'N\A'); ?></td>
                            <td style="font-weight:bold">Guardian Occupation</td>
                            <td><?php echo e($getData->g_occupation ? $getData->g_occupation : 'N\A'); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Guardian NID</td>
                            <td><?php echo e($getData->g_nid ? $getData->g_nid : 'N\A'); ?></td>
                            <td style="font-weight:bold">Guardian Birth Certificate.</td>
                            <td><?php echo e($getData->g_birth_certificate ? $getData->g_birth_certificate : 'N\A'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    
    
    </section>
    
    <script src="<?php echo e(asset('assets/js/vendors.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>

</body>
</html><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/admission-school/form-pdf.blade.php ENDPATH**/ ?>