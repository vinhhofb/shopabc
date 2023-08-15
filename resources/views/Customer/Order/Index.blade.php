@extends("Customer.Layouts.Master")
@section('Title', 'Order Information')
@section('Content')
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <x-customer.layouts.header-dashboard/>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">

    </div>
    
    <div class="side-bar-box" style="width: 250px;">
      <x-customer.layouts.side-bar/>
    </div>

    <!-- partial -->
     <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div class="bg-white p-3">
                  <p class="font-weight-bold my-3" style="font-size:120%">Manage Order</p>
                  @php
                  $total=0;
                  @endphp
                  @forelse($getCart as $getCart)
                  <p>Code #{{$getCart->id}} - Created {{\Carbon\Carbon::parse($getCart->created_at)->format('d/m/Y')}}</p>
                  <div class="row m-0">
                    <div class="col-9">
                      @foreach($getShopCart as $getShopCart2)
                      @if($getShopCart2->cart_id == $getCart->id)
                      <table class="table">
                        <thead>
                          <p class="ml-3 tx font-weight-bold float-left">{{$getShopCart2->shop_name}} - </p>
                          <p class="mr-3 tx font-weight-bold float-left">&nbsp{{$getShopCart2->market_name}}</p>
                          <div class="clboth"></div>
                        </thead>
                        <tbody>
                          @foreach($getProductsCart as $getProductsCart2)
                          @if($getShopCart2->shop_id == $getProductsCart2->shop_id && $getProductsCart2->cart_id == $getCart->id)
                          <tr>
                            <td width="8%">
                              <div class="text-center" style="width: 40px;height: 40px;">
                                <img src="{{ asset("Index/images/products")."/".$getProductsCart2->image}}" width="100%" height="100%" style="border-radius: 4px;">
                              </div>
                            </td>
                            <td class="fz95 pt-4" width="25%" style="line-height: 20px">{{$getProductsCart2->name}}</td>
                            <td width="18%" class="pt-4">{{number_format($getProductsCart2->price)}}$</td>

                            <td width="12%" class="pt-4">{{number_format($getProductsCart2->quanlity)}}</td>

                            <td width="15%" class="tx font-weight-bold pt-4">{{number_format($getProductsCart2->price*$getProductsCart2->quanlity)}}đ</td>
                          </tr>
                          @php
                          $total+=$getProductsCart2->price*$getProductsCart2->quanlity;
                          @endphp
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-3 p-0">
                      <div class="bg text-white p-2" style="border-radius: 8px;height: 100%;">
                        <p class="font-weight-bold mb-1">Order Information</p>
                        @if($getCart->shiper_id !=null && $getCart->status !=3) 
                        <div class="w-100 mb-3 bg-white p-2" style="width: 100%;border-radius: 8px;">
                          <div class="rounded-circle" style="margin:auto;width: 70px;height: 70px;">
                            <img class="rounded-circle" src="{{ asset("images/avatars/default.jpg")}}" width="100%" height="100%" style="border:3px solid #e03" >
                          </div>
                          <div class="text-center ">
                            <p class="mb-0 mt-2 font-weight-bold" style="color:black">Shiper 1</p>
                            <p class="tx">0799438990</p>
                            <a href="{{url('tro-chuyen')."/".$getCart->shiper_id}}">
                              <button class="btn text-white bg"><i class="fa fa-comment mr-2" aria-hidden="true"></i>CHat ngay</button>
                            </a>
                          </div>
                        </div>
                        @endif
                        <div>
                          <p class="fz95 float-left font-weight-bold mb-1">Status</p>
                          <p class="fz95 float-right mb-1">
                            @if($getCart->shiper_id ==null && $getCart->status ==1) 
                            Tìm người giao
                            @elseif($getCart->shiper_id !=null && $getCart->status ==1)
                            Đang Shiper
                            @endif
                            @if($getCart->status ==3) 
                            Đã Shiper
                            @endif
                          </p>
                          <div class="clboth"></div>
                          <p class="fz95 float-left font-weight-bold mb-1">Fee ship</p>
                          <p class="fz95 float-right mb-1">{{number_format($getCart->fee)}}đ</p>
                          <div class="clboth"></div>
                          <p class="fz95 float-left font-weight-bold mb-1">Discount</p>
                          <p class="fz95 float-right mb-1">{{$getConfig[1]->value}}%</p>
                          <div class="clboth"></div>
                          <p class="fz95 float-left font-weight-bold mb-1">TAX</p>
                          <p class="fz95 float-right mb-1">{{$getConfig[0]->value}}%</p>
                          <div class="clboth"></div>
                          <p class="fz95 float-left font-weight-bold mb-1">Total</p>
                          <p class="fz95 float-right mb-1">{{number_format($getCart->total+$getCart->fee)}}đ</p>
                          <div class="clboth"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  @empty
                </div>
              </div>
            </div>
            @endforelse
          </div>

        </div>
      </div>
    </div>




  </div>

</div>

</div>   

</div>


@endsection





















