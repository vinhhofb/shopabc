@extends("Admin.Layouts.Master")
@section('Title', 'Store Manage')
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
                         <h4 class="card-title float-left mt-2 mb-0">Store List</h4>
                         

                         <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>ID</th>
                              <th>Image</th>
                              <th>Store Name</th>
                              <th>Status</th>
                              <th>Method</th>
                            </thead>
                            <tbody>
                              @foreach($GetShops as $GetShop)
                              <tr>
                                <td>{{$GetShop->id}}</td>
                                <td>
                                  <img src="{{ asset("index/images/shops")."/".$GetShop->image}}" width="50px" height="50px">
                                </td>
                                <td>{{$GetShop->name}}</td>
                                <td>
                                  @if($GetShop->active == 1)
                                  Active
                                  @elseif($GetShop->active == 0)
                                  Hiden
                                  @endif
                                </td>
                                <td>
                                  <a href="{{url('admin/quan-ly-cua-hang/quan-ly-san-pham/xem-san-pham')."/".$GetShop->id}}">
                                    <button class="btn btn-primary mr-2">See Products</button>
                                  </a>
                                  {{--  <a href="{{url('admin/quan-ly-cua-hang/cua-hang/khoa-mo-cua-hang')."/".$GetShop->id}}"> --}}
                                    @if($GetShop->active == 1)
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetShop->id}}">Hiden</button>
                                    @elseif($GetShop->active == 0)
                                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalUnLock{{$GetShop->id}}">Show</button>
                                    @endif

                                  {{--  </a> --}}
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
                                     <p>When you lock Store {{$GetShop->name}}, {{$GetShop->name}} will be hidden from the homepage until you unlock it.</p>
                                   </div>
                                   <div class="p-2">
                                     <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                     <a  href="{{url('admin/quan-ly-cua-hang/khoa-mo-cua-hang/')."/".$GetShop->id}}">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Unlock Store</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>When Unlock {{$GetShop->name}}, {{$GetShop->name}} Will show back at home page.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                   <a  href="{{url('admin/quan-ly-cua-hang/khoa-mo-cua-hang/')."/".$GetShop->id}}">
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
  </div>
</div>
</div>
</div>   
</div>

@endsection







































