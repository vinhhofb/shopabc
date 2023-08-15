@extends("Admin.Layouts.Master")
@section('Title', 'Categories')
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
                          <h4 class="card-title float-left">Category List</h4>
                         <div class="float-right"> 
                           <a href="{{url("admin/quan-ly-danh-muc/them-danh-muc")}}">
                            <div class="btn btn-success">Add</div>
                          </a> 
                        </div>
                        <div style="clear: both;"></div>

                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>code</th>

                              <th>Name</th>
                              <th>Method</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$id = 1}}</p>
                             @foreach($Categorys as $Category)
                             <tr>
                              <td>{{$id++}}</td>
                              <td>{{$Category->name}}</td>
                              <td>                                        
                                <a href="{{url('admin/quan-ly-danh-muc/sua-danh-muc'."/".$Category->id)}}">
                                  <button class="btn btn-primary mr-2">Edit</button> 
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$Category->id}}">Delete</button>                                                                         
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$Category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>When delete category {{$Category->name}}, All stores with categories {{$Category->name}} Will delete</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                   <a href="{{url('admin/quan-ly-danh-muc/xoa-danh-muc')."/".$Category->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Delete                   
                                    </button>
                                  </a>


                                  <div style="clear: both"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade mt-5" id="exampleModalUnLock{{$Category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Unlock user</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>When Unlock {{$Category->name}}, {{$Category->name}} will be able to login and use user functions.</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                 <a  href="{{url('admin/quan-ly-nguoi-dung/khoa-mo-nguoi-dung')."/".$Category->id}}">
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
                      {{ $Categorys->links('pagination::bootstrap-4') }}
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






























