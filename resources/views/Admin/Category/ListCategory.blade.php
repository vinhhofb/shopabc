@extends("Admin.Layouts.Master")
@section('Title', 'Quản lý danh mục')
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
                          <h4 class="card-title float-left">Danh sách danh mục</h4>
                         <div class="float-right"> 
                           <a href="{{url("admin/quan-ly-danh-muc/them-danh-muc")}}">
                            <div class="btn btn-success">Thêm danh mục</div>
                          </a> 
                        </div>
                        <div style="clear: both;"></div>

                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>Stt</th>

                              <th>Tên danh mục</th>
                              <th>Thao tác</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$id = 1}}</p>
                             @foreach($Categorys as $Category)
                             <tr>
                              <td>{{$id++}}</td>
                              <td>{{$Category->name}}</td>
                              <td>                                        
                                <a href="{{url('admin/quan-ly-danh-muc/sua-danh-muc'."/".$Category->id)}}">
                                  <button class="btn btn-primary mr-2">Sửa</button> 
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$Category->id}}">Xóa</button>                                                                         
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$Category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>Khi bạn xóa danh mục {{$Category->name}}, All cả các cửa hàng có danh mục {{$Category->name}} sẽ bị xóa.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                   <a href="{{url('admin/quan-ly-danh-muc/xoa-danh-muc')."/".$Category->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Xóa                   
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
                                  <h5 class="modal-title" id="exampleModalLabel">Mở khóa người dùng</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>Khi bạn mở khóa {{$Category->name}}, {{$Category->name}} sẽ có thể đăng nhập và sử dụng các chức năng của người dùng.</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                 <a  href="{{url('admin/quan-ly-nguoi-dung/khoa-mo-nguoi-dung')."/".$Category->id}}">
                                  <button type="button" class="btn btn-success float-right mr-2">
                                    Mở khóa                    
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






























