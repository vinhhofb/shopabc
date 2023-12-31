@extends("Admin.Layouts.Master")
@section('Title', 'List shiper')
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
                           <h4 class="card-title float-left mb-0 mt-2">Shiper List</h4>
                           <div class="float-right"> 
                          <form method="get" action="{{url('admin/quan-ly-shiper/tim-kiem')}}">    
                            <div class="form-group" style="display: flex">                                   
                              <input type="text" class="form-control"  placeholder="Your phone" value="" name="keyword" required>
                              <button type="submit" class="btn btn-success ml-2">Search</button>

                            </div>
                          </form> 
                        </div>
                        <div style="clear: both;"></div>

                          <div class="table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                              <th>code</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Method</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$id = 1}}</p>
                             @foreach($GetShipers as $GetShiper)
                             <tr>
                              <td>{{$id++}}</td>

                              <td>
                                @if($GetShiper->name ==null)
                                Not update
                                @else
                                {{$GetShiper->name}}
                                @endif
                              </td>
                              <td>
                                @if($GetShiper->email ==null)
                                Not update
                                @else
                                {{$GetShiper->email}}
                                @endif
                              </td>
                              <td>{{$GetShiper->phone}}</td>

                              <td>
                                @if($GetShiper->active == 1)
                                Active
                                @elseif($GetShiper->active == 0)
                                Hiden
                                @endif
                              </td>
                              <td>
                                {{--   <button class="btn btn-success mr-2">Xem đơn</button> --}}
                                @if($GetShiper->active == 1)
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetShiper->id}}">Hiden</button>
                                @elseif($GetShiper->active == 0)
                                <button class="btn btn-success"  data-toggle="modal" data-target="#exampleModalUnLock{{$GetShiper->id}}">Unlock</button>
                                @endif                              
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$GetShiper->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lock shiper</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>When you lock {{$GetShiper->name}}, {{$GetShiper->name}} will not be able to log in and perform shiper functions.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                   <a  href="{{url('admin/quan-ly-shiper/khoa-mo-shiper')."/".$GetShiper->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Lock                    
                                    </button>
                                  </a>


                                  <div style="clear: both"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade mt-5" id="exampleModalUnLock{{$GetShiper->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Unlock Shiper</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>When Unlock {{$GetShiper->name}}, {{$GetShiper->name}} will be able to login and use shiper functions.</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                 <a  href="{{url('admin/quan-ly-shiper/khoa-mo-shiper')."/".$GetShiper->id}}">
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
                      {{ $GetShipers->links('pagination::bootstrap-4') }}
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












