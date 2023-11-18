<div class="teachers-column-carousel-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title-wrapper">
            <div class="section-title">
              <h3>Our Teachers</h3>
              <p>We are glad to introduce our professional staff</p>
            </div>
          </div>
        </div>
      </div>
      <div class="teachers-column-carousel carousel-style-one owl-carousel">
	  @foreach($teachers as $teacher)
        <div class="single-teachers-column text-center">
          <div class="teachers-image-column">
            <a href="#">
              <img src="{{ asset('storage/uploads/staffs/') }}/{{ $teacher->image }}" alt="{{ $teacher->name }}" alt="" />
              <span class="image-hover">
                <span><i class="fa fa-edit"></i>View Profile</span>
              </span>
            </a>
          </div>
          <div class="teacher-column-carousel-text">
            <h4>{{$teacher->name}}</h4>
            <span>{{$teacher->title?? ''}}</span>
            <p>
			{{$teacher->academic_qualifications?? ''}}
            </p>
            <div class="social-links">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-google-plus"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
		@endforeach 
      </div>
    </div>
  </div>