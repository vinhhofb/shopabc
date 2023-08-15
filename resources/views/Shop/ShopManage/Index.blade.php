@extends("Shop.Layouts.Master")
@section('Title', 'Danh sách sản phẩm')
@section('Content')
<style type="text/css">
  @media only screen and (max-width: 900px) {
    td{
      white-space: nowrap;
    }
  }
</style>
<div class="container-scroller">
  <x-shop.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-shop.layouts.side-bar/>
    </div>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                <div>
                  <div>
                    
                     <div class="bg-white">

                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                           <p class="font-weight-bold float-left" style="font-size:120%">Danh sách cửa hàng</p>
                           <div class="float-right"> 
                           <div class="d-flex">
                             <a class="mr-2" href="{{url("kenh-cua-hang/quan-ly-cua-hang/them-cua-hang")}}">
                              <div class="btn btn-success">Thêm cửa hàng</div>
                            </a>
                            
                          </div> 
                        </div>
                        <div style="clear: both;"></div>

                           <div class="table-responsive">
                             <table class="table">
                              <thead>
                                <tr>
                                  <th width="5%">ID</th>
                                  <th width="15%">Hình đại diện</th>
                                  <th>Tên cửa hàng</th>

                                  <th width="18%">Status</th>

                                  <th width="25%">Thao tác</th>
                                </tr>
                              </thead>
                              <tbody>
                               <p style="display: none">{{$id = 1}}</p>
                               @foreach($GetShops as $GetShop)
                               <tr>
                                <td>{{$GetShop->id}}</td>
                                <td>
                                  @if($GetShop->image)
                                  <img src="{{ asset("index/images/shops")."/".$GetShop->image}}" width="80px" height="50px">
                                  @else
                                  <img src="{{ asset("images/default.png")}}" width="80px" height="50px">

                                  @endif
                                </td>
                                <td>{{$GetShop->name}}</td>
                           
                                <td>
                                  @if($GetShop->active == 1)
                                  Đang hoạt động
                                  @elseif($GetShop->active == 0)
                                  Tạm khóa
                                  @endif
                                </td>
                                <td>
                                  <a href="{{url('kenh-cua-hang/quan-ly-cua-hang/san-pham')."/".$GetShop->id}}">
                                    <div class="btn btn-success mr-2 ">Xem sản phẩm</div>
                                  </a>
                                  <a href="{{url('kenh-cua-hang/quan-ly-cua-hang/sua-cua-hang')."/".$GetShop->id}}">
                                    <div class="btn btn-success mr-2">Sửa</div>
                                  </a>
                                  @if($GetShop->active == 1)
                                  <div class="btn btn-danger mt-2" data-toggle="modal" data-target="#exampleModalBlock{{$GetShop->id}}">Tạm khóa</div>
                                  @elseif($GetShop->active == 0)
                                  <div class="btn btn-success mt-2"  data-toggle="modal" data-target="#exampleModalUnLock{{$GetShop->id}}">Mở khóa</div>
                                  @endif                              
                                </td>
                              </tr>
                              <div class="modal fade" id="exampleModalBlock{{$GetShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Khóa cửa hàng của bạn</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                     <p>Khi bạn khóa cửa hàng {{$GetShop->name}},cửa hàng {{$GetShop->name}} sẽ không được hiển thị trên hệ thống.</p>
                                   </div>
                                   <div class="p-2">
                                     <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                     <a  href="{{url('/kenh-cua-hang/quan-ly-cua-hang/khoa-mo-cua-hang')."/".$GetShop->id}}">
                                      <button type="button" class="btn btn-danger float-right mr-2">
                                        Khóa                    
                                      </button>
                                    </a>


                                    <div style="clear: both"></div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="exampleModalUnLock{{$GetShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mở khóa người dùng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>Khi bạn mở khóa tài khoản cửa hàng {{$GetShop->name}}, {{$GetShop->name}} sẽ có thể đăng nhập và sử dụng các chức năng của một cửa hàng.</p>
                                 </div>
                                 <div class="p-2">
                                   <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                   <a  href="{{url('/kenh-cua-hang/quan-ly-cua-hang/khoa-mo-cua-hang')."/".$GetShop->id}}">
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


