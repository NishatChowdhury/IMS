<section class="paddingTop-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">
                    {{ __('Suborno Joyontee Corner') }}
                </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto" ></div>
           
            </div>
        </div> <!-- END row-->

        <div class="row marginTop-60">
            <div class="owl-carousel arrow-edge arrow-black" data-space="0"  data-items="4" data-arrow="true" data-tablet-items="2" data-mobile-items="1">
                @foreach($galleryCorner as $img)
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="{{ url('storage/gallery/'.$img->image) }}" alt="{{ $img->name }}" style="height: 400px">
                        <div class="card-img-overlay transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="{{ url('storage/gallery/'.$img->image) }}" data-fancybox="gallery1" class="iconbox iconbox-md bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- END row-->

    </div> <!-- END container-->
</section>
