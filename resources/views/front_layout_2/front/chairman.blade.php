<div class="members-messages">
    <div class="container">
      <div class="title">
        <h2>Message</h2>
      </div>
      <div class="row">
	   
	   @if($chairman)
        <div class="py-2 col-6 col-sm-6 col-md-6 col-lg-6 ">
          <div class="member d-flex">
            <div class="thumb rounded overflow-hidden"><img alt="Chairman" class="img-fluid" src="{{ asset('uploads/message') }}/{{ $chairman->image ?? 'untitled.png' }}">
            </div>
            <div class="info">
              <div class="designation">{{ $chairman->title ?? 'Chairman Message' }}<span></span></div>
             <!-- <div class="name">{{ $chairman->alias ?? 'Chairman' }}</div>-->
              <p style="max-height: 210px; overflow: hidden;">
                <div style=" margin: 5px;">
                  <font face="tahoma, arial, verdana, sans-serif">বিসমিল্লাহির রাহমানির রাহিম।</font>
                </div>
                <div style="">
                  <font face="tahoma, arial, verdana, sans-serif">
				   
				   {!! strip_tags(Str::limit($chairman->body,1000)) !!}
					  
                   
				   
				 </font>
                </div>

              </p>
              <a style="cursor: pointer;" class="button-default button-yellow" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Read More..</a>

            </div>
          </div>
        </div>

		
		
		@endif
        <!---->
		@if($principal)
        <div class="py-2 col-6 col-sm-6 col-md-6 col-lg-6">
          <div class="member d-flex">
            <div class="thumb rounded overflow-hidden"><img alt="Chairman" class="img-fluid" src="{{ asset('uploads/message/'.$principal->image) }}">
            </div>
            <div class="info">
              <div class="designation"> {{ $principal->title ?? 'Principal Message' }} <span></span>
              </div>
              <!--<div class="name"> কমান্ডার মাহবুব আহমদ শাহজালাল, (শিক্ষা), বিএন </div>-->
              <p style="max-height: 210px; overflow: hidden;">
                <div style="font-family: Tahoma; margin: 5px;">
                  <font face="tahoma, arial, verdana, sans-serif">বিসমিল্লাহির রাহমানির রাহিম।</font>
                </div>
                <div style="">
                  <font face="tahoma, arial, verdana, sans-serif">
				    
					
					{!! strip_tags(Str::limit($principal->body,1000)) !!}
					 
					
					
				   </font>
                </div>
              </p>
              
			  <a style="cursor: pointer;" class="button-default button-yellow" data-toggle='modal' data-target='#principalModal' data-whatever='@mdo'>Read More..</a>
            </div>
          </div>
        </div>
	
		@endif
        <!---->
        <!---->
		
      </div>
    </div>
	
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style=''>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style='margin-top:100px'>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img style="margin-top: 10px"  height="200px"  width="200px" src="{{asset('uploads/message/') }}/{{ $chairman->image ?? '' }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <h2>
                                    {{ $chairman->title ?? 'Chairman Message'}}
                                </h2>
                                @if($chairman)
                                    <span aria-hidden="true">{!! $chairman->body ?? '' !!}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

  <div class="modal fade " id="principalModal" tabindex="-1" role="dialog" aria-labelledby="principalModal" aria-hidden="true" style=''>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style='margin-top:100px'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img style="margin-top: 10px"  height="200px"  width="200px" src="{{asset('uploads/message/'.$principal->image)}}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h2>
                                        {{$principal->title}}
                                    </h2>
                                    <span aria-hidden="true">{!! $principal->body !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>


	
  </div>
  
  	{{--read more--}}

  
  
  
  	{{--read more--}}
	
  

    {{--read more--}}
	
	
	
	

  


 