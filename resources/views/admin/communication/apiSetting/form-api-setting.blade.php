<div class="row">
<div class="col-md-6 col-lg-6 col-sm-12">
    <div class="form-group">
        {{ Form::label('api_key', 'Api Key:',['class'=>'control-label' ]) }}
        {{ Form::text('api_key', old('api_key'), ['placeholder' => 'Enter Api Key:','class'=>'form-control']) }}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-12">
    <div class="form-group">
        {{ Form::label('sender_id', 'Sender Id:',['class'=>'control-label' ]) }}
        {{ Form::text('sender_id', old('sender_id'), ['placeholder' => 'Enter Sender id:','class'=>'form-control']) }}
    </div>
</div>
</div>