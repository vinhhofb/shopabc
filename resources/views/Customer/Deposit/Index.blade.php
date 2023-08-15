@extends("Customer.Layouts.Master")
@section('Title', 'Deposit')
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
                    <div class="bg-white p-3">
                      
                      <p class="font-weight-bold my-3" style="font-size:120%">Deposit</p>
                      <form action="{{url('nap-tien')}}" id="create_form" method="post">
                        @csrf   
                        <div class="row m-0">
                          <div class="col-3 p-0 pr-2 mb-2 pr-3">
                            <div class="bg text-white p-2">
                              <p>Balance</p>
                              <p class="font-weight-bold float-right mb-0">{{number_format(Auth::user()->balance)}}đ</p>
                              <div class="clboth"></div>
                            </div>
                          </div>
                          <div class="col-6 p-0 pr-2 mb-2">
                            <label class="fz95">Deposit</label>
                            <div class="d-flex">
                              <input type="number" min="50000" max="5000000" name="amount" class="form-control mr-2" required>
                              <button class="btn bg text-white" style="width: 30%;">Deposit</button>
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

  </div>


  @endsection






















