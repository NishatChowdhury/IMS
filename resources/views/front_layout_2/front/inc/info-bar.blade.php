@if($errors->any())
  <div class="row">
    <div class="col-9">

    </div>
    <div class="col-3">
      @if (session('custom_variable'))

        @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
              <li class="text-white">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      @endif
    </div>
  </div>
@endif

<div class="row">

          <div class="col-lg-7 col-md-8">
            <div class="header-top-info">
			<span><i class="fa fa-phone"></i><a href="tel:{{  siteConfig('phone') }}">{{  siteConfig('phone') }}</a></span>
              <div class="social-links">
                <a href="{{ socialConfig('facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
              </div>
              <p> {{ __('EIIN') }}: {{ siteConfig('eiin') }}</p>
              <p>{{ __('Institute Code') }}: {{ siteConfig('institute_code') }}</p>
            </div>

          </div>

          <div class="col-lg-5 col-md-4">
            <div class="header-login-register">
              <ul class="login">
                <li>
                  <a href="#"><i class="fa fa-key"></i>Login</a>
                  <div class="login-form">
                    <h4>Login</h4>
                    <form action="{{ route('student.') }}" method="post">
                      @csrf
                      <div class="form-box">
                        <i class="fa fa-user"></i>
                        <input type="text" name="studentId" placeholder="Student ID" />
                      </div>
                      <div class="form-box">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                      </div>
                      <div class="button-box">
                        <button type="submit" class="login-btn">Login</button>
                      </div>
                    </form>
                  </div>
                </li>
              </ul>
              <ul class="register">
                <li>
                  <a href="#"><i class="fa fa-lock"></i>Sign Up</a>
                  <div class="register-form">
                    <h4>Sign Up</h4>
                    <span>Please sign up using account detail bellow.</span>
                    <form action="#" method="post">
                      <div class="form-box">
                        <i class="fa fa-user"></i>
                        <input type="text" name="user-name" placeholder="Username" />
                      </div>
                      <div class="form-box">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="user-password" placeholder="Password" />
                      </div>
                      <div class="form-box">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="user-email" placeholder="Email" />
                      </div>
                      <div class="button-box">
                        <input checked data-toggle="toggle" type="checkbox" />
                        <span>Remember me</span>
                        <button type="submit" class="register-btn">
                          Register
                        </button>
                      </div>
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
