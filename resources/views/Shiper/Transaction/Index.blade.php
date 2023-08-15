@extends("Shiper.Layouts.Master")
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
                   <div class="bg-white">
                    <div class="col-lg-12 grid-margin stretch-card p-0">
                      <div class="card">
                        <div class="card-body">
                          <p class="font-weight-bold float-left mt-3" style="font-size:120%">Transaction history</p>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Code</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Created</th>
                                </tr>
                              </thead>
                              <tbody>
                               @forelse($getPayment as $getPayment)
                               <tr>
                                <th scope="row">#{{$getPayment->id}}</th>
                                <td>{{$getPayment->name}}</td>
                                <td>
                                  @if($getPayment->type == 2)
                                  <span class="text-danger">Except for the account</span>
                                  @elseif($getPayment->type == 3)
                                  <span class="text-success">Add account</span>
                                  @endif
                                </td>
                                <td>{{number_format($getPayment->value)}}đ</td>
                                <td>
                                  @if($getPayment->type == 2)
                                  @if($getPayment->status == 0)
                                  <span class="text-warning">Pending</span>
                                  @elseif($getPayment->status == 1)
                                  <span class="text-success">Success</span>
                                  @endif
                                  @else
                                  <span class="text-success">Success</span>
                                  @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($getPayment->created_at)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y')}}</td>
                              </tr>
                              @empty
                              <span>No data yet</span>
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






