@extends('layouts.front_gold')

@section('title',ucfirst($page->name))

@section('content')


  <div class="py-3 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2 style='color:white'>{{ ucfirst($page->name) }}</h2>
                </div>
                
            </div>
        </div>
    </div>
    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    {!! $page->content !!}
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

    

@stop
