
    <div class="card">
        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
            <div class="card-header">
                <h5 class="card-title">Transport Location</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Location Name']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Description</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Location Description']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Home To Institute*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::number('home_to_institute', null, ['class'=>'form-control', 'placeholder'=>'Location Home To Institute Fare']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Institute To Home*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::number('institute_to_home', null, ['class'=>'form-control', 'placeholder'=>'Location Institute To Home Fare']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Both*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::number('both', null, ['class'=>'form-control', 'placeholder'=>'Location Both Fare']) !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>




