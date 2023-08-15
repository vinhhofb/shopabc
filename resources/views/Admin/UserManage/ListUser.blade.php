@extends("Admin.Layouts.Master")
@section('Title', 'User list')
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
                         <h4 class="card-title float-left mb-0 mt-2">List of user accounts</h4>
                         <div class="float-right"> 
                          <form method="get" action="{{url('admin/quan-ly-nguoi-dung/tim-kiem')}}">    
                            <div class="form-group" style="display: flex">                                 
                              <input type="number" class="form-control"  placeholder="Your phone" name="keyword" required>
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
                              <th>Balance</th>
                              <th>Phone</th>
                              <th>Status</th>

                              <th>Method</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$id = 1}}</p>
                             @foreach($GetUsers as $GetUser)
                             <tr>
                              <td>{{$id++}}</td>

                              <td>
                                @if($GetUser->name ==null)
                                Not update
                                @else
                                {{$GetUser->name}}
                                @endif
                              </td>
                              <td>
                                {{number_format($GetUser->balance)}}$
                              </td>
                              <td>{{$GetUser->phone}}</td>

                              <td>
                                @if($GetUser->active == 1)
                                Active
                                @elseif($GetUser->active == 0)
                                Hiden
                                @endif
                              </td>
                              <td>

                                @if($GetUser->active == 1)
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetUser->id}}">Hiden</button>
                                @elseif($GetUser->active == 0)
                                <button class="btn btn-success"  data-toggle="modal" data-target="#exampleModalUnLock{{$GetUser->id}}">Unlock</button>
                                @endif                              
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$GetUser->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Block account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>When you lock {{$GetUser->name}}, {{$GetUser->name}} sẽ không thể đăng nhập và thực hiện các chức năng của người dùng.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                   <a  href="{{url('admin/quan-ly-nguoi-dung/khoa-mo-nguoi-dung')."/".$GetUser->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Lock                    
                                    </button>
                                  </a>


                                  <div style="clear: both"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade mt-5" id="exampleModalUnLock{{$GetUser->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Unlock user</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>When Unlock {{$GetUser->name}}, {{$GetUser->name}} will be able to login and use user functions.</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                 <a  href="{{url('admin/quan-ly-nguoi-dung/khoa-mo-nguoi-dung')."/".$GetUser->id}}">
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
                      {{ $GetUsers->links('pagination::bootstrap-4') }}
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






