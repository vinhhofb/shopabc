@extends("Shiper.Layouts.Master")
@section('Title', 'Thông tin cá nhân')
@section('Content')
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <x-shiper.layouts.header-dashboard/>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">

    </div>
    
    <div class="side-bar-box" style="width: 250px;">
      <x-shiper.layouts.side-bar/>
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
                    <form action="{{url('kenh-giao-hang/thong-tin-tai-khoan')}}" method="post">
                      @csrf
                      <div class="bg-white p-3">
                        <p class="font-weight-bold my-3" style="font-size:120%">Thông tin tài khoản</p>
                        <div class="row m-0">
                          <div class="col-12 col-md-6 p-0 pr-2 mb-2">
                            <label class="fz95">Tên người giao hàng</label>
                            <input type="text" value="{{Auth::user()->name}}"  class="form-control mr-2" disabled>
                          </div>
                          <div class="col-12 col-md-6 p-0 pl-2 mb-2">
                            <label class="fz95">Số điện thoại</label>
                            <input type="text" value="{{Auth::user()->phone}}" disabled  class="form-control mr-2" required>
                          </div>
                          <div class="col-12 col-md-6 p-0 pr-2 mb-2">
                            <label class="fz95">Email</label>
                            <input type="email" value="{{Auth::user()->email}}" name="email" type="email" class="form-control mr-2" required>
                          </div>
                          <div class="col-12 col-md-6 p-0 pl-2 mb-2">
                            <label class="fz95">Khu vực hoạt động</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="area" required>
                              @foreach($getCity as $getCity)
                              @if($getCity->id == Auth::user()->area)
                              <option value="{{$getCity->id}}" selected>{{$getCity->name}}</option>
                              @endif
                              @if($getCity->id != Auth::user()->area)
                              <option value="{{$getCity->id}}">{{$getCity->name}}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                        </div>

                      </div>


                      <div class="bg-white p-3" style="border-radius: 8px;">
                        <p class="font-weight-bold">Thông tin thanh toán</p>
                        <div class="row m-0">
                          <div class="col-12 col-md-6 p-0 pr-2 mb-2">
                            <label class="fz95">Số tài khoản</label>
                            <input type="text" value="{{Auth::user()->bank_code}}" name="bank_code" class="form-control mr-2" required>
                          </div>
                          <div class="col-12 col-md-6 p-0 pl-2 mb-2">
                            <label class="fz95">Chọn ngân hàng</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="bank_id" required>
                              @foreach($getBank as $getBank)
                              @if($getBank->id == Auth::user()->bank_id)
                              <option value="{{$getBank->id}}" selected>{{$getBank->name}}</option>
                              @endif
                              @if($getBank->id != Auth::user()->bank_id)
                              <option value="{{$getBank->id}}">{{$getBank->name}}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg text-white">Chỉnh sửa</button>
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









