<div class="row">
    <div class="col-md-6">
        <div class="card-header" style="text-align: center">
            <span style="text-align: center"><i class="fas fa-info-circle" style="text-align: center"></i></span>
            <h3 class="card-title" style="text-align: center">General Details</h3>
        </div>
        <div class="card-body">
            <div class="card-header">
                <h5 class="card-title">Student Details</h5>
            </div>

            <div class="form-group">
                {{ Form::label('institutionName', 'Institution Name',['class'=>'control-label' ]) }}
                {{ Form::text('institutionName',null,['class' => 'form-control','placeholder'=>'Institution Name']) }}
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('academicYear', 'Academic Year',['class'=>'control-label' ]) }}
                        {{ Form::select('year', ['2019' => 'Year 2019', '2020' => 'Year 2020'], null, ['placeholder' => 'Select Academic year...','class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{Form::label('className','Class',['class'=>'control-label'])}}
                        {{ Form::select('className', ['5' => 'Class 5', '6' => 'Class 6'], null, ['placeholder' => 'Select Class Name...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('studentName','Student Name',['class'=>'control-label']) }}
                {{ Form::text('studentName',null,['class'=>'form-control','placeholder'=>'Student Name']) }}
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('studentId','Student Id',['class'=>'control-label']) }}
                        {{ Form::text('studentId',null,['class'=>'form-control', 'placeholder'=>'Student Card ID']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('rank','Rank',['class'=>'control-label']) }}
                        {{ Form::text('rank',null,['class'=>'form-control', 'placeholder'=>'Student Rank']) }}
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
                        {{ Form::select('gender', ['1' => 'Male', '2' => 'Female','3'=>'common'], null, ['placeholder' => 'Select Gender...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('fatherName','Father Name',['class'=>'control-label']) }}
                        {{ Form::text('fatherName',null,['class'=>'form-control', 'placeholder'=>'Father Name']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('motherName','Mother Name',['class'=>'control-label']) }}
                        {{ Form::text('motherName',null,['class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                        {{ Form::select('bloodGroup', ['1' => 'A+', '2' => 'A-','3'=>'B+'], null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('religion','Religion',['class'=>'control-label']) }}
                        {{ Form::select('religion', ['1' => 'Islam', '2' => 'Hindu','3'=>'Buddies'], null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{  Form::label('stuPic', 'Student Picture', ['class' => 'control-label'])  }}
                {{ Form::file('stuPic',['class'=>'form-control']) }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="col-md-6">
        <div class="card-header" style="text-align: center">
            <span style="text-align: center"><i class="fas fa-hand-holding-usd" style="text-align: center"></i></span>
            <h3 class="card-title" style="text-align: center">Payment Details</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('streetAddress','Street Address',['class'=>'control-label']) }}
                {{ Form::text('streetAddress',null,['class'=>'form-control', 'placeholder'=>'Street Address']) }}
            </div>
            <div class="form-group">
                {{ Form::label('area','Area / Town',['class'=>'control-label']) }}
                {{ Form::text('area',null,['class'=>'form-control', 'placeholder'=>'Area Town']) }}
            </div>

                <div class="form-group">
                    {{ Form::label('postCode','Post / Zip Code',['class'=>'control-label']) }}
                    {{ Form::text('postCode',null,['class'=>'form-control', 'placeholder'=>'Post / Zip Code']) }}
                </div>
            <div class="form-group">
                {{ Form::label('division','Division',['class'=>'control-label']) }}
                {{ Form::select('division', ['1' => 'Cox\'s Bazar', '2' => 'Chittagon','3'=>'dhaka'], null, ['placeholder' => 'Select Division...','class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('country','Country',['class'=>'control-label']) }}
                {{ Form::select('country', ['1' => 'Bangladesh', '2' => 'Pakistan','3'=>'Japan'], null, ['placeholder' => 'Select Country...','class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('state','State',['class'=>'control-label']) }}
                {{ Form::select('state', ['1' => 'Noakhali', '2' => 'Patya','3'=>'Gopalghanj'], null, ['placeholder' => 'Select State...','class'=>'form-control']) }}
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('contactMobile','Contact Mobile',['class'=>'control-label']) }}
                        {{ Form::text('contactMobile',null,['class'=>'form-control', 'placeholder'=>'Contact Mobile']) }}
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
                        {{ Form::text('fatherMobile',null,['class'=>'form-control', 'placeholder'=>'Father Mobile']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('motherMobile','Mother Mobile',['class'=>'control-label']) }}
                        {{ Form::text('motherMobile',null,['class'=>'form-control', 'placeholder'=>'Mother Mobile']) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

</div>
<div style="float:right">
    {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success']) !!}
</div>
