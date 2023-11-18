 <section>
    <div class="container">
      <div class="row mt-5 mx-0">
        <div class="col-lg-12">
          <div class="gallary-title text-center">
            <h2>Suborno Joyontee Corner</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
		
		  @foreach($galleryCorner as $img)
          <div class="gallary">
            <a class="venobox vbox-item" data-gall="gallery01" href="{{ url('storage/gallery/'.$img->image) }}">
              <img src="{{ url('storage/gallery/'.$img->image) }}" alt="{{ $img->name }}" alt="" class="d-block w-100">
            </a>
          </div>
		   @endforeach
        </div>
      </div>
    </div>
  </section>