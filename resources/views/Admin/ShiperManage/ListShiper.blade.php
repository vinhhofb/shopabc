@extends("Admin.Layouts.Master")
@section('Title', 'Danh sách shiper')
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
                           <h4 class="card-title float-left mb-0 mt-2">Danh sách tài khoản shiper</h4>
                           <div class="float-right"> 
                          <form method="get" action="{{url('admin/quan-ly-shiper/tim-kiem')}}">    
                            <div class="form-group" style="display: flex">                                   
                              <input type="text" class="form-control"  placeholder="Nhập số điện thoại" value="" name="keyword" required>
                              <button type="submit" class="btn btn-success ml-2">Tìm</button>

                            </div>
                          </form> 
                        </div>
                        <div style="clear: both;"></div>

                          <div class="table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                              <th>Stt</th>
                              <th>Tên người dùng</th>
                              <th>Email</th>
                              <th>Số điện thoại</th>
                              <th>Trạng thái</th>
                              <th>Thao tác</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$id = 1}}</p>
                             @foreach($GetShipers as $GetShiper)
                             <tr>
                              <td>{{$id++}}</td>

                              <td>
                                @if($GetShiper->name ==null)
                                Chưa cập nhật
                                @else
                                {{$GetShiper->name}}
                                @endif
                              </td>
                              <td>
                                @if($GetShiper->email ==null)
                                Chưa cập nhật
                                @else
                                {{$GetShiper->email}}
                                @endif
                              </td>
                              <td>{{$GetShiper->phone}}</td>

                              <td>
                                @if($GetShiper->active == 1)
                                Đang hoạt động
                                @elseif($GetShiper->active == 0)
                                Tạm khóa
                                @endif
                              </td>
                              <td>
                                {{--   <button class="btn btn-success mr-2">Xem đơn</button> --}}
                                @if($GetShiper->active == 1)
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetShiper->id}}">Tạm khóa</button>
                                @elseif($GetShiper->active == 0)
                                <button class="btn btn-success"  data-toggle="modal" data-target="#exampleModalUnLock{{$GetShiper->id}}">Mở khóa</button>
                                @endif                              
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$GetShiper->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Khóa shiper</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>Khi bạn khóa {{$GetShiper->name}}, {{$GetShiper->name}} sẽ không thể đăng nhập và thực hiện các chức năng của shiper.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                   <a  href="{{url('admin/quan-ly-shiper/khoa-mo-shiper')."/".$GetShiper->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Khóa                    
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
                                  <h5 class="modal-title" id="exampleModalLabel">Mở khóa Shiper</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>Khi bạn mở khóa {{$GetShiper->name}}, {{$GetShiper->name}} sẽ có thể đăng nhập và sử dụng các chức năng của shiper.</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                 <a  href="{{url('admin/quan-ly-shiper/khoa-mo-shiper')."/".$GetShiper->id}}">
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












