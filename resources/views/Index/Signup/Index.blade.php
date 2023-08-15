@extends("Index.Layouts.Master")
@section('Title', 'Đăng ký')
@section('Content')
<link rel="stylesheet" href="{{ asset('index/css/reponsive.css') }}">
<div class="box-content d-flex" style="padding-top: 60px;width: 80%;margin: auto;">
  <div class="form-login-box bg-white mt-5 p-3" style="width: 30%;margin: auto;">
    <p class="text-center font-weight-bold mt-1 tx" style="font-size: 110%">ĐĂNG KÝ</p>
    <hr>
    <form id="signup-user-form" action="{{route('index.signup.index-post')}}" method="post">
      @csrf
      <div>
        <p class="fz95 mb-1">Your phone</p>
        <input type="number" name="phone" class="form-control w-100">
        <p class="fz95 mt-1 mb-1">Password</p>
        <input type="password" name="password" class="form-control w-100">
        <p class="fz95 mt-1 mb-1">Nhập lại mật khẩu</p>
        <input type="password" name="re_password" class="form-control w-100">
        <button type="submit" class="btn bg w-100 text-white cs mt-2">Đăng ký</button>
        @if (\Session::has('msg'))
        <p class="text-danger mt-1 text-center mb-0 fz-95">{!! \Session::get('msg') !!}</p>
        @endif
        <p class="fz95 text-center mt-3">Bạn đã có tài khoản, Login 
          <a href="{{route('index.login.index-post')}}">
          <span class="tx cs">Here</span>
          </a>
        </p>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('index/js/jquery-3.6.0.js') }}" ></script>
<script src="{{ asset('index/js/validate/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('index/js/validate/validate.js') }}"></script>
@endsection
