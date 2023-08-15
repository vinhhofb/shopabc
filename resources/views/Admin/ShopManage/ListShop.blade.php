@extends("Admin.Layouts.Master")
@section('Title', 'Store List')
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
                         <h4 class="card-title float-left">Store List</h4>
                        {{--  <div class="float-right"> 
                          <form method="get" action="{{url('admin/quan-ly-nguoi-dung/tim-kiem')}}">    
                            <div class="form-group" style="display: flex">                           
                              <input type="number" class="form-control"  placeholder="Your phone" name="keyword">
                              <button type="submit" class="btn btn-success ml-2">Search</button>
                            </div>
                          </form> 
                        </div>
                        <div style="clear: both;"></div> --}}
                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>code</th>
                              <th width="20%">Username</th>
                              <th width="17%">Email</th>
                              <th width="17%">Phone</th>
                              <th width="17%">Status</th>
                              <th>Method</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$idup = 1}}</p>
                             @foreach($GetShops as $GetShop)
                             <tr>
                              <td>{{$idup++}}</td>
                              <td>
                                @if($GetShop->name ==null)
                                Not update
                                @else
                                {{$GetShop->name}}
                                @endif
                              </td>
                              <td>
                                @if($GetShop->email ==null)
                                Not update
                                @else
                                {{$GetShop->email}}
                                @endif
                              </td>
                              <td>{{$GetShop->phone}}</td>

                              <td>
                                @if($GetShop->active == 1)
                                Active
                                @elseif($GetShop->active == 0)
                                Hiden
                                @endif
                              </td>
                              <td>
                                <a href="{{url('admin/quan-ly-cua-hang/xem-tat-ca-cua-hang')."/".$GetShop->id}}">
                                  <button class="btn btn-success mr-2 mb-2">See store</button>
                                </a>
                                @if($GetShop->active == 1)
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetShop->id}}">Hiden</button>
                                @elseif($GetShop->active == 0)
                                <button class="btn btn-success"  data-toggle="modal" data-target="#exampleModalUnLock{{$GetShop->id}}">Unlock</button>
                                @endif                              
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$GetShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lock Store</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>When you Lock Store {{$GetShop->name}}, {{$GetShop->name}} will not be able to log in and perform Store functions.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                   <a  href="{{url('admin/quan-ly-cua-hang/khoa-mo-tai-khoan-cua-hang')."/".$GetShop->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Lock                    
                                    </button>
                                  </a>


                                  <div style="clear: both"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade mt-5" id="exampleModalUnLock{{$GetShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Unlock user</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>When UnLock Store {{$GetShop->name}}, {{$GetShop->name}} will be able to log in and use the functions of a Store.</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                 <a  href="{{url('admin/quan-ly-cua-hang/khoa-mo-tai-khoan-cua-hang')."/".$GetShop->id}}">
                                  <button type="button" class="btn btn-success float-right mr-2">
                                    Unlock                    
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
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="float-right pr-3">
           {{ $GetShops->links('pagination::bootstrap-4') }}
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

@endsection











