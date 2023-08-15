@extends("Admin.Layouts.Master")
@section('Title', 'Payment Manage')
@section('Content')
<style type="text/css">
  @media only screen and (max-width: 900px) {
    td{
      white-space: nowrap;
    }
  }
</style>
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
                  <div>

                   <div class="bg-white">

                    <div class="col-lg-12 grid-margin stretch-card p-0">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title float-left">Payment List</h4>
                          <p class="float-right mt-2">Balance: {{number_format(Auth::user()->balance)}}$</p>
                          <div style="clear:both;"></div>
                          <div class="table-responsive">
                            <table class="table table-hover table-striped">
                              <thead>
                                <th>code</th>
                                <th width="25%">Information</th>
                                <th>Withraw</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Method</th>
                              </thead>
                              <tbody>
                               <p style="display: none">{{$id = 1}}</p>
                               @foreach($GetPayment as $Payment)
                               <tr>
                                <td>{{$id++}}</td>

                                <td>
                                  
                                  - {{$Payment->name}}
                                  <br>
                                  - Phone: {{$Payment->phone}}
                                  <br>
                                  - Bank number: {{$Payment->bank_code}}
                                  <br>
                                  - Bank: {{$Payment->bank_name}}
                                </td>
                                <td>
                                  {{number_format($Payment->value)}}$
                                </td>
                                <td>{{\Carbon\Carbon::parse($Payment->created_at)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y')}}</td>

                                <td>
                                  @if($Payment->status == 0)
                                  <span class="text-warning">Pending</span>
                                  @elseif($Payment->status == 1)
                                  <span class="text-success">Success</span>
                                  @endif
                                </td>
                                <td>
                                 @if($Payment->status == 0)
                                 <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$Payment->id}}">Success</button>    
                                 @endif                         
                               </td>
                             </tr>
                             <div class="modal fade mt-5" id="exampleModalBlock{{$Payment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Block account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>You sended {{number_format($Payment->value)}} for shiper{{$Payment->name}}?</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                   <a  href="{{url('admin/quan-ly-thanh-toan/da-chuyen-tien')."/".$Payment->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      OK                   
                                    </button>
                                  </a>
                                  <div style="clear: both"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach


                        </tbody>
                      </table>
                      <div class="float-right pr-3">
                        {{ $GetPayment->links('pagination::bootstrap-4') }}
                      </div>
                      <div style="clear: both"></div>
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






