@extends('layout.auth')

@section('content')
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{ asset('public/assets/images/logo-dark.svg') }}">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                  @if(Session::has('response'))
                      {!!Session::get('response')['message']!!}
                  @endif
              <form class="pt-3" action="{{ route ('login.check') }}" method="post">
                    @csrf
                    <input type="text" value="{{old('PhoneNumber')}}" class="form-control form-control-lg" name="PhoneNumber" placeholder="Phone Number">
                    <div class="form-group">
                    @if($errors->has('PhoneNumber'))
                      <small class="d-block text-danger">
                         {{$errors->first('PhoneNumber')}}
                      </small>
                    @endif
                  </div>
                  
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                    @if($errors->has('password'))
                    <small {{$errors->first('password')}}>
                    </small>
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">SIGN IN
                  </button>
                  
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ route ('register') }}" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection