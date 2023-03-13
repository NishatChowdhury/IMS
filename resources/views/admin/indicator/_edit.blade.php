{!!  Form::model($indicator,['action'=>['Backend\IndicatorController@update',$indicator->id],'method'=>'patch','id'=>'edit-form']) !!}
<div class="modal-body">
    <div class="form-group">
        {{ Form::label('name', 'Indicator Name',['class'=>'control-label' ]) }}
        {{ Form::text('name', null, ['placeholder' => 'Enter Indicator Name','class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('competency', 'Competency',['class'=>'control-label' ]) }}
        {{ Form::select('competency_id',$competencies, null, ['placeholder' => 'Select Competency','class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description',['class'=>'control-label' ]) }}
        {{ Form::textarea('description', null, ['placeholder' => 'Enter Description','class'=>'form-control']) }}
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
    <button type="submit" class="btn btn-primary">{{ __('Save changes')}}</button>
</div>
{!! Form::close() !!}
