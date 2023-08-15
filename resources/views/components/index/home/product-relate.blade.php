<style type="text/css">
  @media only screen and (max-width: 400px) {

    .box-products-relate{
      padding: 0 !important;
    }

    .col-6{
      padding: 0 !important;
    }
    .image-thumb{
      padding: 3px;
    }
    .text-relate{
      margin-left: 5px;
      margin-top: 5px;
    }
    .add-to-cart-button{
      font-size: 80% !important;
    }
  }
</style>
<div class="box-products-relate mt-3 p-2 bg-white w-100">
  <p class="text-relate font-weight-bold float-left fz95 mb-0" >Đề xuất cho bạn</p>
  <p class="float-right mb-0" style="font-size: 95%"></p>
  <div style="clear: both;"></div>
  <div class="row mx-0 mb-0" id="append-data-load-more">
    @forelse($GetProductRelates as $GetProductRelate)
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-1 mt-2 mb-0">

      <div class="product-discount-item bg-white cs w-100">
        <a href="{{url('chi-tiet-san-pham')."/".$GetProductRelate->id."/".$GetProductRelate->slug}}" style="color: black !important;">
          <img class="image-thumb" src="{{ asset("Index/images/products")."/".$GetProductRelate->image}}" width="100%" height="170px" style="object-fit: contain;">
        </a>
        <div class="px-2">
          <a href="{{url('chi-tiet-san-pham')."/".$GetProductRelate->id."/".$GetProductRelate->slug}}" style="color: black !important;">
            <p class="fz95 hide-scroll mt-2 mb-0" style="height: 45px;overflow-y:hidden;">{{$GetProductRelate->name}}</p>
          </a>
          
          <p class="float-left mb-0" style="font-size:80%;margin-top: 6px;opacity: 0.8;">Selled: {{$GetProductRelate->count_sale}}</p>  
          <p class="tx ml-2 font-weight-bold float-right my-1">{{number_format($GetProductRelate->price)}}$</p>
          <div class="clboth"></div>
          @if(isset(Auth::user()->id))
          <button class="add-to-cart-button w-100 bg fz95 btn text-white" onclick="addToCart({{$GetProductRelate->id}})"  style="border-radius: 0;">
Add to cart</button>
          @else
          <a href="{{url('dang-nhap')}}">
            <button class="add-to-cart-button w-100 bg btn text-white"  style="border-radius: 0;">
Add to cart</button>
          </a>
          @endif
        </div>
      </div>
      
    </div>
    
    @empty
    <div class="pb-5" style="margin:auto;width: 350px;">
      <img src="../index/images/icons/empty.svg" width="100%">
      <p class="text-center font-weight-bold mt-3">Rất tiếc, chưa có dữ liệu</p>
    </div>
    @endforelse
  </div>

  <div class="clboth"></div>
  <div class="p-2 mt-3">
    <div class="w-100 text-center p-2" style="background-color:#fb97ad">
      <p id="loading" class="text-white mb-0">Đang tải</p>
    </div>
  </div>
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
  var page =2;
  var checkLoad = false;
  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()-400){
      if(checkLoad == false){
        checkLoad = true;
        $.get("{{url('/xem-them')}}?page="+page, function(data, status){
          console.log(data)
          if(data.html !=""){
            $('#append-data-load-more').append(data.html)
            page++;
            checkLoad=false;
          }else{
            $('#loading').text('Hết');
          }
        });
      }

    }
  });
</script>