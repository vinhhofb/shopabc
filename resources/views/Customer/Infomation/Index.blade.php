@extends("Customer.Layouts.Master")
@section('Title', 'Thông tin cá nhân')
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
                   <form action="{{url('thong-tin-ca-nhan')}}" method="post">
                    @csrf
                    <div class="bg-white p-3" style="border-radius: 8px;">
                      <p class="font-weight-bold my-3" style="font-size:120%">Basic information</p>
                      <div class="row m-0">
                        <div class="col-6 p-0 pr-2 mb-2">
                          <label class="fz95">Customer name</label>
                          <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control mr-2">
                        </div>
                        <div class="col-6 p-0 pl-2 mb-2">
                          <label class="fz95">Phone</label>
                          <input type="text" value="{{Auth::user()->phone}}" disabled  class="form-control mr-2">
                        </div>
                        <div class="col-6 p-0 pr-2 mb-2">
                          <label class="fz95">Email</label>
                          <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control mr-2">
                        </div>
                        <div class="col-6 p-0 pr-2 mb-2 pl-2">
                          <label class="fz95">Address</label>
                          <input type="text" value="{{Auth::user()->address}}" name="address" class="form-control mr-2">
                        </div>


                      </div>


                      <div class="text-center">
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













