<div class="mt-3 p-2" style="width: 100%;background: white;border-radius: 8px;">
  <p class="font-weight-bold" style="font-size: 95%">Nhóm hàng thường mua</p>
  <div class="row d-flex mx-0" style="margin-top:-20px">
    
    @foreach($GetTopSales as $GetTopSales)
    <div class="px-1 text-center pt-3 cs top-sale-item" style="width: 10%;">
      <img src="{{ asset("Index/images/top_sales")."/".$GetTopSales->image}}" width="100%" >
      <p style="font-size:80%" class="mb-0">{{$GetTopSales->name}}</p>
  </div>
  @endforeach
  
</div>
</div>