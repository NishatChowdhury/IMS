@extends('layouts.front_gold')

@section('title','News')

@section('content')

 <section class="paddingTop-50 paddingBottom-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mt-5 " id="data-wrapper">
                  
                   @foreach($newses as $key => $news)

                    <div
                        class="d-md-flex flex-wrap justify-content-between align-items-center bg-light  rounded mb-4 py-4 px-5 zoom">
                        <div class="media align-items-center">


						  @php
						  if($news->start!=null){
                             $dd = $news->start->format('d');
						  }
                           if($news->start!=null){
                             $mm = $news->start->format('M,Y');
                             }
                           if($news->notice_type_id == 1){
                            $typeN = 'News';
                            $types = 'badge-info';
                            }
                          @endphp
                            <div class="text-center "
                                style="border-right: 1px solid black;    padding-right: 1.1rem!important;">

                                <strong class="text-primary " style="font-size: 28px;">
								{{$dd}}
                                </strong>


                                <p class="mb-0 text-gray">
                                    {{$mm}}
                                </p>

                            </div>

                            <div class="media-body p-4">
                                <p class="mb-1 text-gray">
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    <span class="badge badge-info" style="">
                                        {{ $typeN}}
                                    </span>
                                </p>
                                <a href="{{ action('Front\FrontController@noticeDetails',$news->id) }}" class=" text-wrap"
                                    style="font-size: 18px; font-weight: 400;">
                                    All Colleges Code and EIIN Number of Bangladesh
                                </a>
                            </div>
                        </div>
                        @if($news->file)
                        <a href="{{ asset('assets/files/notice') }}/{{$news->file}}"
                            class="btn btn-outline-primary neww" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        <a href={{ action('Front\FrontController@noticeDetails',$news->id) }}"
                            class="btn btn-outline-primary neww">Read
                            More</a>
                    </div>
					@endforeach







                       <div>
                           {{ $newses->links() }}
                       </div>
                  {{--  <div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="pagination-content">
                                <div class="pagination-button">
                                  <ul class="pagination">
                                    <li class="current"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li>
                                      <a href="#"><i class="fa fa-caret-right"></i></a>
                                    </li>
                                  </ul>
                                  <span>Page:</span>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>--}}


                </div>

                <div class="col-lg-3 mt-5">
                    <div class="card ">
                        <div class="card-header border-bottom">
                            <h5 class="mb-0">Notice &amp; News List</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-3 newss"><a href="">School Order (4)</a></li>
                                <li class="mb-3 newss"><a href="">College Order (1)</a></li>
                                <li class="mb-3 newss"><a href="">Office Order (0)</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>


@stop