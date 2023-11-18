<div class="tab-content">
    @if($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('front_layout_2.front.admission._student-information')
    {{--    @include('front_layout_2.front.admission._guardian-information')--}}
    @include('front_layout_2.front.admission._ssc-information')
    @include('front_layout_2.front.admission._subjects')
    @include('front_layout_2.front.admission._photograph')
    @include('front_layout_2.front.admission._bank-slip')

</div>

<hr>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="text-center form-group">
{{--                <button type="button" id="submit-button" class="btn btn-success" data-toggle="modal" data-target="#modal__large">Submit</button>--}}
                <button type="submit" class="btn btn-success">{{ __('Submit')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal large-->
<div class="modal fade" id="modal__large" tabindex="-1" role="dialog" aria-labelledby="modal__large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Review Information')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close font-size-14"></i>
                </button>
            </div>
            <div class="modal-body py-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Name')}}:</label>
                            <label class="text-black-0_9" id="name"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Gender')}}:</label>
                            <label class="text-black-0_9" id="gender"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Date of Birth')}}:</label>
                            <label class="text-black-0_9" id="dob"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Birth Certificate Number')}}:</label>
                            <label class="text-black-0_9" id="bcn"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Blood Group')}}:</label>
                            <label class="text-black-0_9" id="blood"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Religion')}}:</label>
                            <label class="text-black-0_9" id="religion"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Address')}}:</label>
                            <label class="text-black-0_9" id="address"></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Father Name')}}:</label>
                            <label class="text-black-0_9" id="father"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Mother Name')}}:</label>
                            <label class="text-black-0_9" id="mother"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Father Occupation')}}:</label>
                            <label class="text-black-0_9" id="father-occupation"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Mother Occupation')}}:</label>
                            <label class="text-black-0_9" id="mother-occupation"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Other Guardian')}}:</label>
                            <label class="text-black-0_9" id="other-guardian"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Guardian National ID')}}:</label>
                            <label class="text-black-0_9" id="guardian-national-id"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Mobile')}}:</label>
                            <label class="text-black-0_9" id="mobile"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Email')}}:</label>
                            <label class="text-black-0_9" id="email"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Guardian Yearly Income')}}:</label>
                            <label class="text-black-0_9" id="yearly-income"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">{{ __('Address')}}:</label>
                            <label class="text-black-0_9" id="guardian-address"></label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer py-4 text-center">
                <button type="button" class="btn btn-warning" data-dismiss="modal">{{ __('Edit')}}</button>
                <button type="submit" class="btn btn-success">Confirm Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Large End -->
