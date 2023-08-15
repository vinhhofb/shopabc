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
                           <p class="font-weight-bold float-left" style="font-size:120%">Danh sách sản phẩm</p>
                           <div class="float-right"> 
                             <div class="d-flex">
                               <a class="mr-2" href="{{url('kenh-cua-hang/quan-ly-cua-hang/them-san-pham')."/".$IdShop}}">
                                <div class="btn btn-success">Thêm cửa hàng</div>
                              </a>
                              
                            </div> 
                          </div>
                          <div style="clear: both;"></div>

                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>
                                    Mã
                                  </th>
                                  <th width="300px">
                                    Tên sản phẩm
                                  </th>
                                  <th>
                                    Ảnh
                                  </th>
                                  <th>
                                    Thông tin
                                  </th>
                                  <th>
                                    Trạng thái
                                  </th>
                                  <th>
                                    Thao tác
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($GetProductByShops as $GetProductByShop)
                                <tr>
                                  <td class="py-1">
                                    #{{$GetProductByShop->id}}
                                  </td>
                                  <td width="300px">
                                    <p>{{$GetProductByShop->name}}</p>
                                  </td>
                                  <td>
                                    @if($GetProductByShop->image)
                                    <img src="{{ asset("index/images/products")."/".$GetProductByShop->image}}" width="80px" height="50px">
                                    @else
                                    <img src="{{ asset("images/default.png")}}" width="80px" height="50px">
                                    @endif
                                  </td>
                                  <td width="20%">
                                    <p>{{number_format($GetProductByShop->price)}}đ / {{$GetProductByShop->unit}}</p>
                                    <p class="mt-2">Số lượng: {{$GetProductByShop->quanlity}}</p>
                                    <p class="mt-2">Đã bán: {{$GetProductByShop->count_sale}}</p>
                                    
                                  </td>
                                  <td width="15%">
                                    @if($GetProductByShop->active == 1)
                                    <p class="text-success">Đang hoạt động</p>
                                    @elseif($GetProductByShop->active == 0)
                                    <p class="text-danger">Tạm hết</p>
                                    @endif
                                  </td>
                                  <td>                                                                 
                                    @if($GetProductByShop->active == 1)
                                    <div class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetProductByShop->id}}">Tạm hết</div>
                                    @elseif($GetProductByShop->active == 0)
                                    <div class="btn btn-success" data-toggle="modal" data-target="#exampleModalUnLock{{$GetProductByShop->id}}">Hiển thị</div>
                                    @endif 
                                    <a href="">
                                      <div class="btn btn-primary mt-2">Giảm giá</div>   
                                    </a>
                                  </td>
                                </tr>
                                <div class="modal fade" id="exampleModalBlock{{$GetProductByShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tạm hết sản phẩm {{$GetProductByShop->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Khi bạn tạm hết sản phẩm "{{$GetProductByShop->name}}", "{{$GetProductByShop->name}}" sẽ bị ẩn khỏi trang chủ cho đến khi bạn mở lại.</p>
                                      </div>
                                      <div class="p-2">
                                       <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                       <a  href="{{url('kenh-cua-hang/quan-ly-cua-hang/khoa-mo-san-pham')."/".$GetProductByShop->id}}">
                                        <button type="button" class="btn btn-danger float-right mr-2">
                                          Đồng ý                 
                                        </button>
                                      </a>


                                      <div style="clear: both"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="modal fade" id="exampleModalUnLock{{$GetProductByShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Chuyển trạng thái sẵn hàng</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                     <p>Khi bạn mở trạng thái có sẵn sản phẩm {{$GetProductByShop->name}}, {{$GetProductByShop->name}} sẽ hiển thị trở lại tại trang chủ.</p>
                                   </div>
                                   <div class="p-2">
                                     <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                     <a  href="{{url('kenh-cua-hang/quan-ly-cua-hang/khoa-mo-san-pham')."/".$GetProductByShop->id}}">
                                      <button type="button" class="btn btn-success float-right mr-2">
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


