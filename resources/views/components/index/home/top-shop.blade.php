<div class="mt-3 p-2 bg w-100" >
  <p class="font-weight-bold text-white float-left fz95 mb-0" >Cửa hàng đề xuất</p>
  <a href="{{url('tat-ca-cua-hang')}}">
  <p class="text-white float-right mb-0" style="font-size: 95%">Xem thêm</p>
  </a>
  <div style="clear: both;"></div>
  <div class="row d-flex mx-0 mb-0">
    @forelse($GetTopShops as $GetTopShops)
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-1 mt-2 mb-0">
      <div class="product-discount-item bg-white cs p-1" style="width: 100%;">
        <img src="{{ asset("Index/images/shops")."/".$GetTopShops->image}}" width="100%" height="170px">
        <p class="fz95 mx-2 mt-2 mb-2 font-weight-bold" style="height: 20px;overflow-y:hidden;">{{$GetTopShops->name}}</p>
        <p class="fz95 mx-2 mt-2 mb-1" style="font-size:80%;height: 38px;overflow-y:hidden;">{{$GetTopShops->content}}</p>
        <div class="px-2 mb-1">
          <p class="" style="font-size: 80%;height: 38px;overflow-y:hidden;"><i class="fa fa-location-arrow tx" aria-hidden="true"></i> {{$GetTopShops->name_market}}-{{$GetTopShops->name_city}}</p>
        </div>
        
       {{--  <p class="tx mx-2 font-weight-bold text-center mx-1">Lượt đặt hàng: {{$GetTopShops->count_sale}}</p> --}}
      
        <div class="px-0">
          <a href="{{url('cua-hang')."/".$GetTopShops->id}}">
          <button class="w-100 bg btn text-white" style="border-radius: 0;">Xem cửa hàng</button>
          </a>
        </div>

      </div>
    </div>
    @empty
        <div class="pb-5" style="margin:auto;width: 350px;">
          <img src="../index/images/icons/empty.svg" width="100%">
          <p class="text-center font-weight-bold mt-3 text-white">Rất tiếc, chưa có dữ liệu.</p>
        </div>
    @endforelse
  </div>
</div>