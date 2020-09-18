<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Parent Account*:</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::select('coa_parent_id',$repository->parents(),null,['class'=>'form-control','style'=>'height: 35px !important;','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Account Name</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::text('name',null,['class'=>'form-control','style'=>'height: 35px !important;','required']) }}
        </div>
    </div>
</div>
<div style="float: right">
    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Save</button>
</div>
