<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card-header" style="text-align: center">
            <span style="text-align: center"><i class="fas fa-info-circle" style="text-align: center"></i></span>
            <h3 class="card-title" style="text-align: center">General Details</h3>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="card-header" style="text-align: center">
            <span style="text-align: center"><i class="fas fa-hand-holding-usd" style="text-align: center"></i></span>
            <h3 class="card-title" style="text-align: center">Payment Details</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
            <div class="card-header">
                <h5 class="card-title">Student Details</h5>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('session_id', 'Academic Year',['class'=>'control-label' ]) }}
                        {{ Form::select('session_id',$sessions, null, ['placeholder' => 'Select Academic year...','class'=>'form-control year']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('class_id','Class',['class'=>'control-label'])}}
                        {{ Form::select('class_id', $classes, null, ['placeholder' => 'Select Class Name...','class'=>'form-control class']) }}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('section_id','Section',['class'=>'control-label']) }}
                        {{ Form::select('section_id',$sections,null,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('group_id','Group',['class'=>'control-label']) }}
                        {{ Form::select('group_id', $groups, null, ['placeholder' => 'Select Section...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                        {{Form::label('name','Student\'s name',['class'=>'control-label'])}}
                        {{ Form::text('name', null, ['placeholder' => 'Student\'s  Name...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{Form::label('studentId','Student ID',['class'=>'control-label'])}}
                        {{ Form::text('studentId',null, ['placeholder' => 'Student ID...','class'=>'form-control','readonly','id'=>'studentID']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('rank','Rank',['class'=>'control-label']) }}
                        {{ Form::text('rank',null,['class'=>'form-control', 'placeholder'=>'Student Rank','id'=>'rank']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('dateOfBirth','Date of Birth',['class'=>'control-label']) }}
                        {{ Form::date('dateOfBirth',null,['class'=>'form-control', 'placeholder'=>'Date of Birht']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('gender','Gender',['class'=>'control-label']) }}
                        {{ Form::select('gender_id', $genders, null, ['placeholder' => 'Select Gender...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('fatherName','Father Name',['class'=>'control-label']) }}
                        {{ Form::text('father',null,['class'=>'form-control', 'placeholder'=>'Father Name']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('motherName','Mother Name',['class'=>'control-label']) }}
                        {{ Form::text('mother',null,['class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                        {{ Form::select('blood_group_id', $blood_groups, null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('religion','Religion',['class'=>'control-label']) }}
                        {{ Form::select('religion', ['1' => 'Islam', '2' => 'Hindu','3'=>'Buddies'], null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="form-group files color">
                {{  Form::label('stuPic', 'Student Picture', ['class' => 'control-label'])  }}
                {{ Form::file('image',['class'=>'form-control', 'id'=>"file-input"]) }}
                <div id="thumb-output"></div>
            </div>
        </div>

        </div>
        <!-- /.card-body -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
                <div class="card-header">
                    <h5 class="card-title">Street Address</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('streetAddress','Address',['class'=>'control-label']) }}
                    {{ Form::textarea('address',null,['class'=>'form-control', 'rows'=>1, 'placeholder'=>'Address']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('area','Area / Town',['class'=>'control-label']) }}
                    {{ Form::text('area',null,['class'=>'form-control', 'placeholder'=>'Area Town']) }}
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('postCode','Post / Zip Code',['class'=>'control-label']) }}
                            {{ Form::text('zip',null,['class'=>'form-control', 'placeholder'=>'Post / Zip Code']) }}
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('division','Division',['class'=>'control-label']) }}
                            {{ Form::select('division_id', $divisions, null, ['placeholder' => 'Select Division...','class'=>'form-control']) }}
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('state','State',['class'=>'control-label']) }}
                            {{ Form::text('state', null, ['placeholder' => 'Select State...','class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('country','Country',['class'=>'control-label']) }}
                            {{ Form::select('country_id', $countries, null, ['placeholder' => 'Select Country...','class'=>'form-control']) }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="">
                <div class="card">
                    <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
                        <div class="card-header">
                            <h5 class="card-title">Contact Details</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('contactMobile','Contact Mobile',['class'=>'control-label']) }}
                                    {{ Form::text('mobile',null,['class'=>'form-control', 'placeholder'=>'Contact Mobile']) }}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('email','E-mail',['class'=>'control-label']) }}
                                    {{ Form::email('email',null,['class'=>'form-control', 'placeholder'=>'email@gmail.com']) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('fatherMobile','Father Mobile',['class'=>'control-label']) }}
                                    {{ Form::text('father_mobile',null,['class'=>'form-control', 'placeholder'=>'Father Mobile']) }}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('motherMobile','Mother Mobile',['class'=>'control-label']) }}
                                    {{ Form::text('motherMobile',null,['class'=>'form-control', 'placeholder'=>'Mother Mobile']) }}
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            {{ Form::label('status','Status',['class'=>'control-label']) }}
                            {{ Form::radio('status', 0, ['class'=>'form-control', false]) }} Inactive
                            {{ Form::radio('status', 1, ['class'=>'form-control', true]) }} Active
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success btn-block']) !!}
            </div>
        </div>
</div>
</div>
@section('script')
<script>
    $(document).on('keyup','#rank', function () {
        var academicYear = $('.year').val();
        $.ajax({
            url:"{{url('/load_student_id')}}",
            type:'GET',
            data:{academicYear:academicYear},
            success:function (data) {
                console.log(data);
                $('#studentID').val(data);

            }
        });
    });
    $(document).ready( function() {
        $('#alert_error').delay(3000).fadeOut();
    });

</script>
@stop