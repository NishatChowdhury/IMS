<div class="modal-body" id="modal-body">
    <div class="form-group row">
        <label for="book_id" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">{{ __('Book')}}:</label>
        <div class="col-sm-7">
            <div class="input-group">
                {{ Form::text('book',$book->book_title,['class'=>'form-control','disabled']) }}
                {{ Form::hidden('book_id',$book->id) }}
                {{ Form::hidden('book_code',$book->book_code) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="student_id" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">{{ __('Student ID')}}</label>
        <div class="col-sm-7">
            <div class="input-group">
                {{ Form::select('student_id',$students,null,['class'=>'form-control select2','id'=>'student_id','placeholder'=>'Select Student ID']) }}
            </div>
        </div>
    </div>
</div>

