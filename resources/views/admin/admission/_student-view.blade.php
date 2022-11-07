{{ Form::hidden('ssc_roll',$student['ssc_roll']) }}

<div class="text-center">
    <img src="{{ asset('assets/img/loader.gif') }}" alt="" id="loader" style="display: none;margin:0 auto !important;">
</div>

<section class="padding-y-20 border-bottom" style="color:black">
    <div class="row">
        <div class="col-9 text-center">
            <img src="{{ asset('assets/img/logos/'.siteConfig('logo')) }}" height="100" alt="{{ siteConfig('name') }}"
                 class="">
            <h2>{{ siteConfig('name') }}</h2>
            <address>
                {{ siteConfig('address') }}<br>
                Phone: {{ siteConfig('phone') }} Email: {{ siteConfig('email') }}<br>
                Website: {{ url('/') }}
            </address>
            <h3>{{{ __('HSC Admission Form (Session 2021-2022)')}}}</h3>
        </div>
        <div class="col-2">
            <table class="table-bordered" style="font-size: 14px;position: absolute;bottom: 50px;margin-left:25px">
                <tr>
                    <td colspan="2">{{ __('Only for office use')}}</td>
                </tr>
                <tr>
                    <td>{{ __('Class Roll')}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ __('Group')}}</td>
                    <td>{{ \App\Models\Backend\Group::query()->findOrNew($student['group_id'])->name }}</td>
                </tr>
                <tr>
                    <td>{{ __('Session')}}</td>
                    <td>{{ \App\Models\Backend\Session::query()->findOrNew($student['session_id'])->year }}</td>
                </tr>
                <tr>
                    <td>{{ __('SSC GPA')}}</td>
                    <td>{{ $student['ssc_gpa'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('SSC Roll')}}</td>
                    <td>{{ $student['ssc_roll'] }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container" style="text-transform: uppercase">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <table class="table table-bordered table-personal">
                        <tr>
                            <td>{{ __('Student\'s ID')}}</td>
                            <td>{{ $student['studentId'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Of Admission')}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ __('Name')}}</td>
                            <td>{{ $student['name'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Father\'s Name')}}</td>
                            <td>{{ $student['father'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Mother\'s Name')}}</td>
                            <td>{{ $student['mother'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date of Birth')}}</td>
                            <td>{{ $student['dob'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gender')}}</td>
                            <td>{{ \App\Models\Frontend\Gender::query()->findOrNew($student['gender_id'])->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Blood Group')}}</td>
                            <td>{{ \App\Models\Frontend\BloodGroup::query()->findOrNew($student['blood_group_id'])->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <img src="{{ asset('storage/uploads/students') }}/{{ $student->image }}" class="img-thumbnail"
                             width="180" height="220" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-guardian">
                    <tr>
                        <td colspan="2">{{ __('Birth Registration Certificate Number')}}</td>
                        <td colspan="2">{{ $student['brcn'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('NID No.')}}</td>
                        <td>{{ $student['nid'] }}</td>
                        <td>{{ __('Religion')}}</td>
                        <td>{{ \App\Models\Backend\Religion::query()->findOrNew($student['religion_id'])->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Nationality')}}</td>
                        <td>{{ __('Bangladeshi')}}</td>
                        <td>{{ __('Version')}}</td>
                        <td>{{ __('Bangla')}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Guardian\'s Name')}}</td>
                        <td>{{ $student['guardian_name'] }}</td>
                        <td>{{ __('Guardian\'s Profession')}}</td>
                        <td>{{ $student['father_occupation'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Relation with Guardian')}}</td>
                        <td>{{ $student['relation_with_guardian'] }}</td>
                        <td>{{ __('Guardian\'s Annual Income')}}</td>
                        <td>{{ $student['yearly_income'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Total Family Members')}}</td>
                        <td>{{ $student['total_member'] }}</td>
                        <td>{{ __('Guardian\'s NID no.')}}</td>
                        <td>{{ $student['guardian_nid'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Marital Status')}}</td>
                        <td>{{ $student['marital_status'] }}</td>
                        <td>{{ __('Preferred Group')}}</td>
                        <td>{{ $student['preferred_group'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Class')}}</td>
                        <td>{{ \App\Models\Backend\Classes::query()->findOrNew($student['class_id'])->name }}</td>
                        <td>{{ __('Session')}}</td>
                        <td>{{ \App\Models\Backend\Session::query()->findOrNew($student['session_id'])->year }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Student\'s Mobile')}}</td>
                        <td>{{ $student['mobile'] }}</td>
                        <td>{{ __('Guardian\'s Mobile')}}</td>
                        <td>{{ $student['guardian_mobile'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h5>{{ __('SSC Information')}}</h5>
            </div>
        </div>
        <div class="row" style="page-break-after: always">
            <table class="table table-bordered table-ssc">
                <tr>
                    <td>{{ __('Board')}}</td>
                    <td>{{ $student['ssc_board'] }}</td>
                    <td>{{ __('Passing Year')}}</td>
                    <td>{{ $student['ssc_year'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('SSC Roll No')}}:</td>
                    <td>{{ $student['ssc_roll'] }}</td>
                    <td>{{ __('GPA')}}</td>
                    <td>{{ $student['ssc_gpa'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('SSC Registration No')}}:</td>
                    <td>{{ $student['ssc_registration'] }}</td>
                    <td>{{ __('SSC Group')}}</td>
                    <td>{{ $student['ssc_group'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('SSC Session')}}</td>
                    <td>{{ $student['ssc_session'] }}</td>
                    <td>{{ __('SSC School Name')}}</td>
                    <td>{{ $student['ssc_school'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Student Type')}}</td>
                    <td>{{ $student['student_type'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="row">
            <table class="table table-bordered table-address">
                <tr>
                    <td colspan="2">{{ __('Student's Present Address')}}</td>
                    <td colspan="2">{{ __('Student's Permanent Address')}}</td>
                </tr>
                <tr>
                    <td>{{ __('House Number')}}</td>
                    <td>{{ $student['pre_house_number'] }}</td>
                    <td>{{ __('House Number')}}</td>
                    <td>{{ $student['per_house_number'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Village/Area')}}</td>
                    <td>{{ $student['pre_village'] }}</td>
                    <td>{{ __('Village/Area')}}</td>
                    <td>{{ $student['per_village'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Road/Block/Ward')}}</td>
                    <td>{{ $student['pre_road'] }}</td>
                    <td>{{ __('Road/Block/Ward')}}</td>
                    <td>{{ $student['per_road'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Post Office')}}</td>
                    <td>{{ $student['pre_post_office'] }}</td>
                    <td>{{ __('Post Office')}}</td>
                    <td>{{ $student['per_post_office'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Post Code')}}</td>
                    <td>{{ $student['pre_post_code'] }}</td>
                    <td>{{ __('Post Code')}}</td>
                    <td>{{ $student['per_post_code'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Upzilla/Thana')}}</td>
                    <td>{{ $student['pre_thana'] }}</td>
                    <td>{{ __('Upzilla/Thana')}}</td>
                    <td>{{ $student['per_thana'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('District')}}</td>
                    <td>{{ $student['pre_district'] }}</td>
                    <td>{{ __('District')}}</td>
                    <td>{{ $student['per_district'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Co-curricular Activities')}}</td>
                    <td>{{ $student['cocurricular'] }}</td>
                    <td>{{ __('Hobby')}}</td>
                    <td>{{ $student['hobby'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('Quota')}}</td>
                    <td>{{ $student['quota'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3 class="col-md-12 text-center">{{ __('Registered Subject for HSC')}}</h3>
                    <table class="table table-bordered table-subject">
                        @foreach($subjects as $key => $subject)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>
                                    <ol style="margin-bottom: 0">
                                        @foreach($subject as $sub)
                                            <li>
                                                {{ \App\Models\Backend\OnlineSubject::query()->findOrNew($sub)->name }}
                                                ({{ \App\Models\Backend\OnlineSubject::query()->findOrNew($sub)->code }}
                                                )
                                            </li>
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>


</section>
