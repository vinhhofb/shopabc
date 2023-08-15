@extends("Shiper.Layouts.Master")
@section('Title', 'Receive purchase order')
@section('Content')
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <x-shiper.layouts.header-dashboard/>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-shiper.layouts.side-bar/>
    </div>
    <!-- partial -->
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div>
                    <div class="bg-white p-4" style="min-height: 300px;">
                      <p class="font-weight-bold my-3" style="font-size:120%">Order pending</p>
                      <div class="container bg-white">
                        @php
                        $total=0;
                        @endphp
                        @forelse($getCart as $getCart)
                        <p>Code #{{$getCart->id}} - Created  {{\Carbon\Carbon::parse($getCart->created_at)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y h:i:s')}}</p>
                       
                        <div class="row m-0">
                          <div class="col-9">
                            @foreach($getShopCart as $getShopCart2)
                            @if($getShopCart2->cart_id == $getCart->id)
                            <table class="table">
                              <thead>
                                <p class="ml-3 tx font-weight-bold float-left">{{$getShopCart2->shop_name}} - </p>
                                <p class="mr-0 tx font-weight-bold float-left">&nbsp{{$getShopCart2->market_name}} -</p>
                                <p class="mr-3 tx font-weight-bold float-left">&nbsp{{$getShopCart2->phone}}</p>
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
                                  <td class="fz95 pt-4" width="25%">{{$getProductsCart2->name}}</td>
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
                            <div class="bg text-white p-2" style="border-radius: 8px;">
                              <p class="font-weight-bold mb-1">Order Information</p>
                              <div>
                                <p class="fz95 float-left font-weight-bold mb-1">Fee ship</p>
                                <p class="fz95 float-right mb-1">{{number_format($getCart->fee)}}đ</p>
                                <div class="clboth"></div>
                                <p class="fz95 float-left font-weight-bold mb-1">Total</p>
                                <p class="fz95 float-right mb-1">{{number_format($getCart->total+$getCart->fee)}}đ</p>
                                <div class="clboth"></div>
                                <div class="text-center">
                                  <a href="{{url('kenh-giao-hang/nhan-don')."/".$getCart->id}}">
                                    <button class="btn btn-light my-3">Receive purchase order</button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        @empty
                        <div class="pb-5" style="margin:auto;width: 350px;">
                          <img src="../index/images/icons/empty.svg" width="100%">
                          <p class="text-center font-weight-bold mt-3">Sorry, no orders yet</p>
                        </div>
                      </div>
                    </div></div>
                    @endforelse
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





















