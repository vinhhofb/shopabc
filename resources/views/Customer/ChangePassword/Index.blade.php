@extends("Customer.Layouts.Master")
@section('Title', 'Đổi mật khẩu')
@section('Content')
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <x-customer.layouts.header-dashboard/>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">

    </div>
    
    <div class="side-bar-box" style="width: 250px;">
      <x-customer.layouts.side-bar/>
    </div>

    <!-- partial -->
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div>
                   <form method="post" action="{{route('customer.change-password.change-password-post')}}">
                    @csrf
                    <div class="bg-white p-3">
                      <p class="font-weight-bold my-3" style="font-size:120%">Đổi mật khẩu</p>
                      <div class="row m-0">
                        <div class="col-6 p-0 pr-2 mb-2">
                          <label class="fz95">Mật khẩu hiện tại</label>
                          <input type="password" name="passwordNow" class="form-control mr-2" required>
                        </div>
                        <div class="col-6 p-0 pl-2 mb-2">
                          <label class="fz95">Mật khẩu mới</label>
                          <input type="password" name="passwordNew" class="form-control mr-2" required>
                        </div>
                        <div class="col-6 p-0 pr-2 mb-2">
                          <label class="fz95">Nhập lại mật khẩu mới</label>
                          <input type="password" name="passwordNewRe" class="form-control mr-2" required>
                        </div>  
                        <div class="col-12 p-0  text-center">
                          @if (\Session::has('msg'))
                          <span class="text-success mt-2">{!! \Session::get('msg') !!}</span>
                          @endif
                        </div>
                        <div class="col-12 p-0 pr-2 mb-2 text-center mt-3">
                          <button class="btn bg text-white">Đổi mật khẩu</button>
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


















