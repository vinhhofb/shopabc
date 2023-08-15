@extends("Index.Layouts.Master")
@section('Title', 'Đăng nhập')
@section('Content')

<link rel="stylesheet" href="{{ asset('index/css/reponsive.css') }}">
<div class="box-content d-flex" style="padding-top: 60px;width: 80%;margin: auto;">
  <div class="form-login-box bg-white mt-5 p-3" style="width: 30%;margin: auto;">
    <form id="login-user-form" action="{{route('index.login.index-post')}}" method="post">
      @csrf
      <p class="text-center font-weight-bold mt-1 tx" style="font-size: 110%">ĐĂNG NHẬP</p>
      <hr>
      <p class="fz95 mb-1">Nhập số điện thoại</p>
      <input type="number" name="phone" class="form-control w-100" required>
     
      <p class="fz95 mt-2 mb-1">Nhập mật khẩu</p>
      <input type="password" name="password" class="form-control w-100" required>
      
      <p class="float-right fz95 mt-2 tx cs">Quên mật khẩu</p>
      <button type="submit" class="btn bg w-100 text-white cs">Đăng nhập</button>
      @if (\Session::has('msg'))
      <p class="text-danger mt-2 text-center mb-0 fz-95">{!! \Session::get('msg') !!}</p>
      @endif
      <p class="fz95 text-center mt-2">Bạn chưa có tài khoản, Đăng ký
        <a href="{{route('index.signup.index-post')}}">
         <span class="tx cs">Tại đây</span>
       </a>
     </p>
   </form>
 </div>
</div>
<script src="{{ asset('index/js/jquery-3.6.0.js') }}" ></script>
<script src="{{ asset('index/js/validate/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('index/js/validate/validate.js') }}"></script>
@endsection
