@extends("Index.Layouts.Master")
@section('Title', $GetProductDetail->name)
@section('Content')
<link rel="stylesheet" href="{{ asset('Index/css/product-detail-zoom.css')}}">
<link rel="stylesheet" href="{{ asset('Index/css/preview-image-comment.css')}}">

<style type="text/css">
  .textinfpro {
    display: block;
    padding: 0;
    background: #fff;
    color: #4a4a4a;
    font-size: 20px;
}
  .short-description {
    display: block;
    padding: 5px;
    font-size: 14px;
    line-height: 25px;
}
 .infoproduct {
    display: block;
    overflow: hidden;
    background: #fff;
}
ul, menu, dir {
    display: block;
    list-style-type: none;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0;
    margin-inline-end: 0;
    padding-inline-start: 0;
}
ul, ol {
    list-style: none;
}
.infoproduct li {
    display: block;
    overflow: hidden;
    background: #fff;
    border-bottom: 1px solid #ecf0f1;
    padding: 10px 5px;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.infoproduct li span {
    display: inline-block;
    vertical-align: top;
    overflow: hidden;
    font-size: 13px;
    color: #999;
    width: 18%;
}
.infoproduct li div {
    display: inline-block;
    vertical-align: top;
    font-size: 13px;
    color: #4a4a4a;
    width: 80%;
}
.description {
    padding-top: 10px;
    color: #333;
    font-size: 16px;
    font-size: inherit;
    background: #fff;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    line-height: 1.6;
   
   
    position: relative;
}

.description h3 {

    font-size: 120%;
    margin-top: 25px;

}
</style>
<div class="container d-flex" style=" padding-top: 60px;">

  <div class="" style="width: 100%">
    <div class="bg-white pl-2 pt-2" style="background:#fff;width: 100%;">
     <span class="fz95" style="line-height:35px;opacity: 0.8;line-height: 20px">Home / {{$getCategory->name}} / {{$GetProductDetail->name}}</span>
   </div>
   <div class="p-2 bg-white w-100">

    <div class="row m-0">
      <div class="col-12 col-md-5 p-0">
        <div>
          <div id='lens'></div>
          <div id='slideshow-items-container'>
            <img class='slideshow-items w-100 active' src='{{ asset("Index/images/products")."/".$GetProductDetail->image}}' height="500px" style="object-fit: contain;">
            

            @if($GetProductDetail->image_slide != null)
            @foreach(json_decode($GetProductDetail->image_slide) as $item)
            <img class='slideshow-items w-100' src='{{ asset("Index/images/products")."/".$item}}' height="500px" style="object-fit: contain;">

            @endforeach
            @endif
          </div>

          <div id='result'></div>

          <div class='m-0 hide-scroll'  style="width: 100%;overflow-x: auto;display: flex;">

            <img class='slideshow-thumbnails active mr-1 mb-2' src='{{ asset("Index/images/products")."/".$GetProductDetail->image}}' height="70px" style="object-fit: contain;">
            @if($GetProductDetail->image_slide != null)
            @foreach(json_decode($GetProductDetail->image_slide) as $item2)

            <img class='slideshow-thumbnails mr-1 mb-2' src='{{ asset("Index/images/products")."/".$item2}}' height="70px" style="object-fit: contain;">
            @php
            $index = 1;
            @endphp
            @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12 col-md-7 pl-4">
        <p class="mb-0" style="font-size:140%">{{$GetProductDetail->name}}</p>
        <span class="fz95" style="opacity: 0.8;">{{$GetProductReviewCount}} Review  |  {{$GetProductSellerCount}} đã bán</span>
        <div class="w-100 d-flex p-3 mt-2" style="background:#fafafa">
          <p class="mr-3 mb-0" style="opacity: 0.8">Price bán </p><p class="tx mb-0" style="font-size:180%">2.000.000$</p>
        </div>
        @if(Auth::user())
        <div class="btn bg text-white mt-1 cs w-100 mt-3" style="border-radius: 0" onclick="addToCart({{$GetProductDetail->id}})">
Add to cart</div>
        @else
        <a href="{{url('dang-nhap')}}">
          <div class="btn bg text-white mt-1 cs w-100 mt-3" style="border-radius: 0">Login for buy</div>
        </a>
        @endif
      </div>

    </div>



  </div>
  <div class="bg-white mt-3 p-3">
    <p class="font-weight-bold mb-3">Information</p>
    
    {!! $GetProductDetail->content !!}
  </div>
  <div class="bg-white mt-3 p-3">
    <p class="font-weight-bold mb-3">Review Products</p>
    @forelse($GetProductReview as $GetProductReview)
    <div>
      <div class="d-flex fz95">
        @if($GetProductReview->star ==1)
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        @endif
        @if($GetProductReview->star ==2)
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        @endif
        @if($GetProductReview->star ==3)
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        @endif
        @if($GetProductReview->star ==4)
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
        @endif
        @if($GetProductReview->star ==5)
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        <i class="fa fa-star tx" aria-hidden="true"></i>
        @endif
      </div>
      <p class="mt-2 mb-1" style="opacity: 0.8;font-size: 80%;">Author {{$GetProductReview->name}}</p>
      <p class="mb-1" style="opacity: 0.8;font-size: 80%;">{{\Carbon\Carbon::parse($GetProductReview->created_at)->format('d/m/Y h:i')}} | TYpe: {{$GetProductReview->type}}</p>
      <p class="fz95 mb-1">{{$GetProductReview->content}}</p>
      @if($GetProductReview->image != null)
      <div class="d-flex">
        <section id="gallery">
          <div class="container">
            <div id="image-gallery">
              <div class="row">
                @foreach(json_decode($GetProductReview->image) as $item2)
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 image cs">
                  <div class="img-wrapper">
                    <a href="../Index/images/review/{{$item2}}"><img src="../Index/images/review/{{$item2}}" class="img-responsive"></a>
                    <div class="img-overlay">
                    </div>
                  </div>
                </div>
                @endforeach
              </div><!-- End row -->
            </div><!-- End image gallery -->
          </div><!-- End container --> 
        </section>
      </div>
      @endif
      <hr>
    </div>
    @empty
    <div class="pb-5" style="margin:auto;width: 350px;">
      <img src="{{ asset("Index/images/icons/empty.svg")}}" width="100%">
      <p class="text-center font-weight-bold mt-3">No data yet</p>
    </div>
    @endforelse

    
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script  src="{{ asset('Index/js/product-detail-zoom.js')}}"></script>
  <script  src="{{ asset('Index/js/preview-image-comment.js')}}"></script>
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
</div>
@endsection


