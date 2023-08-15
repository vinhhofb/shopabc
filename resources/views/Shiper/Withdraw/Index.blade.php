@extends("Shiper.Layouts.Master")
@section('Title', 'Withdraw')
@section('Content')
<div class="container-scroller">
  <x-shiper.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-shiper.layouts.side-bar/>
    </div>
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div>
                    <form action="{{url('kenh-giao-hang/rut-tien')}}" id="create_form" method="post">
                      @csrf  
                      <div class="bg-white p-3">
                        <p class="font-weight-bold my-3" style="font-size:120%">Withdraw</p> 
                        <div class="row m-0">
                          <div class="col-3 p-0 pr-2 mb-2 pr-3">
                            <div class="bg text-white p-2">
                              <p>Balance</p>
                              <p class="font-weight-bold float-right mb-0">{{number_format(Auth::user()->balance)}}$</p>
                              <div class="clboth"></div>
                            </div>
                          </div>
                          <div class="col-6 p-0 pr-2 mb-2">
                            <label class="fz95">Enter the amount to withdraw</label>
                            <div class="d-flex">
                              <input type="number" name="amount" min="50000" max="{{Auth::user()->balance}}" class="form-control mr-2" required>
                              <button class="btn bg text-white" style="width: 30%;">OK</button>
                            </div>
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
  <script src="{{ asset('index/js/jquery-3.6.0.js') }}" ></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#withdraw-active").addClass("active");
    });
  </script>
  @endsection












