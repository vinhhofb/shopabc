@extends("Index.Layouts.Master")
@section('Title', 'Search')
@section('Content')
<style type="text/css">
  @media only screen and (max-width: 400px) {

  .box-products{
    padding: 0 !important;
  }
  
  .col-6{
    padding: 0 !important;
  }
  .image-thumb{
    padding: 3px;
  }

}
</style>
<div class="container px-0 d-flex" style=" padding-top: 60px;">
  <div style="width: 210px;" class="sidebar-box">
    <x-index.layouts.side-bar/>
  </div>
  <div class="box-products px-3 content-box" style="width: calc(100% - 210px);">
    <div class="box-products p-2 bg-white w-100">
      <p class="font-weight-bold float-left fz95 mb-0 mr-2 mt-2" >Kết quả tìm kiếm</p>
      <p class="float-right mb-0" style="font-size: 95%"></p>
      <div style="clear: both;"></div>
      <div class="row d-flex mx-0 mb-0">
        @forelse($searchProduct as $searchProduct)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-1 mt-2 mb-0">

      <div class="product-discount-item bg-white cs w-100">
        <a href="{{url('chi-tiet-san-pham')."/".$searchProduct->id."/".$searchProduct->slug}}" style="color: black !important;">
        <img class="image-thumb" src="{{ asset("Index/images/products")."/".$searchProduct->image}}" width="100%" height="170px" style="object-fit: contain;">
      </a>
        <div class="px-2">
          <a href="{{url('chi-tiet-san-pham')."/".$searchProduct->id."/".$searchProduct->slug}}" style="color: black !important;">
            <p class="fz95 hide-scroll mt-2 mb-0" style="height: 45px;overflow-y:hidden;">{{$searchProduct->name}}</p>
          </a>
          <p class="float-left mb-0" style="font-size:80%;margin-top: 6px;opacity: 0.8;">Selled: {{$searchProduct->count_sale}}</p>  
          <p class="tx ml-2 font-weight-bold float-right my-1">{{number_format($searchProduct->price)}}$</p>
          <div class="clboth"></div>
          @if(isset(Auth::user()->id))
          <button class=" w-100 bg fz95 btn text-white" onclick="addToCart({{$searchProduct->id}})"  style="border-radius: 0;">
Add to cart</button>
          @else
          <a href="{{url('dang-nhap')}}">
            <button class="w-100 bg btn text-white"  style="border-radius: 0;">
Add to cart</button>
          </a>
          @endif
        </div>
      </div>
      
    </div>
        @empty
        <div class="pb-5" style="margin:auto;width: 350px;">
          <img src="../index/images/icons/empty.svg" width="100%">
          <p class="text-center font-weight-bold mt-3">Rất tiếc, chúng tôi không tìm thấy kết quả</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
  <script src="{{ asset('Index/js/side-bar.js')}}"></script>
  <script type="text/javascript">
    function addToCart($id_product){
      $.get("{{url('/them-vao-gio-hang')}}/"+$id_product, function(data, status){
        
      });
      $('#notification-add-to-cart').css('transition','0.2s')
      $('#notification-add-to-cart').css('right','0px')
      setTimeout(function(){
        $('#notification-add-to-cart').css('transition','0.2s')
        $('#notification-add-to-cart').css('right','-200px')
      }, 1200);
    }
  </script>
  @endsection
  
  @section('Script')



  @endsection
