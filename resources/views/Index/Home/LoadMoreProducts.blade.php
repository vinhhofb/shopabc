
@forelse($GetProductRelates as $GetProductRelates)
@if(isset(Auth::user()->id))
<div class="col-6 col-sm-6 col-md-4 col-lg-3 p-1 mt-2 mb-0">
  <div class="product-discount-item bg-white cs w-100">
    <a href="{{url('chi-tiet-san-pham')."/".$GetProductRelates['id']."/".$GetProductRelates['slug']}}" style="color: black !important;">
      <img class="image-thumb" src="{{ asset("Index/images/products")."/".$GetProductRelates['image']}}" width="100%" height="170px" style="object-fit: contain;">
  </a>
  <div class="px-2">
      <a href="{{url('chi-tiet-san-pham')."/".$GetProductRelates['id']."/".$GetProductRelates['slug']}}" style="color: black !important;">
        <p class="fz95 hide-scroll mt-2 mb-0" style="height: 45px;overflow-y:hidden;">{{$GetProductRelates['name']}}</p>
    </a>
    
    <p class="float-left mb-0" style="font-size:80%;margin-top: 6px;opacity: 0.8;">Đã bán: {{$GetProductRelates['count_sale']}}</p>  
    <p class="tx ml-2 font-weight-bold float-right my-1">{{number_format($GetProductRelates['price'])}}đ</p>
    <div class="clboth"></div>
    @if(isset(Auth::user()->id))
    <button class="add-to-cart-button w-100 bg fz95 btn text-white" onclick="addToCart({{$GetProductRelates['id']}})"  style="border-radius: 0;">Thêm vào giỏ hàng</button>
    @else
    <a href="{{url('dang-nhap')}}">
        <button class="add-to-cart-button w-100 bg btn text-white"  style="border-radius: 0;">Thêm vào giỏ hàng</button>
    </a>
    @endif
</div>
</div>
</div>
@else
<div class="col-6 col-sm-6 col-md-4 col-lg-3 p-1 mt-2 mb-0">
  <div class="product-discount-item bg-white cs w-100">
    <a href="{{url('chi-tiet-san-pham')."/".$GetProductRelates->id."/".$GetProductRelates->slug}}" style="color: black !important;">
      <img class="image-thumb" src="{{ asset("Index/images/products")."/".$GetProductRelates->image}}" width="100%" height="170px" style="object-fit: contain;">
  </a>
  <div class="px-2">
      <a href="{{url('chi-tiet-san-pham')."/".$GetProductRelates->id."/".$GetProductRelates->slug}}" style="color: black !important;">
        <p class="fz95 hide-scroll mt-2 mb-0" style="height: 45px;overflow-y:hidden;">{{$GetProductRelates->name}}</p>
    </a>
    
    <p class="float-left mb-0" style="font-size:80%;margin-top: 6px;opacity: 0.8;">Đã bán: {{$GetProductRelates->count_sale}}</p>  
    <p class="tx ml-2 font-weight-bold float-right my-1">{{number_format($GetProductRelates->price)}}đ</p>
    <div class="clboth"></div>
    @if(isset(Auth::user()->id))
    <button class="add-to-cart-button w-100 bg fz95 btn text-white" onclick="addToCart({{$GetProductRelates->id}})"  style="border-radius: 0;">Thêm vào giỏ hàng</button>
    @else
    <a href="{{url('dang-nhap')}}">
        <button class="add-to-cart-button w-100 bg btn text-white"  style="border-radius: 0;">Thêm vào giỏ hàng</button>
    </a>
    @endif
</div>
</div>
</div>
@endif
@empty

@endforelse