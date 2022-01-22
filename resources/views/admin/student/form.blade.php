@section('style')
<style>
.fancy-forms .tab-content{
    background: #ffffff;
    /* color: #ffffff; */
    padding: 10px;
    /* box-shadow: 8px 12px 25px 2px rgba(0,0,0,0.3); */
}

.fancy-forms .nav-tabs .nav-item{
    /* width: 50%; */
    text-align: center;
}

.fancy-forms .nav-tabs .nav-link{

    border: 1px solid #047afc;
    background-color: #047afc;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    color: #ffffff;
    box-shadow: 2px 0px 7px 0px rgb(0 0 0 / 30%);
    border-left: 1px solid;
}

.fancy-forms .nav-tabs .nav-link.active{
    border-color: #fff;
    color: #047afc;
    background-color: #ffffff;
}

 .fancy-forms .nav-tabs .nav-link:hover{
    border-color: #fff;
 }

 fancy-forms .nav-tabs .nav-link.active:hover{
    border-color: #047afc;
 }

 .fancyformcontainer{
    background: #e6c3b4;
    padding: .5rem 3rem !important;
    margin: 3rem !important;
 }

 .formsubmitbtn{
    background: #e47a4b;
    color: white; 
    margin-bottom: 1.5rem !important;
 }

 .formsubmitbtn:hover,.formsubmitbtn:focus{
    color: #fff;
 }

 /* for image upload  */
 .drop-zone {
  max-width: 300px;
  height: 300px;
  padding: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  font-size: 20px;
  cursor: pointer;
  color: #cccccc;
  border: 4px dashed #009578;
  border-radius: 10px;
}

.drop-zone--over {
  border-style: solid;
}

.drop-zone__input {
  display: none;
}

.drop-zone__thumb {
  width: 100%;
  height: 100%;
  border-radius: 10px;
  overflow: hidden;
  background-color: #cccccc;
  background-size: cover;
  position: relative;
}

.drop-zone__thumb::after {
  content: attr(data-label);
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 5px 0;
  color: #ffffff;
  background: rgba(0, 0, 0, 0.75);
  font-size: 14px;
  text-align: center;
}

.cutom_shadow{
    box-shadow: rgb(100 100 111 / 26%) 0px 7px 29px 0px;
}
option.customOption {
    /* background: red; */
    color: #000;
    font-weight: 900;
}

</style>
@endsection
<!-- MultiStep Form -->
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 fancy-forms">
             <!-- <div class="cardbox"> -->
                <ul class="nav nav-tabs  mt-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login" data-toggle="tab" href="#login_form" role="tab" aria-controls="login" aria-selected="true">Student Info</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="acadimic" data-toggle="tab" href="#acadimic_form" role="tab" aria-controls="acadimic" aria-selected="true">Academics Info</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="personal" data-toggle="tab" href="#personal_form" role="tab" aria-controls="personal" aria-selected="true">Personal Info</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="address" data-toggle="tab" href="#address_form" role="tab" aria-controls="address" aria-selected="true">Address Info</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login_form" role="tabpanel" aria-labelledby="login">
                            <h3 class="text-center p-2">Student Information</h3>
                            @isset($father)
                                <input type="hidden" name="f_id" value="{{ $father->id }}">
                                <input type="hidden" name="m_id" value="{{ $mother->id }}">
                                <input type="hidden" name="g_id" value="{{ $guardian->id }}">
                            @endisset
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            {{Form::label('name','Student\'s name',['class'=>'control-label'])}}
                                            {{ Form::text('name', null, ['placeholder' => 'Student\'s  Name...', 'class' => 'form-control' ]) }}
                                            @error('name')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{Form::label('name','Student\'s name Bangla',['class'=>'control-label'])}}
                                            {{ Form::text('name_bn', null, ['placeholder' => 'Student\'s  Name Bangla...', 'class' => 'form-control' ]) }}
                                            @error('name_bn')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            {{Form::label('name','Student\'s Birth Certificate',['class'=>'control-label'])}}
                                            {{ Form::text('birth_certificate', null, ['placeholder' => 'Student\'s  Birth Certificate...', 'class' => 'form-control' ]) }}
                                            @error('birth_certificate')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>                                        
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('dob','Date of Birth',['class'=>'control-label']) }}
                                            {{ Form::date('dob',null,['class' => 'form-control', 'placeholder'=>'Date of Birth']) }}
                                            @error('dob')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('gender','Gender',['class'=>'control-label']) }}
                                            {{ Form::select('gender_id', $repository->genders(), null, ['class'=>'form-control','placeholder' => 'Select Gender...']) }}
                                            @error('gender_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        {{-- for 2nd section --}}
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                                            {{ Form::select('blood_group_id', $repository->bloods(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                                            @error('blood_group_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('religion_id','Religion',['class'=>'control-label']) }}
                                            {{ Form::select('religion_id', $repository->religions(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                                            @error('religion_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('freedom_fighter','Freedom Fighter',['class'=>'control-label']) }}
                                                {{ Form::radio('freedom_fighter', 1, true, ['id'=>'active']) }}&nbsp;{{ Form::label('active','Yes') }}
                                                {{ Form::radio('freedom_fighter', 0, false, ['id'=>'inactive']) }}&nbsp;{{ Form::label('inactive','No') }}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('disability','Disability',['class'=>'control-label']) }}
                                                {{ Form::radio('disability', 1, true, ['id'=>'active']) }}&nbsp;{{ Form::label('active','Yes') }}
                                                {{ Form::radio('disability', 0, false, ['id'=>'inactive']) }}&nbsp;{{ Form::label('inactive','No') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        
                                        <div class="col-12">
                                            <label for="">Student Picture</label>
                                            <div class="drop-zone">
                                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                                {{-- <input type="file" name="myFile" class="drop-zone__input"> --}}
                                                {{ Form::file('pic',['class'=>'drop-zone__input', 'id'=>"file-input"]) }}
                                                <p></p>
                                                @error('pic')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-2">
                                            <div id="editImage" class="editImageShow">
                                                @if(\Route::current()->getName() != 'student.add')
                                                {!! Form::image('/assets/img/students/'.$student->image, 'Image Button',['class' => 'reset-now', 'width' => '200px', 'height' => '200px']) !!}
                                                @endif
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade show" id="acadimic_form" role="tabpanel" aria-labelledby="acadimic">
                            <h3 class="text-center p-2">Academics Information</h3>
                            @isset($father)
                                <input type="hidden" name="f_id" value="{{ $father->id }}">
                                <input type="hidden" name="m_id" value="{{ $mother->id }}">
                                <input type="hidden" name="g_id" value="{{ $guardian->id }}">
                                <input type="hidden" name="sa_id" value="{{ $studentAcademic->id }}">
                            @endisset
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        
                                        <div class="form-group col-12">
                                            <div class="form-group">
                                              <label for="">Academic Class</label>
                                              <select class="form-control" name="academic_class_id" id="getAcademicYear">
                                                  <option value="">--Select Academics Class--</option>
                                                  @foreach ($academicClass as $item)
                                                  <option value="{{ $item->id }}" class="customOption"
                                                    @isset($studentAcademic->academic_class_id)
                                                    {{ $item->id == $studentAcademic->academic_class_id ? 'selected' : '' }}
                                                    @endisset
                                                    >
                                                    {{ $item->classes->name ?? '' }}-{{ $item->section->name ?? '' }}-{{ $item->group->name ?? '' }}-{{ $item->sessions->year }}
                                                    </option>
                                                  @endforeach

                                              </select>
                                            </div>
                                            
                                            {{-- {{ Form::label('academic_class_id', 'Academic CLass',['class'=>'control-label' ]) }}
                                            {{ Form::select('academic_class_id',$repository->academicClassesForForm(), null, ['placeholder' => 'Select Academic CLass...','class'=>'form-control year']) }}
                                            @error('academic_class_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror --}}
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('rank','Rank',['class'=>'control-label']) }}
                                            {{ Form::text('rank',!empty($studentAcademic) ? $studentAcademic->rank : null,['placeholder'=>'Student Rank','class' => 'form-control','id'=>'rank']) }}
                                            @error('rank')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{Form::label('studentId','Student ID',['class'=>'control-label'])}}
                                            {{ Form::text('studentId', null, ['placeholder' => 'Student ID...','class' => 'form-control','id'=>'studentID']) }}
                                        </div>

                                        {{-- <div class="form-group col-6">
                                            {{ Form::label('session_id', 'Academic Year',['class'=>'control-label' ]) }}
                                            {{ Form::select('session_id',$repository->sessions(), !empty($studentAcademic) ? $studentAcademic->session_id : null, ['placeholder' => 'Select Academic year...','class'=>'form-control year']) }}
                                            @error('session_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div> --}}
                                        {{-- <div class="form-group col-6">
                                            {{ Form::label('class_id','Class',['class'=>'control-label'])}}
                                            {{ Form::select('class_id', $repository->classes(), !empty($studentAcademic) ? $studentAcademic->class_id : null, ['placeholder' => 'Select Class Name...','class'=>'form-control class']) }}
                                            @error('class_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('section_id','Section',['class'=>'control-label']) }}
                                            {{ Form::select('section_id',$repository->sections(),!empty($studentAcademic) ? $studentAcademic->section_id : null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                            @error('section_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('group_id','Group',['class'=>'control-label']) }}
                                            {{ Form::select('group_id', $repository->groups(), !empty($studentAcademic) ? $studentAcademic->group_id : null, ['placeholder' => 'Select Section...','class'=>'form-control']) }}
                                            @error('group_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>
         

                            </div>
                    </div>

                    <div class="tab-pane fade" id="personal_form" role="tabpanel" aria-labelledby="personal">
                        <h3 class="text-center"><b>Personal Information</b></h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Father Info</b>
                                    </div>
                                    <div class="card-body cutom_shadow">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                {{ Form::label('f_name','Father Name',['class'=>'control-label']) }}
                                                {{ Form::text('f_name', !empty($father) ? $father->f_name : null,['class'=>'form-control', 'placeholder'=>'Father Name']) }}
                                                @error('fname')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('f_name_bn','Father Name Bangla',['class'=>'control-label']) }}
                                                {{ Form::text('f_name_bn',!empty($father) ? $father->f_name_bn : null,['class'=>'form-control', 'placeholder'=>'Father Name Bangla']) }}
                                                @error('f_name_bn')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('f_mobile','Father Mobile',['class'=>'control-label']) }}
                                                {{ Form::text('f_mobile',!empty($father) ? $father->f_mobile : null,['class'=>'form-control', 'placeholder'=>'Father Mobile']) }}
                                                @error('f_mobile')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('f_email','Father Email',['class'=>'control-label']) }}
                                                {{ Form::email('f_email',!empty($father) ? $father->f_email : null,['class'=>'form-control', 'placeholder'=>'Father Email']) }}
                                                @error('f_email')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                {{ Form::label('f_dob','Father Date of Birth',['class'=>'control-label']) }}
                                                {{ Form::date('f_dob',!empty($father) ? $father->f_dob : null,['class' => 'form-control', 'placeholder'=>'Father Date of Birth']) }}
                                                @error('f_dob')
                                                    <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('f_occupation','Father Occupation',['class'=>'control-label']) }}
                                                {{ Form::text('f_occupation',!empty($father) ? $father->f_occupation : null,['class'=>'form-control', 'placeholder'=>'Father Occupation']) }}
                                                @error('f_occupation')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                {{ Form::label('f_nid','Father NID',['class'=>'control-label']) }}
                                                {{ Form::text('f_nid',!empty($father) ? $father->f_nid : null,['class'=>'form-control', 'placeholder'=>'Father NID']) }}
                                                @error('f_nid')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('f_birth_certificate','Father Birth Certificate',['class'=>'control-label']) }}
                                                {{ Form::text('f_birth_certificate',!empty($father) ? $father->f_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Father Birth Certificate']) }}
                                                @error('f_birth_certificate')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Mother Info</b>
                                    </div>
                                    <div class="card-body cutom_shadow">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                {{ Form::label('m_name','Mother Name',['class'=>'control-label']) }}
                                                {{ Form::text('m_name',!empty($mother) ? $mother->m_name : null,['class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                                                @error('m_name')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('m_name_bn','Mother Name Bangla',['class'=>'control-label']) }}
                                                {{ Form::text('m_name_bn',!empty($mother) ? $mother->m_name_bn : null,['class'=>'form-control', 'placeholder'=>'Mother Name Bangla']) }}
                                                @error('m_name_bn')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('m_mobile','Mother Mobile',['class'=>'control-label']) }}
                                                {{ Form::text('m_mobile',!empty($mother) ? $mother->m_mobile : null,['class'=>'form-control', 'placeholder'=>'Mother Mobile']) }}
                                                @error('m_mobile')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('m_email','Mother Email',['class'=>'control-label']) }}
                                                {{ Form::email('m_email',!empty($mother) ? $mother->m_email : null,['class'=>'form-control', 'placeholder'=>'Mother Email']) }}
                                                @error('m_email')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                {{ Form::label('m_dob','Mother Date of Birth',['class'=>'control-label']) }}
                                                {{ Form::date('m_dob',!empty($mother) ? $mother->m_dob : null,['class' => 'form-control', 'placeholder'=>'Mother Date of Birth']) }}
                                                @error('m_dob')
                                                    <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('m_occupation','Mother Occupation',['class'=>'control-label']) }}
                                                {{ Form::text('m_occupation',!empty($mother) ? $mother->m_occupation : null,['class'=>'form-control', 'placeholder'=>'Mother Occupation']) }}
                                                @error('m_occupation')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                {{ Form::label('m_nid','Mother NID',['class'=>'control-label']) }}
                                                {{ Form::text('m_nid',!empty($mother) ? $mother->m_nid : null,['class'=>'form-control', 'placeholder'=>'Mother NID']) }}
                                                @error('m_nid')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('m_birth_certificate','Mother Birth Certificate',['class'=>'control-label']) }}
                                                {{ Form::text('m_birth_certificate',!empty($mother) ? $mother->m_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Mother Birth Certificate']) }}
                                                @error('m_birth_certificate')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <b>Guardian Info</b>
                                    </div>
                                    <div class="card-body cutom_shadow">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                {{ Form::label('g_name','Guardian Name',['class'=>'control-label']) }}
                                                {{ Form::text('g_name',!empty($guardian) ? $guardian->g_name : null,['class'=>'form-control', 'placeholder'=>'Guardian Name']) }}
                                                @error('g_name')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('g_name_bn','Guardian Name Bangla',['class'=>'control-label']) }}
                                                {{ Form::text('g_name_bn',!empty($guardian) ? $guardian->g_name_bn : null,['class'=>'form-control', 'placeholder'=>'Guardian Name Bangla']) }}
                                                @error('g_name_bn')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('g_mobile','Guardian Mobile',['class'=>'control-label']) }}
                                                {{ Form::text('g_mobile',!empty($guardian) ? $guardian->g_mobile : null,['class'=>'form-control', 'placeholder'=>'Guardian Mobile']) }}
                                                @error('g_mobile')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('g_email','Guardian Email',['class'=>'control-label']) }}
                                                {{ Form::email('g_email',!empty($guardian) ? $guardian->g_email : null,['class'=>'form-control', 'placeholder'=>'Guardian Email']) }}
                                                @error('g_email')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                {{ Form::label('g_dob','Guardian Date of Birth',['class'=>'control-label']) }}
                                                {{ Form::date('g_dob',!empty($guardian) ? $guardian->g_dob : null,['class' => 'form-control', 'placeholder'=>'Guardian Date of Birth']) }}
                                                @error('g_dob')
                                                    <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('g_occupation','Guardian Occupation',['class'=>'control-label']) }}
                                                {{ Form::text('g_occupation',!empty($guardian) ? $guardian->g_occupation : null,['class'=>'form-control', 'placeholder'=>'Guardian Occupation']) }}
                                                @error('g_occupation')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                {{ Form::label('g_nid','Guardian NID',['class'=>'control-label']) }}
                                                {{ Form::text('g_nid',!empty($guardian) ? $guardian->g_nid : null,['class'=>'form-control', 'placeholder'=>'Guardian NID']) }}
                                                @error('g_nid')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                {{ Form::label('g_birth_certificate','Guardian Birth Certificate',['class'=>'control-label']) }}
                                                {{ Form::text('g_birth_certificate',!empty($guardian) ? $guardian->g_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Guardian Birth Certificate']) }}
                                                @error('g_birth_certificate')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="address_form" role="tabpanel" aria-labelledby="address">
                        <h3 class="text-center"><b>Address & Contact Information</b></h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="form-group col-12">
                                        {{ Form::label('streetAddress','Address',['class'=>'control-label']) }}
                                        {{ Form::textarea('address',null,['class'=>'form-control', 'rows'=>1, 'placeholder'=>'Address']) }}
                                        @error('address')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-12">
                                        {{ Form::label('area','Area / Town',['class'=>'control-label']) }}
                                        {{ Form::text('area',null,['class'=>'form-control', 'placeholder'=>'Area Town']) }}
                                        @error('area')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('postCode','Post / Zip Code',['class'=>'control-label']) }}
                                        {{ Form::text('zip',null,['class'=>'form-control', 'placeholder'=>'Post / Zip Code']) }}
                                        @error('zip')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    
                                    <div class="form-group col-6">
                                        {{ Form::label('city_id','City',['class'=>'control-label']) }}
                                        {{ Form::select('city_id',$repository->cities(), null, ['placeholder' => 'Select City','class'=>'form-control']) }}
                                        @error('city_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('country','Country',['class'=>'control-label']) }}
                                        {{ Form::select('country_id', $repository->countries(), null, ['placeholder' => 'Select Country...','class'=>'form-control']) }}
                                        @error('country_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('nationality','Nationality',['class'=>'control-label']) }}
                                        {{ Form::text('nationality',null,['class'=>'form-control', 'placeholder'=>'Nationality']) }}
                                        @error('nationality')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('contactMobile','Contact Mobile',['class'=>'control-label']) }}
                                            {{ Form::text('mobile',null,['class'=>'form-control', 'placeholder'=>'Contact Mobile']) }}
                                            @error('mobile')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('email','E-mail',['class'=>'control-label']) }}
                                            {{ Form::email('email',null,['class'=>'form-control', 'placeholder'=>'email@gmail.com']) }}
                                            @error('email')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
         
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ Form::label('status','Status',['class'=>'control-label']) }}
                                            {{ Form::radio('status', 0, false, ['id'=>'inactive']) }}&nbsp;{{ Form::label('inactive','Inactive') }}
                                            {{ Form::radio('status', 1, true, ['id'=>'active']) }}&nbsp;{{ Form::label('active','Active') }}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success btn-block']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
         <!-- 	</div> -->
        </div>
    </div>
</div>
<!-- /.MultiStep Form -->
@section('script')
<script>
    
    // $("#getAcademicYear").change(function() {
    //     var id = $(this).children(":selected").attr("value");
    //     console.log(id);
    // });

$(document).on('keyup','#rank', function () {
    // alert();
            // var academicYear = $('.year').val();
            var academicYear = $('#getAcademicYear').val();
            console.log(academicYear);        
            $.ajax({
                url:"{{url('admin/load_student_id')}}",
                type:'GET',
                data:{academicYear:academicYear},
                success:function (data) {
                    console.log(data);
                    $('#studentID').val(data);

                }
            });
        });










    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

            let x = document.getElementById("editImage");
            if (file.name != null) {
                // console.log(x);
                x.style.display = "none";
            }


  console.log(file.name);

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

</script>
@endsection
