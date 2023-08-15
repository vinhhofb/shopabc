@extends("Customer.Layouts.Master")
@section('Title', 'CHat')
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
                    <div class="bg-white">
                      <div class="container">
                       <div class="" style="width: calc(100% - 210px);">
                        <div class="bg-white p-3" style="border-radius: 8px;">
                          <p class="font-weight-bold">CHat</p>
                          <iframe src="http://marketonline2.com/chatify/{{$user_id}}" style="height:500px;width: 100%;border:0;"></iframe>
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

    </div>   

  </div>


  @endsection



























