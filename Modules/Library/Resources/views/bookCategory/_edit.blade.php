{!!  Form::model($category,['route'=>['bookCategory.update',$category->id],'method'=>'patch','id'=>'edit-form']) !!}
<div class="modal-body">
    <div class="form-group">
        {{ Form::label('book_category', 'Book Category',['class'=>'control-label' ]) }}
        {{ Form::text('book_category', null, ['placeholder' => 'Enter Category Name','class'=>'form-control']) }}
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
    <button type="submit" class="btn btn-primary">{{ __('Save changes')}}</button>
</div>
{!! Form::close() !!}
