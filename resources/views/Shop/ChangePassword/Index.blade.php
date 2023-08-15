@extends("Shop.Layouts.Master")
@section('Title', 'Change Password')
@section('Content')
<div class="container-scroller">
  <x-shop.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-shop.layouts.side-bar/>
    </div>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                <div>
                  <div>
                    <form  method="post" action="{{url('kenh-cua-hang/doi-mat-khau')}}">
                     @csrf
                     <div class="bg-white p-3">
                      <p class="font-weight-bold" style="font-size:120%">Change Password</p>
                      <div class="row m-0">
                        <div class="col-12 col-md-6 p-0 pr-2 mb-2">
                          <label class="fz95">Password Now</label>
                          <input type="text" name="passwordNow" class="form-control mr-2" required>
                        </div>
                        <div class="col-12 col-md-6 p-0 pl-2 mb-2">
                          <label class="fz95">Password New</label>
                          <input type="text" name="passwordNew" class="form-control mr-2" required>
                        </div>
                        <div class="col-12 col-md-6 p-0 pr-2 mb-2">
                          <label class="fz95">Repassword</label>
                          <input type="text" name="passwordNewRe" class="form-control mr-2" required>
                        </div>  
                        <div class="col-12 p-0  text-center">
                          @if (\Session::has('msg'))
                          <span class="text-success mt-2">{!! \Session::get('msg') !!}</span>
                          @endif
                        </div>
                        <div class="col-12 p-0 pr-2 mb-2 text-center mt-3">
                          <button class="btn bg text-white">Change Password</button>
                        </div>
                      </div>
                      
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
</div>
@endsection



{{-- @extends("Shop.Layouts.Master")
@section('Title', 'Change Password')
@section('Content')
<div class="container d-flex" style="padding-top: 60px;">
 <x-shop.layouts.side-bar/>
 <div class="px-3" style="width: calc(100% - 210px);">
  <div class="bg-white p-3" style="border-radius: 8px;">
    <p class="font-weight-bold">Change Password</p>
    <form method="post" action="{{url('kenh-cua-hang/doi-mat-khau')}}">
      @csrf
      <div class="row m-0">
        <div class="col-6 p-0 pr-2 mb-2">
          <label class="fz95">Password Now</label>
          <input type="text" name="passwordNow" class="form-control mr-2" required>
        </div>
        <div class="col-6 p-0 pl-2 mb-2">
          <label class="fz95">Password New</label>
          <input type="text" name="passwordNew" class="form-control mr-2" required>
        </div>
        <div class="col-6 p-0 pr-2 mb-2">
          <label class="fz95">Repassword</label>
          <input type="text" name="passwordNewRe" class="form-control mr-2" required>
        </div>  
        <div class="col-12 p-0  text-center">
            @if (\Session::has('msg'))
            <span class="text-success mt-2">{!! \Session::get('msg') !!}</span>
            @endif
        </div>
        <div class="col-12 p-0 pr-2 mb-2 text-center mt-3">
          <button class="btn bg text-white">Change Password</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection --}}
