<div class="fun-factor-area fun-factor-two">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-6">
          <div class="single-fun-factor">
            <div class="fun-factor-icon">
              <i class="fa fa-users"></i>
            </div>
            <h2><span class="counter"> {{ \App\Models\Backend\Staff::all()->count() }}</span></h2>
            <span>Teacher & Staff</span>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6">
          <div class="single-fun-factor">
            <div class="fun-factor-icon">
              <i class="fa fa-bank"></i>
            </div>
            <h2><span class="counter"> {{ \App\Models\Backend\AcademicClass::all()->count() }}</span></h2>
            <span>Classes</span>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6">
          <div class="single-fun-factor">
            <div class="fun-factor-icon">
              <i class="fa fa-user"></i>
            </div>
            <h2><span class="counter">{{ \App\Models\Backend\Student::all()->count() }}</span></h2>
            <span>Students</span>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6">
          <div class="single-fun-factor">
            <div class="fun-factor-icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <h2><span class="counter">250</span></h2>
            <span>Attendance</span>
          </div>
        </div>
      </div>
    </div>
  </div>