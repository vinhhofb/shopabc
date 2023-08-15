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
                              <input type="text" class="form-control"  placeholder="Your phone" value="" name="keyword" required>
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
                              <th>Phone</th>
                              <th>Status</th>
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
                                @if($GetShiper->check == null)
                                Chưa nhận diện
                                @else
                                Đã nhận diện
                                @endif
                              </td>
                              <td>
                                @if($GetShiper->check != null)
                                <a href="{{url('admin/nhan-dien-guong-mat/xem-du-lieu')."/".$GetShiper->id}}">
                                  <button class="btn btn-success mr-2">Xem dữ liệu</button>
                                </a>
                                <a href="{{url('admin/nhan-dien-guong-mat/nhan-dien-lai')."/".$GetShiper->id}}">
                                  <button class="btn btn-danger">Yêu cầu lại</button>
                                </a>
                                @endif
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalFace{{$GetShiper->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yêu cầu nhận diện lại</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>Bạn muốn yêu cầu tài xế {{$GetShiper->name}} nhận diện lại khuôn mặt?</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                   <a  href="{{url('admin/nhan-dien-guong-mat/nhan-dien-lai')."/".$GetShiper->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Đồng ý                    
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












