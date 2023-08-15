@extends("Shop.Layouts.Master")
@section('Title', 'Information cá nhân')
@section('Content')
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <x-shop.layouts.header-dashboard/>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">

    </div>
    
    <div class="side-bar-box" style="width: 250px;">
      <x-shop.layouts.side-bar/>
    </div>

    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                <div>
                  <div>
                    <form  method="post" action="{{url('kenh-cua-hang/thong-tin-tai-khoan')}}">
                     @csrf
                     <div class="bg-white p-3">
                      <p class="font-weight-bold" style="font-size:120%">Basic information</p>
                      <div class="row m-0">
                        <div class="col-12 col-md-6 p-0 pr-2 mb-2 mt-3">
                          <label class="fz95">Store Name</label>
                          <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control mr-2">
                        </div>
                        <div class="col-12 col-md-6 p-0 pl-2 mb-2 mt-3">
                          <label class="fz95">Phone</label>
                          <input type="text" value="{{Auth::user()->phone}}" disabled  class="form-control mr-2">
                        </div>
                        <div class="col-12 col-md-6 p-0 pr-2 mb-2 mt-3">
                          <label class="fz95">Email</label>
                          <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control mr-2">
                        </div>
                        <div class="col-12 col-md-6 p-0 pl-2 mb-2 mt-3">
                          <label class="fz95">Image</label>
                          <input type="file" value="{{Auth::user()->email}}" name="avatar" class="form-control mr-2">
                        </div>
                        <div class="col-12 col-md-6 p-0 pr-2 mb-2 mt-3">
                          <label class="fz95">Banner</label>
                          <input type="file" value="{{Auth::user()->email}}" name="banner" class="form-control mr-2">
                        </div>
                      </div>
                      <div class="text-center mt-4">
                        <button type="submit" class="btn bg text-white">Change</button>
                        @if (\Session::has('msg'))
                        <span class="text-success mt-2">{!! \Session::get('msg') !!}</span>
                        @endif
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
