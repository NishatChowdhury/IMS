<!-- Brand Logo -->
<a href="<?php echo e(url('dashboard')); ?>" class="brand-link">
    <img src="<?php echo e(asset('dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo e(config('app.name')); ?></span>
</a>
<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?php echo e(asset('assets/img/logos')); ?>/<?php echo e(siteConfig('logo')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="<?php echo e(url('/')); ?>" class="d-block"><?php echo e(siteConfig('title')); ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview <?php echo e(isActive(['/','dashboard*'])); ?>">
                <a href="<?php echo e(action('Backend\DashboardController@index')); ?>" class="nav-link <?php echo e(isActive(['dashboard*','/'])); ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            
            
            
            
            
            
            
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('cms')): ?>
                <li class="nav-item has-treeview <?php echo e(isActive(['admin/admission*'])); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive(['admin/admission*'])); ?>">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            <?php echo e(__('Admission')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">






                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/admission/create')); ?>" class="nav-link <?php echo e(isActive('*/admission/create')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Create Admission')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/admission/applicant')); ?>" class="nav-link <?php echo e(isActive('admin/admission/applicant')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Applicants (School)')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\AdmissionController@browseMeritList')); ?>" class="nav-link <?php echo e(isActive('admin/admission/browse-merit-list')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Browse Merit List')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\AdmissionController@uploadMeritList')); ?>" class="nav-link <?php echo e(isActive('admin/admission/upload-merit-list')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Upload Merit List')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php echo e(isActive('attendance*')); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive('attendance*')); ?>">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Attendance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('attendance.dashboard')); ?>" class="nav-link <?php echo e(isActive('admin/attendance/dashboard')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Dashboard')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\LeaveManagementController@index')); ?>" class="nav-link <?php echo e(isActive('attendance/leaveManagement')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\LeavePurposeController@index')); ?>" class="nav-link <?php echo e(isActive('attendance/leavePurpose')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Purpose</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php echo e(isActive('attendance*')); ?>">
                            <a href="#" class="nav-link <?php echo e(isActive('attendance*')); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Setting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="<?php echo e(route('attendance.holiday')); ?>" class="nav-link <?php echo e(isActive('attendance/report')); ?>">
                                        <i class="far nav-icon"></i>
                                        <p>Holiday Settings</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="<?php echo e(action('Backend\ShiftController@index')); ?>" class="nav-link <?php echo e(isActive('attendance/setting')); ?>">
                                        <i class="far nav-icon"></i>
                                        <p>Attendance Setting</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="<?php echo e(action('Backend\WeeklyOffController@index')); ?>" class="nav-link <?php echo e(isActive('attendance/weeklyOff')); ?>">
                                        <i class="far nav-icon"></i>
                                        <p>Weekly Off</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        
                        
                        
                        
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('attendance.student')); ?>" class="nav-link <?php echo e(isActive('attendance/student')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('attendance.teacher')); ?>" class="nav-link <?php echo e(isActive('attendance/teacher')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teacher Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('attendance.report')); ?>" class="nav-link <?php echo e(isActive('attendance/report')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monthly Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('cms')): ?>
                
                <li class="nav-item has-treeview <?php echo e(isActive('admin/library*')); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive('admin/library*')); ?>">
                        
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Library Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\BookCategoryController@index')); ?>" class="nav-link <?php echo e(isActive('admin/library/bookCategory')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Book Category </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\BookController@add')); ?>" class="nav-link <?php echo e(isActive('admin/library/books/add')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Books </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\BookController@show')); ?>" class="nav-link <?php echo e(isActive('admin/library/books')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\BookController@returnBook')); ?>" class="nav-link <?php echo e(isActive('admin/library/return_books')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Return Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\BookController@report')); ?>" class="nav-link <?php echo e(isActive('admin/library/report')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
            <?php endif; ?>


            <li class="nav-item has-treeview <?php echo e(isActive('admin/student*')); ?>">
                <a href="#" class="nav-link <?php echo e(isActive('admin/student*')); ?>">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Student Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo e(action('Backend\StudentController@index')); ?>" class="nav-link <?php echo e(isActive('admin/students')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Students')); ?> </p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\StudentController@optional')); ?>" class="nav-link <?php echo e(isActive('student/optional')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Optional Subject </p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('student.testimonial')); ?>" class="nav-link <?php echo e(isActive('student/testimonial')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Testimonial</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\IdCardController@index')); ?>" class="nav-link <?php echo e(isActive('student/designStudentCard')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Design ID Card</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('student.promotion')); ?>" class="nav-link <?php echo e(isActive('student/promotion')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Promotion</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\StudentController@tod')); ?>" class="nav-link <?php echo e(isActive('admin/student/tod*')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tod List</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\StudentController@esif')); ?>" class="nav-link <?php echo e(isActive('admin/student/esif*')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>eSIF</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\StudentController@images')); ?>" class="nav-link <?php echo e(isActive('admin/student/images*')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Images</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?php echo e(isActive(['admin/institution*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['admin/institution*'])); ?>">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Institution Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo e(route('institution.academicyear')); ?>" class="nav-link <?php echo e(isActive('admin/institution/academicyear')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Sessions')); ?></p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('institution.classes')); ?>" class="nav-link <?php echo e(isActive('admin/institution/class')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Classes')); ?></p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('section.group')); ?>" class="nav-link <?php echo e(isActive('admin/institution/section-groups')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Sections & Groups')); ?></p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('institution.academicClasses')); ?>" class="nav-link <?php echo e(isActive('admin/institution/academic-class')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Academic Classes')); ?></p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('institution.subjects')); ?>" class="nav-link <?php echo e(isActive('institution/subjects')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subjects</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\InstitutionController@signature')); ?>" class="nav-link <?php echo e(isActive('institution/signature')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Signature</p>
                        </a>
                    </li>

                    
                    
                    
                    
                    
                    
                </ul>
            </li>

            
            
            
            
            
            
            
            
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('cms')): ?>
                <li class="nav-item has-treeview <?php echo e(isActive(['exam*'])); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive(['exam*'])); ?>">
                        <i class="nav-icon fas fa-diagnoses"></i>
                        <p>
                            Exam Mgmt
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="<?php echo e(route('exam.gradesystem')); ?>" class="nav-link <?php echo e(isActive('exam/gradesystem')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Grade System')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\ExamController@admitCard')); ?>" class="nav-link <?php echo e(isActive('exam/admit-card')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admit Card</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('exam.examination')); ?>" class="nav-link <?php echo e(isActive('exam/examination')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Examinations</p>
                            </a>
                        </li>
                        
                        
                        
                        
                        
                        
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('exam.examresult')); ?>" class="nav-link <?php echo e(isActive('exam/examresult')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exam Results</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('exam.setfinalresultrule')); ?>" class="nav-link <?php echo e(isActive('exam/setfinalresultrule')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generate Final Result</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('exam.getfinalresultrule')); ?>" class="nav-link <?php echo e(isActive('exam/getfinalresultrule')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Final Result</p>
                            </a>
                        </li>

                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('exam.tabulationSheet')); ?>" class="nav-link <?php echo e(isActive('exam/tabulationSheet')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabulation Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?php echo e(isActive(['admin/fee*'])); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive(['admin/fee*'])); ?>">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>
                            <?php echo e(__('Tuition Fee')); ?>

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="<?php echo e(route('fee-category.index')); ?>" class="nav-link <?php echo e(isActive('admin/fee-category/index')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Fee Category')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/fee/fee-setup')); ?>" class="nav-link <?php echo e(isActive('admin/fee/fee-setup')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Fee Setup')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/fee/fee-setup/view')); ?>" class="nav-link <?php echo e(isActive(['admin/fee/fee-setup/view','admin/fee/fee-setup/edit/*','admin/fee/fee-setup/fee-students/*','admin/fee/fee-setup/edit-by-student/*'])); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Fee View')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/fee/fee-collection')); ?>" class="nav-link <?php echo e(isActive(['admin/fee/fee-collection','admin/fee/fee-collection/view*'])); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Fee Collection')); ?></p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/fee/collections/report/generate')); ?>" class="nav-link <?php echo e(isActive('admin/fee/collections/report/generate')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Date Wise Report')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('report.academic_class')); ?>" class="nav-link <?php echo e(isActive('admin/fee/collections/report/academic_class')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Academic Class Report')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('transport.index')); ?>" class="nav-link <?php echo e(isActive('fee-category/transport')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transport Location</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('transport.student-list')); ?>" class="nav-link <?php echo e(isActive('fee-category/transport')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transport Fee Assign</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?php echo e(isActive(['fee-category*','admin/coa/*','admin/journal*','admin/ledger*','admin/profit-n-loss','admin/trial-balance*','admin/balance-sheet','admin/coa*'])); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive(['fee-category*','admin/coa/*','admin/journal*','admin/ledger*','admin/profit-n-loss','admin/trial-balance*','admin/balance-sheet','admin/coa*'])); ?>">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('student.fee')); ?>" class="nav-link <?php echo e(isActive('fee-category/student')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Fee Collection</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\ChartOfAccountController@index')); ?>" class="nav-link <?php echo e(isActive('admin/coa')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chart of Accounts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\JournalController@index')); ?>" class="nav-link <?php echo e(isActive('admin/journals')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Journal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\JournalController@classic')); ?>" class="nav-link <?php echo e(isActive('admin/journal/classic')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Journal Classic</p>
                            </a>
                        </li>





                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\AccountingController@ledger')); ?>" class="nav-link <?php echo e(isActive('admin/ledger')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ledger</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\AccountingController@trialBalance')); ?>" class="nav-link <?php echo e(isActive('admin/trial-balance')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trial Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\AccountingController@profitNLoss')); ?>" class="nav-link <?php echo e(isActive('admin/profit-n-loss')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profit & Loss</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(action('Backend\AccountingController@balanceSheet')); ?>" class="nav-link <?php echo e(isActive('admin/balance-sheet')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php echo e(isActive(['admin/communication*'])); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive(['admin/communication*'])); ?>">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Communication
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('communication.quick')); ?>" class="nav-link <?php echo e(isActive('admin/communication/quick')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Quick SMS')); ?></p>
                            </a>
                        </li>
                        
                        
                        
                        
                        
                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('communication.staff')); ?>" class="nav-link <?php echo e(isActive('communication/staff')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Staff SMS')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('communication.history')); ?>" class="nav-link <?php echo e(isActive('communication/history')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMS History</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(route('communication.apiSetting')); ?>" class="nav-link <?php echo e(isActive('communication/apiSetting')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> API Settings</p>
                            </a>
                        </li>
                        
                        
                        
                        
                        
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php echo e(isActive(['extra*'])); ?>">
                    <a href="#" class="nav-link <?php echo e(isActive(['extra*'])); ?>">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"  style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php echo e(isActive('extra/404')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profit and Loss </p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="#" class="nav-link <?php echo e(isActive('extra/500')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance Sheet</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="#" class="nav-link <?php echo e(isActive('extra/blank')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Annual Payments</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(action('Backend\ReportController@student_fee_report')); ?>" class="nav-link <?php echo e(isActive('extra/blank')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fee Collection</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="<?php echo e(action('Backend\ReportController@student_monthly_fee_report')); ?>" class="nav-link <?php echo e(isActive('extra/blank')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monthly Fee Report</p>
                            </a>
                        </li>
                        
                        
                        
                        
                        
                        
                    </ul>
                </li>
            <?php endif; ?>
            <li class="nav-item has-treeview <?php echo e(isActive(['admin/menus*','admin/pages*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['cms*'])); ?>">
                    <i class="fas fa-tasks"></i>
                    <p>
                        CMS
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\MenuController@index')); ?>" class="nav-link <?php echo e(isActive('admin/menus')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Site Menu</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\PageController@index')); ?>" class="nav-link <?php echo e(isActive('admin/pages')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Page Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?php echo e(isActive('attendance*')); ?>">
                        <a href="#" class="nav-link <?php echo e(isActive('attendance*')); ?>">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Frontend Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            <li class="nav-item">
                                <a href="<?php echo e(route('chairmanMessage.index')); ?>" class="nav-link <?php echo e(isActive('chairmanMessage')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Chairman Message </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('principalMessage.index')); ?>" class="nav-link <?php echo e(isActive('principalMessage')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Principle Message </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(action('Backend\SiteInformationController@index')); ?>" class="nav-link <?php echo e(isActive('siteinfo')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Site Basic Info </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('aboutInstitute.index')); ?>" class="nav-link <?php echo e(isActive('siteinfo')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>About Institute</p>
                                </a>
                            </li>
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="<?php echo e(action('Backend\FeatureController@index')); ?>" class="nav-link <?php echo e(isActive('pages')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Feature</p>
                                </a>
                            </li>
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="<?php echo e(action('Backend\SliderController@index')); ?>" class="nav-link <?php echo e(isActive('sliders')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li>
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="<?php echo e(action('Backend\LinkController@index')); ?>" class="nav-link <?php echo e(isActive('settings/links')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Important Links</p>
                                </a>
                            </li>
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="<?php echo e(action('Backend\SocialController@index')); ?>" class="nav-link <?php echo e(isActive('socials')); ?>">
                                    <i class="far nav-icon"></i>
                                    <p>Social Links</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?php echo e(isActive(['settings*','page*','site*','slider*','social*','calender*','theme','attendance'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['settings*','page*','site*','slider*','social*','theme'])); ?>">
                    <i class="fas fa-shapes"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('setting.email')); ?>" class="nav-link <?php echo e(isActive('setting/email')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>E-mail Settings</p>
                        </a>
                    </li>
                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\AcademicCalenderController@index')); ?>" class="nav-link <?php echo e(isActive('calender')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Academic Calender</p>
                        </a>
                    </li>
                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\ThemeController@index')); ?>" class="nav-link <?php echo e(isActive('themes')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Theme</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?php echo e(isActive(['staff*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['staff*'])); ?>">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        Staff Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="<?php echo e(route('staff.teacher')); ?>" class="nav-link <?php echo e(isActive('staff/teacher')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teacher</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('staff.addstaff')); ?>" class="nav-link <?php echo e(isActive('staff/staffadd')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Staff Add</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('staff.threshold')); ?>" class="nav-link <?php echo e(isActive('staff/threshold')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Threshold</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('staff.kpi')); ?>" class="nav-link <?php echo e(isActive('staff/kpi')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>kpi</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(route('staff.payslip')); ?>" class="nav-link <?php echo e(isActive('staff/payslip')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PaySlip</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\IdCardController@staff')); ?>" class="nav-link <?php echo e(isActive('staff/idCard')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Design ID Card</p>
                        </a>
                    </li>

                    
                    
                    
                    
                    
                    
                </ul>
            </li>
            <li class="nav-item has-treeview <?php echo e(isActive(['notice*','event*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['notice*','event*'])); ?>">
                    <i class="fas fa-bullhorn"></i>
                    <p>
                        Notice
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="<?php echo e(action('Backend\NoticeController@index')); ?>" class="nav-link <?php echo e(isActive('notices')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Management</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\NoticeCategoryController@index')); ?>" class="nav-link <?php echo e(isActive('notice/category')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Category</p>
                        </a>
                    </li>






                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\NoticeCategoryController@index')); ?>" class="nav-link <?php echo e(isActive(['notices'])); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>News</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\UpcomingEventController@index')); ?>" class="nav-link <?php echo e(isActive(['event*'])); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Upcoming Events</p>
                        </a>
                    </li>
                </ul>
            </li>

            
            <li class="nav-item has-treeview <?php echo e(isActive(['syllabus*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['syllabus*'])); ?>">
                    <i class="fas fa-book"></i>
                    <p>
                        Syllabus
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="<?php echo e(route('syllabus.index')); ?>" class="nav-link <?php echo e(isActive('syllabus/syllabus')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Syllabus Management</p>
                        </a>
                    </li>
                </ul>
            </li>

            

            <li class="nav-item has-treeview <?php echo e(isActive(['gallery*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['gallery*'])); ?>">
                    <i class="fas fa-camera-retro"></i>
                    <p>
                        Gallery
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="<?php echo e(action('Backend\GalleryController@index')); ?>" class="nav-link <?php echo e(isActive('gallery/image')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\GalleryCategoryController@index')); ?>" class="nav-link <?php echo e(isActive('gallery/category')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Category</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="<?php echo e(action('Backend\AlbumController@index')); ?>" class="nav-link <?php echo e(isActive('gallery/albums')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Album</p>
                        </a>
                    </li>






                    
                    
                    
                    
                    
                    
                </ul>
            </li>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('cms')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>SC Invoices</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Activities</p>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item has-treeview <?php echo e(isActive(['user*'])); ?>">
                <a href="#" class="nav-link <?php echo e(isActive(['user*'])); ?>">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="<?php echo e(action('Backend\UserController@index')); ?>" class="nav-link <?php echo e(isActive('gallery/image')); ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            <li class="nav-item">
                <a href="<?php echo e(route('admin.backup')); ?>" class="nav-link">
                    <i class="nav-icon fas fa-life-ring"></i>

                    <p><?php echo e(__('Database Backup')); ?></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-life-ring"></i>

                    <p>Need Helps?</p>
                </a>
            </li>


            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/includes/left-sidebar.blade.php ENDPATH**/ ?>