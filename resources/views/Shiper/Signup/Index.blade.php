@extends("Shiper.Layouts.Master")
@section('Title', 'Signup Shiper')
@section('Content')
<link rel="stylesheet" href="{{ asset('index/css/reponsive.css') }}">
<div class="box-content d-flex" style="padding-top: 60px;width: 80%;margin: auto;">
  <div class="form-login-box bg-white mt-3 p-3" style="width: 30%;margin: auto;">
    <p class="text-center font-weight-bold mt-1 tx" style="font-size: 110%">Signup Store</p>
    <hr>
    <form id="signup-shiper-form" action="{{url('kenh-giao-hang/dang-ky')}}" method="post">
      @csrf
      <div>
        <p class="fz95 mb-1 ">Nhập họ và Name</p>
        <input type="text" name="name" class="form-control w-100" required >
        <p class="fz95 mb-1 ">Nhập địa chỉ email</p>
        <input type="email" name="email" class="form-control w-100" required>
        <p class="fz95 mb-1 ">Your phone</p>
        <input type="number" name="phone" class="form-control w-100" required>
        <p class="fz95 mt-1 mb-1">Location</p>
        <select class="form-control" id="exampleFormControlSelect1" name="area">
          @foreach($getCity as $getCity)
          <option value="{{$getCity->id}}">{{$getCity->name}}</option>
          @endforeach
        </select>
        <p class="fz95 mt-1 mb-1">Password</p>
        <input type="password" name="password" class="form-control w-100">
        <p class="fz95 mt-1 mb-1">Re Password</p>
        <input type="password" name="re_password" class="form-control w-100">
        <button type="submit" class="btn bg w-100 text-white cs mt-3">Signup</button>
        @if (\Session::has('msg'))
        <p class="text-danger mt-2 text-center mb-0 fz-95">{!! \Session::get('msg') !!}</p>
        @endif
        <p class="fz95 text-center mt-3">You already have an account, Login
          <a href="{{url('kenh-giao-hang/dang-nhap')}}">
            <span class="tx cs">Here</span>
          </a>
        </p>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('index/js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('index/js/validate/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('index/js/validate/validate.js') }}"></script>
@endsection
