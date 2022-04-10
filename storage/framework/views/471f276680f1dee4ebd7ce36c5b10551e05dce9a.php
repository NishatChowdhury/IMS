<?php $__env->startSection('style'); ?>
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
<?php $__env->stopSection(); ?>
<!-- MultiStep Form -->
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 fancy-forms">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
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
                            <?php if(isset($father)): ?>
                                <input type="hidden" name="f_id" value="<?php echo e($father->id); ?>">
                                <input type="hidden" name="m_id" value="<?php echo e($mother->id); ?>">
                                <input type="hidden" name="g_id" value="<?php echo e($guardian->id); ?>">
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('name','Student\'s name',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::text('name', null, ['placeholder' => 'Student\'s  Name...', 'class' => 'form-control' ])); ?>

                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('name','Student\'s name Bangla',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::text('name_bn', null, ['placeholder' => 'Student\'s  Name Bangla...', 'class' => 'form-control' ])); ?>

                                            <?php $__errorArgs = ['name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group col-12">
                                            <?php echo e(Form::label('name','Student\'s Birth Certificate',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::number('birth_certificate', null, ['placeholder' => 'Student\'s  Birth Certificate...', 'class' => 'form-control' ])); ?>

                                            <?php $__errorArgs = ['birth_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>                                        
                                        
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('dob','Date of Birth',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::date('dob',null,['class' => 'form-control', 'placeholder'=>'Date of Birth'])); ?>

                                            <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('gender','Gender',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::select('gender_id', $repository->genders(), null, ['class'=>'form-control','placeholder' => 'Select Gender...'])); ?>

                                            <?php $__errorArgs = ['gender_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        
                                        
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('bloodGroup','Blood Group',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::select('blood_group_id', $repository->bloods(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control'])); ?>

                                            <?php $__errorArgs = ['blood_group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('religion_id','Religion',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::select('religion_id', $repository->religions(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control'])); ?>

                                            <?php $__errorArgs = ['religion_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('freedom_fighter','Freedom Fighter',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::radio('freedom_fighter', 1, true, ['id'=>'active'])); ?>&nbsp;<?php echo e(Form::label('active','Yes')); ?>

                                                <?php echo e(Form::radio('freedom_fighter', 0, false, ['id'=>'inactive'])); ?>&nbsp;<?php echo e(Form::label('inactive','No')); ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('disability','Disability',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::radio('disability', 1, true, ['id'=>'active'])); ?>&nbsp;<?php echo e(Form::label('active','Yes')); ?>

                                                <?php echo e(Form::radio('disability', 0, false, ['id'=>'inactive'])); ?>&nbsp;<?php echo e(Form::label('inactive','No')); ?>

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
                                                
                                                <?php echo e(Form::file('pic',['class'=>'drop-zone__input', 'id'=>"file-input"])); ?>

                                                <p></p>
                                                <?php $__errorArgs = ['pic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-2">
                                            <div id="editImage" class="editImageShow">
                                                <?php if(\Route::current()->getName() != 'student.add'): ?>
                                                <?php echo Form::image('/storage/uploads/students/'.$student->image, 'Image Button',['class' => 'reset-now', 'width' => '200px', 'height' => '200px']); ?>

                                                <?php endif; ?>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade show" id="acadimic_form" role="tabpanel" aria-labelledby="acadimic">
                            <h3 class="text-center p-2">Academics Information</h3>
                            <?php if(isset($father)): ?>
                                <input type="hidden" name="f_id" value="<?php echo e($father->id); ?>">
                                <input type="hidden" name="m_id" value="<?php echo e($mother->id); ?>">
                                <input type="hidden" name="g_id" value="<?php echo e($guardian->id); ?>">
                                <input type="hidden" name="sa_id" value="<?php echo e($studentAcademic->id); ?>">
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        
                                        <div class="form-group col-12">
                                            <div class="form-group">
                                              <label for="">Academic Class</label>
                                              <select class="form-control" name="academic_class_id" id="getAcademicYear">
                                                  <option value="">--Select Academics Class--</option>
                                                  <?php $__currentLoopData = $academicClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($item->id); ?>" class="customOption"
                                                    <?php if(isset($studentAcademic->academic_class_id)): ?>
                                                    <?php echo e($item->id == $studentAcademic->academic_class_id ? 'selected' : ''); ?>

                                                    <?php endif; ?>
                                                    >
                                                    <?php echo e($item->classes->name ?? ''); ?>-<?php echo e($item->section->name ?? ''); ?>-<?php echo e($item->group->name ?? ''); ?>-<?php echo e($item->sessions->year); ?>

                                                    </option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                              </select>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('rank','Rank',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::text('rank',!empty($studentAcademic) ? $studentAcademic->rank : null,['placeholder'=>'Student Rank','class' => 'form-control','id'=>'rank'])); ?>

                                            <?php $__errorArgs = ['rank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <?php echo e(Form::label('studentId','Student ID',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::text('studentId', null, ['placeholder' => 'Student ID...','class' => 'form-control','id'=>'studentID'])); ?>

                                        </div>

                                        
                                        
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
                                                <?php echo e(Form::label('f_name',' Name',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('f_name', !empty($father) ? $father->f_name : null,['class'=>'form-control', 'placeholder'=>' Name'])); ?>

                                                <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_name_bn',' Name Bangla',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('f_name_bn',!empty($father) ? $father->f_name_bn : null,['class'=>'form-control', 'placeholder'=>' Name Bangla'])); ?>

                                                <?php $__errorArgs = ['f_name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_mobile',' Mobile',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('f_mobile',!empty($father) ? $father->f_mobile : null,['class'=>'form-control', 'placeholder'=>' Mobile'])); ?>

                                                <?php $__errorArgs = ['f_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_email',' Email',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::email('f_email',!empty($father) ? $father->f_email : null,['class'=>'form-control', 'placeholder'=>' Email'])); ?>

                                                <?php $__errorArgs = ['f_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_dob',' Date of Birth',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::date('f_dob',!empty($father) ? $father->f_dob : null,['class' => 'form-control', 'placeholder'=>' Date of Birth'])); ?>

                                                <?php $__errorArgs = ['f_dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_occupation',' Occupation',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('f_occupation',!empty($father) ? $father->f_occupation : null,['class'=>'form-control', 'placeholder'=>' Occupation'])); ?>

                                                <?php $__errorArgs = ['f_occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_nid',' NID',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('f_nid',!empty($father) ? $father->f_nid : null,['class'=>'form-control', 'placeholder'=>' NID'])); ?>

                                                <?php $__errorArgs = ['f_nid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('f_birth_certificate',' Birth Certificate',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('f_birth_certificate',!empty($father) ? $father->f_birth_certificate : null,['class'=>'form-control', 'placeholder'=>' Birth Certificate'])); ?>

                                                <?php $__errorArgs = ['f_birth_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                                <?php echo e(Form::label('m_name',' Name',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('m_name',!empty($mother) ? $mother->m_name : null,['class'=>'form-control', 'placeholder'=>' Name'])); ?>

                                                <?php $__errorArgs = ['m_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_name_bn',' Name Bangla',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('m_name_bn',!empty($mother) ? $mother->m_name_bn : null,['class'=>'form-control', 'placeholder'=>' Name Bangla'])); ?>

                                                <?php $__errorArgs = ['m_name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_mobile',' Mobile',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('m_mobile',!empty($mother) ? $mother->m_mobile : null,['class'=>'form-control', 'placeholder'=>' Mobile'])); ?>

                                                <?php $__errorArgs = ['m_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_email',' Email',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::email('m_email',!empty($mother) ? $mother->m_email : null,['class'=>'form-control', 'placeholder'=>' Email'])); ?>

                                                <?php $__errorArgs = ['m_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_dob',' Date of Birth',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::date('m_dob',!empty($mother) ? $mother->m_dob : null,['class' => 'form-control', 'placeholder'=>' Date of Birth'])); ?>

                                                <?php $__errorArgs = ['m_dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_occupation',' Occupation',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('m_occupation',!empty($mother) ? $mother->m_occupation : null,['class'=>'form-control', 'placeholder'=>' Occupation'])); ?>

                                                <?php $__errorArgs = ['m_occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_nid',' NID',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('m_nid',!empty($mother) ? $mother->m_nid : null,['class'=>'form-control', 'placeholder'=>' NID'])); ?>

                                                <?php $__errorArgs = ['m_nid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('m_birth_certificate',' Birth Certificate',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('m_birth_certificate',!empty($mother) ? $mother->m_birth_certificate : null,['class'=>'form-control', 'placeholder'=>' Birth Certificate'])); ?>

                                                <?php $__errorArgs = ['m_birth_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                                <?php echo e(Form::label('g_name',' Name',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('g_name',!empty($guardian) ? $guardian->g_name : null,['class'=>'form-control', 'placeholder'=>' Name'])); ?>

                                                <?php $__errorArgs = ['g_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_name_bn',' Name Bangla',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('g_name_bn',!empty($guardian) ? $guardian->g_name_bn : null,['class'=>'form-control', 'placeholder'=>' Name Bangla'])); ?>

                                                <?php $__errorArgs = ['g_name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_mobile',' Mobile',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('g_mobile',!empty($guardian) ? $guardian->g_mobile : null,['class'=>'form-control', 'placeholder'=>' Mobile'])); ?>

                                                <?php $__errorArgs = ['g_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_email',' Email',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::email('g_email',!empty($guardian) ? $guardian->g_email : null,['class'=>'form-control', 'placeholder'=>' Email'])); ?>

                                                <?php $__errorArgs = ['g_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_dob',' Date of Birth',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::date('g_dob',!empty($guardian) ? $guardian->g_dob : null,['class' => 'form-control', 'placeholder'=>' Date of Birth'])); ?>

                                                <?php $__errorArgs = ['g_dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_occupation',' Occupation',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::text('g_occupation',!empty($guardian) ? $guardian->g_occupation : null,['class'=>'form-control', 'placeholder'=>' Occupation'])); ?>

                                                <?php $__errorArgs = ['g_occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_nid',' NID',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('g_nid',!empty($guardian) ? $guardian->g_nid : null,['class'=>'form-control', 'placeholder'=>' NID'])); ?>

                                                <?php $__errorArgs = ['g_nid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php echo e(Form::label('g_birth_certificate',' Birth Certificate',['class'=>'control-label'])); ?>

                                                <?php echo e(Form::number('g_birth_certificate',!empty($guardian) ? $guardian->g_birth_certificate : null,['class'=>'form-control', 'placeholder'=>' Birth Certificate'])); ?>

                                                <?php $__errorArgs = ['g_birth_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <b style="color: red"><?php echo e($message); ?></b>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                        <?php echo e(Form::label('streetAddress','Address',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::textarea('address',null,['class'=>'form-control', 'rows'=>1, 'placeholder'=>'Address'])); ?>

                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <b style="color: red"><?php echo e($message); ?></b>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-12">
                                        <?php echo e(Form::label('area','Area / Town',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::text('area',null,['class'=>'form-control', 'placeholder'=>'Area Town'])); ?>

                                        <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <b style="color: red"><?php echo e($message); ?></b>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <?php echo e(Form::label('postCode','Post / Zip Code',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::text('zip',null,['class'=>'form-control', 'placeholder'=>'Post / Zip Code'])); ?>

                                        <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <b style="color: red"><?php echo e($message); ?></b>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="form-group col-6">
                                        <?php echo e(Form::label('city_id','City',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::select('city_id',$repository->cities(), null, ['placeholder' => 'Select City','class'=>'form-control'])); ?>

                                        <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <b style="color: red"><?php echo e($message); ?></b>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <?php echo e(Form::label('country','Country',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::select('country_id', $repository->countries(), null, ['placeholder' => 'Select Country...','class'=>'form-control'])); ?>

                                        <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <b style="color: red"><?php echo e($message); ?></b>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <?php echo e(Form::label('nationality','Nationality',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::text('nationality',null,['class'=>'form-control', 'placeholder'=>'Nationality'])); ?>

                                        <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <b style="color: red"><?php echo e($message); ?></b>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('contactMobile','Contact Mobile',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::number('mobile',null,['class'=>'form-control', 'placeholder'=>'Contact Mobile'])); ?>

                                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('email','E-mail',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::email('email',null,['class'=>'form-control', 'placeholder'=>'email@gmail.com'])); ?>

                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <b style="color: red"><?php echo e($message); ?></b>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
         
                                    <div class="col-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('status','Status',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::radio('status', 0, false, ['id'=>'inactive'])); ?>&nbsp;<?php echo e(Form::label('inactive','Inactive')); ?>

                                            <?php echo e(Form::radio('status', 1, true, ['id'=>'active'])); ?>&nbsp;<?php echo e(Form::label('active','Active')); ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <?php echo Form::submit('Submit', ['class' => 'form-control, btn btn-success btn-block']); ?>

                        </div>
                    </div>
                </div>
         <!-- 	</div> -->
        </div>
    </div>
</div>
<!-- /.MultiStep Form -->
<?php $__env->startSection('script'); ?>
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
                url:"<?php echo e(url('admin/load_student_id')); ?>",
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
 * @param  {HTMLElement} dropZoneElement
 * @param  {File} file
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
<?php $__env->stopSection(); ?>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/student/form.blade.php ENDPATH**/ ?>