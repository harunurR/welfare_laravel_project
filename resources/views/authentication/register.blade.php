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
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
            @if(Session::has('response'))
                {!!Session::get('response')['message']!!}
            @endif

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <form action="{{route ('register.store') }}" method="post" class="pt-3">
      @csrf
      <div class="form-group">
          <input name="fullname" value="{{old('fullname')}}" type="text" class="form-control form-control-lg" id="fullname" placeholder="Full Name">
        </div>
        @if($errors->has('fullname'))
        <small class="d-block text-danger">
              {{$errors->first('fullname')}}
          </small>
          @endif

          <div class="form-group">
            <input name="username" value="{{old('username')}}" type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
          </div>
          @if($errors->has('username'))
            <small class="d-block text-danger">
                {{$errors->first('username')}}
            </small>
            @endif
            <div class="form-group">
            <input name="phone" value="{{old('phone')}}" type="phone" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Phone Number">
          </div>
          @if($errors->has('phone'))
            <small class="d-block text-danger">
                {{$errors->first('phone')}}
            </small>
            @endif
          <div class="form-group">
            <input name="email" value="{{old('email')}}" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email Address">
          </div>
          @if($errors->has('email'))
            <small class="d-block text-danger">
                {{$errors->first('email')}}
            </small>
            @endif
          <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
          </div>
          @if($errors->has('password'))
          <small class="d-block text-danger">
            {{$errors->first('password')}}
          </small>
          @endif
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password">
          </div>
          @if($errors->has('password_confirmation'))
          <small class="d-block text-danger">
            {{$errors->first('password_confirmation')}}
          </small>
          @endif
          <div class="mb-4">
            <div class="form-check">
              <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up
          </button>
          <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route ('login')}}" class="text-primary">Login</a>
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