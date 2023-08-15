@extends("Admin.Layouts.Master")
@section('Title', 'Thiết lập')
@section('Content')
<div class="container-scroller">
  <x-admin.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-admin.layouts.side-bar/>
    </div>
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div class="bg-white p-4">
                    <h4 class="mb-4 mt-2">Thiết lập</h4>
                    <form method="post" action="{{url('admin/thiet-lap')}}">
                      @csrf
                      <div class="row m-0">
                        <div class="col-6 p-0 pr-2 mb-2">
                          <label class="fz95">TAX(%)</label>
                          <input type="text" name="vat" class="form-control mr-2" value="{{$config[0]->value}}" required>
                        </div>
                        {{-- <div class="col-6 p-0 pl-2 mb-2">
                          <label class="fz95">Giảm giá(%)</label>
                          <input type="text" name="discount" class="form-control mr-2" value="{{$config[1]->value}}" required>
                        </div> --}}
                        <div class="col-6 p-0 pr-2 mb-2">
                          <label class="fz95">Chiết khấu(%)</label>
                          <input type="text" name="feeship" class="form-control mr-2" value="{{$config[2]->value}}" required>
                        </div>  
                        <div class="col-12 p-0  text-center">
                          @if (\Session::has('msg'))
                          <span class="text-success mt-2">{!! \Session::get('msg') !!}</span>
                          @endif
                        </div>
                        <div class="col-12 p-0 pr-2 mb-2 text-center mt-3">
                          <button class="btn bg text-white">Thay đổi</button>
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











  