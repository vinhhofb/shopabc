@extends("Customer.Layouts.Master")
@section('Title', 'Transaction history')
@section('Content')
<style type="text/css">
  @media only screen and (max-width: 900px) {
    td{
      white-space: nowrap;
    }
  }
</style>
<div class="container-scroller">
  <x-customer.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-customer.layouts.side-bar/>
    </div>
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div>

                   <div class="bg-white">

                    <div class="col-lg-12 grid-margin stretch-card p-0">
                      <div class="card">
                        <div class="card-body">
                          <p class="font-weight-bold float-left my-3" style="font-size:120%">Transaction history</p>



                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Code</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Created</th>
                                </tr>
                              </thead>
                              <tbody>
                               @forelse($getPayment as $getPayment)
                               <tr>
                                <th scope="row">#{{$getPayment->id}}</th>
                                <td>{{$getPayment->name}}</td>
                                <td>
                                  @if($getPayment->type == 0)
                                  <span class="text-danger">Trừ tài khoản</span>
                                  @elseif($getPayment->type == 1)
                                  <span class="text-success">Cộng tài khoản</span>
                                  @endif
                                </td>
                                <td>{{number_format($getPayment->value)}}đ</td>
                                <td>{{\Carbon\Carbon::parse($getPayment->created_at)->format('d/m/Y')}}</td>
                              </tr>
                              @empty
                              <span>Chưa có dữ liệu</span>
                              @endforelse

                            </tbody>
                          </table>
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
</div>   
</div>

@endsection










