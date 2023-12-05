@extends('hrm::layouts.master')

@section('content')
    <link href="https://db.onlinewebfonts.com/c/84ae358e627d67d90bd613fcedc20c10?family=Edwardian+Script+ITC"
        rel="stylesheet">
    <style>
        .underline {
            width: 100%;
            border-bottom: 1.5px dashed black;
            font-weight: bold;
            font-family: "Edwardian Script ITC";
            font-size: 35px;
            letter-spacing: 3px;

        }

        b.uppercase {
            text-transform: uppercase;
        }

        .underline1 {
            border-top: 1.5px dashed black;
            font-weight: bold;
            width: 70%;
        }

        @page {
            size: landscape;
        }
    </style>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Testimonial') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Student') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Testimonial') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- ---- -->
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid no_print" id="fo">
            <div class="row ">
                <div class="col-12 no_print">
                    <div class="card">
                        <!-- form start -->
                        <form method="GET" action="{{ route('student.testimonial') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">{{ __('Student ID') }}</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Enter student id" name="studentId"
                                                type="text" value="{{ Request()->get('studentId') }}">
                                        </div>
                                    </div>
                                    <div class="col" style="padding-top: 32px;">
                                        <div class="input-group">
                                            <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"> {{ __('Search') }}</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- store student testimonial record -->
        <div class="container-fluid no_print pt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="alert bg-info text-center">{{ __('Student Testimonial Received Record Store') }}</div>
                        <!-- form start -->
                        <form method="POST" action="{{ route('student.testimonialStore') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col d-none">
                                        <label for="">{{ __('Student ID') }}</label>
                                        <div class="input-group">
                                            <input class="form-control" name="student_id" type="text"
                                                value="{{ $student->id }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">{{ __('Student Name') }}</label>
                                        <div class="input-group">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $student->name ?? '' }}" required readonly>
                                        </div>
                                    </div>

                                    <div class="col" style="padding-top: 32px;">
                                        <div class="input-group">
                                            <button style="padding: 6px 20px;" type="submit"
                                                class="btn btn-primary">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12 col-sm-12 text-right no_print">
                <span class="btn btn-info" onclick="printDiv('content')"><i class="fa fa-print"></i>{{ __('Print') }}</span>
            </div>
        </div>

        <div id="content" class="row bg-white m-3" style="padding: 20px;line-height: 150%;">
            <div class="col-md-12 col-sm-12" style="padding-top: 95px"></div>

            <div class="col-md-12 col-sm-12">
                <p class="text-center" style="color: #0d95e8;font-size: 45px; font-weight: bold">{{ __('Testimonial') }}</p>
            </div><br><br>

            <div class="col-md-6 col-sm-6">
                <h4 class="text-left">{{ __('SL No.') }} <span> @php echo rand(1,1000)@endphp</span></h4>
            </div>
            <div class="col-md-6 col-sm-6">
                <h4 class="text-right float-right">{{ __('Date:') }} @php echo date('d-m-Y'); @endphp</h4>
            </div>

            <div class="col-md-12 col-sm-12" style="padding-top: 30px">
                <div class="row font-italic" style="font-size: 25px;">
                    <div class="col-md-4 col-sm-4">
                        <p>{{ __('This is to certify that') }}</p>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <p class="underline"> {{ $student->name ?? '' }} </p>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <p>{{ __('Father:') }} </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p class="underline"> {{ $student->father->f_name ?? '' }} </p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>{{ __('Mother:') }} </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p class="underline"> {{ $student->mother->m_name ?? '' }} </p>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <p>{{ __('Address:') }}</p>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <p class="underline"> {{ $student->address ?? '' }}
                            ,{{ $student->area ?? '' }},{{ $student->zip ?? '' }} </p>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <p>{{ __('District:') }}</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p class="underline"> {{ $student->city->name ?? '.' }} </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p>{{ __('Passed the') }} <b class="uppercase">{{ Request()->get('exam_type') ?? '.' }} </b> {{ __('Examination in
                            the year of') }}</p>
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <p class="underline">
                            {{ $student ? date('Y', strtotime($student->studentAcademic->sessions->end)) : '.' }} </p>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <p>{{ __('from this school under the Secondary & Higher Secondary Education Board,') }}</p>
                    </div>


                    @if (Request()->get('exam_type') == 'jsc')
                        <div class="col-md-4 col-sm-4">
                            <p>{{ __('Chattogram, bearing Roll:') }}</p>
                        </div>
                        <div class="col-md-1 col-sm-1">
                            <p class="underline"> {{ $student->jsc_roll ?? '.' }} </p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p>{{ __('Registration No.') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->jsc_reg_no ?? '.' }} </p>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <p>{{ __('Session') }}</p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p class="underline"> {{ $student->studentAcademic->sessions->year ?? '.' }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('and secured Grade') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->jsc_grade ?? '.' }} </p>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <p>{{ __('and Grade point Average (GPA) ') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->jsc_gpa ?? '.' }} </p>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('His/her date of birth is') }} </p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->dob ?? '.....' }} </p>
                        </div>
                    @elseif(Request()->get('exam_type') == 'ssc')
                        <div class="col-md-5 col-sm-5">
                            <p>{{ __('Chattogram, bearing Roll:') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->ssc_roll ?? '.' }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('Registration No.') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->ssc_reg_no ?? '.' }} </p>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <p>{{ __('Session') }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p class="underline"> {{ $student->studentAcademic->sessions->year ?? '.' }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('and secured Grade') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->ssc_grade ?? '.' }} </p>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <p>{{ __('and Grade point Average (GPA) ') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->ssc_gpa ?? '.' }} </p>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('His/her date of birth is ') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->dob ?? '.....' }} </p>
                        </div>
                    @elseif(Request()->get('exam_type') == 'hsc')
                        <div class="col-md-5 col-sm-5">
                            <p>{{ __('Chattogram, bearing Roll:') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->hsc_roll ?? '.' }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('Registration No.') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->hsc_reg_no ?? '.' }} </p>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <p>{{ __('Session') }}</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="underline"> {{ $student->studentAcademic->sessions->year ?? '.' }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('and secured Grade') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> {{ $student->hsc_grade ?? '.' }} </p>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <p>{{ __('and Grade point Average (GPA) ') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->hsc_gpa ?? '.' }} </p>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('His/her date of birth is ') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->dob ?? '.....' }} </p>
                        </div>
                    @else
                        <div class="col-md-5 col-sm-5">
                            <p>{{ __('Chattogram, bearing Roll:') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> . </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('Registration No.') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> . </p>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <p>{{ __('Session') }}</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="underline"> {{ $student->studentAcademic->sessions->year ?? '.' }} </p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('and secured Grade') }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="underline"> . </p>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <p>{{ __('and Grade point Average (GPA)') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> . </p>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <p>{{ __('His/her date of birth is ') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="underline"> {{ $student->dob ?? '.....' }} </p>
                        </div>
                    @endif

                    <div class="col-md-12 col-sm-12">
                        <p>{{ __('While in school, he/she did not take part in any activity subursive of the state or of
                            discipline.') }}</p>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <p>{{ __('He/she bears a good moral character. I wish him/her every success in life.') }}</p>
                    </div>

                    <div class="col-md-12 col-sm-12" style="padding-top: 70px"></div>
                    <div class="col-md-3 col-sm-3">
                        <p class="underline1">{{ __('Written By') }}</p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <p class="underline1 float-right">{{ __('Headmaster') }}</p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p class="float-right">{{ siteconfig('name') }}</p>
                    </div>

                </div>

            </div>
        </div>

        </div>

    </section>
@stop

@section('script')
    <script>
        <!-- print 
        -->
        function
        printDiv(divName)
        {
        var
        printContents
        =
        document.getElementById(divName).innerHTML;
        var
        originalContents
        =
        document.body.innerHTML;
        document.body.innerHTML
        =
        printContents;
        window.print();
        document.body.innerHTML
        =
        originalContents;
        }
    </script>
@endsection
