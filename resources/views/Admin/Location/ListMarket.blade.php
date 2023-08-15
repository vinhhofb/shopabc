@extends("Admin.Layouts.Master")
@section('Title', 'Quản lý chợ')
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
                         <h4 class="card-title float-left mt-2 mb-0">Danh sách chợ</h4>
                         <div class="float-right">
                          <a href="{{url('admin/quan-ly-dia-diem/them-cho')."/".$IdCity}}">
                            <button type="submit" class="btn btn-success ml-2">Thêm chợ</button>
                          </a>
                        </div>
                        <div style="clear: both;"></div>

                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>Stt</th>
                              <th>Hình đại diện</th>
                              <th>Tên chợ</th>
                              {{--        <th>Address</th> --}}
                              <th>Thao tác</th>
                            </thead>
                            <tbody>
                             <p style="display: none">{{$id = 1}}</p>
                             @foreach($GetMarketByCitys as $GetMarketByCity)
                             <tr>
                              <td>{{$id++}}</td>

                              <td>

                                @if($GetMarketByCity->image != null)
                                <img src="{{ asset("index/images/markets")."/".$GetMarketByCity->image}}" width="80px" height="50px">
                                @else
                                <img src="{{ asset("index/images/markets/default.png")}}" width="80px" height="50px">

                                @endif
                              </td>
                              <td>{{$GetMarketByCity->name}}</td>

                              {{--  <td>{{$GetMarketByCity->address}}</td> --}}

                              <td>
                                <a href="{{url('admin/quan-ly-dia-diem/xem-cua-hang'."/".$GetMarketByCity->id)}}">
                                  <button class="btn btn-success mr-2">See store</button> 
                                </a>
                                <a href="{{url('admin/quan-ly-dia-diem/sua-cho'."/".$GetMarketByCity->id)}}">
                                  <button class="btn btn-primary mr-2">Sửa</button> 
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetMarketByCity->id}}">Xóa</button>                                                                         
                              </td>
                            </tr>
                            <div class="modal fade mt-5" id="exampleModalBlock{{$GetMarketByCity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa thành phố</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>Khi bạn xóa {{$GetMarketByCity->name}}, All cả dữ liệu bao gồm shop, sản phẩm bên trong {{$GetMarketByCity->name}} sẽ bị xóa.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                   <a href="{{url('admin/quan-ly-dia-diem/xoa-cho')."/".$GetMarketByCity->id}}">
                                    <button type="button" class="btn btn-danger float-right mr-2">
                                      Xóa                   
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
                        {{ $GetMarketByCitys->links('pagination::bootstrap-4') }}
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































