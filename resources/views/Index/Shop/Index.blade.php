@extends("Index.Layouts.Master")
@section('Title', 'Cửa hàng')
@section('Content')
<div class="container d-flex px-0" style="padding-top: 60px;">
  <div style="width: 210px;">
    <x-index.layouts.side-bar/>
  </div>
  <div class="px-3" style="width: calc(100% - 210px);">
    <div class="w-100 bg-white p-3 d-flex">
      <div class="mr-3" style="width: 150px;height: 150px;">
        <img src="{{ asset("Index/images/shops")."/".$getShop->image}}" width="100%" height="100%" >
      </div>
      <div style="width: calc(100% - 150px);">
        <span class="font-weight-bold tx ">{{$getShop->name}} - {{$getShop->phone}}</span><br>
        <span class="fz95">{{$getShop->content}}</span><br>
        <i class="fz95">{{$getShop->name_market}} - {{$getShop->name_city}}</i>
      </div>
      
    </div>
    <div class="mt-3 p-2 bg-white w-100" >
      <p class="font-weight-bold float-left fz95 mb-0" >Products of the store</p>
      
      <div style="clear: both;"></div>
      <div class="row d-flex mx-0 mb-0">
        @forelse($GetProduct as $item)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-1 mt-2 mb-0">

          <div class="product-discount-item bg-white cs w-100">
            <a href="{{url('chi-tiet-san-pham')."/".$item->id."/".$item->slug}}" style="color: black !important;">
              <img class="image-thumb" src="{{ asset("Index/images/products")."/".$item->image}}" width="100%" height="170px" style="object-fit: contain;">
            </a>
            <div class="px-2">
              <a href="{{url('chi-tiet-san-pham')."/".$item->id."/".$item->slug}}" style="color: black !important;">
                <p class="fz95  mt-2 mb-0 hide-scroll" style="height: 45px;overflow-y:hidden;">{{$item->name}}</p>
              </a>
              <p class="float-left mb-0" style="font-size:80%;margin-top: 6px;opacity: 0.8;">Selled: {{$item->count_sale}}</p>  
              <p class="tx ml-2 font-weight-bold float-right my-1">{{number_format($item->price)}}$</p>
              <div class="clboth"></div>
              @if(isset(Auth::user()->id))
              <button class=" w-100 bg fz95 btn text-white" onclick="addToCart({{$item->id}})"  style="border-radius: 0;">
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
      <div class="float-right mt-3 pr-2">
        {{ $GetProduct->links('pagination::bootstrap-4') }}
      </div>
      <div style="clear:both;"></div>
    </div>
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
  </div>
  @endsection
  @section('Style')

  @endsection
  @section('Script')

  <script>
    @if(count($errors) > 0)
    toastr.error("Vui lòng kiểm tra các trường");
    @endif
  </script>


  <script type="text/javascript">
    $('.set-active44').addClass('active');

  </script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" interity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('system/js/validate/validate.validate.js') }}"></script>

  @endsection
