<style type="text/css">
    @media only screen and (max-width: 1111px) {
        .search-box {
            width: 200px !important;
        }
    }
    @media only screen and (max-width: 998px) {
        .order-box{
            display: none;
        }
    }
    @media only screen and (max-width: 993px) {
        .order-box{
            display: none;
        }
        .logo-box{
            display: none;
        }
    }
    @media only screen and (max-width: 770px) {
        .cart-box{
            display: none;
        }
        .login-box{
            display: none;
        }
        .logo-box > a > p{
            font-size: 90% !important;
            margin-top: 8px;
        } 
        .logo-box{
         width: 70px !important;
     }
     .search-box {
        width: 100% !important;
    }
    .menu-reponsive{
        display: block !important;
    }
}
@media only screen and (max-width: 549px) {
    .location-box{
        display: none !important;
    }
    .search-button{
        display: none;
    }
    .logo-box{
        display: block;
    }
    .search-box{
        width: calc(100% - 160px);
        padding-right: 20px;
    }
}
@media only screen and (max-width: 822px) {
    .navbar-header{
        display: flex;
        width: 1500px;
        overflow-x: auto;
    }

}
@media only screen and (max-width: 998px) {
    .sidebar-box{
      display: none;
      width: 0;
  }
  .content-box{
      width: 100% !important;
      padding: 0 !important;
  }
  .container {
      max-width: none !important;
  }
}
.show-category{
    margin-left: 0px !important;
    transition: 0.4s;
}
</style>
 <link rel="stylesheet" href="{{ asset('css/virtual-assistant-main/index.css')}}">
<header style="width: 100%;position: fixed;z-index: 9999;">
    <div class="bg">
        <div class="container d-flex p-2 pl-3">
            <div class="mr-4 logo-box" style="width: 120px;height: 35px;">
                <a href="{{route('index.Home.index')}}">
                    <p class="text-white" style="font-size:120%;font-weight: bold;">VMARKET</p>
                </a>
            </div>
            <div class="d-flex mr-4 location-box" style="width: 200px;height: 35px;background: #d3012e">
                <div class="text-center mt-2" style="width: 30px;height: 35px;">
                    <i class="fa fa-location-arrow text-white " aria-hidden="true"></i>
                </div>
                <div style="width: 170px;height: 35px;">
                    <a href="{{url('dat-lai-vi-tri')}}">
                        <p class="text-white cs" style="font-size: 70%;line-height: 14px;margin-top: 3px;">{{$locationHeader}}</p>
                    </a>
                </div>
            </div>
            <form id="search-form" class="d-flex" method="get" action="{{url('tim-kiem')}}">
                <div class="mr-2 search-box d-flex bg-white" style="width: 400px;height: 35px;">
                    <input id="search-input" class="form-control" type="text" name="keyword" style="width: 100%;height: 100%;border-radius: 0;border: 0;box-shadow: none !important;" placeholder="What are you looking for?" required autocomplete="off">
                    <span class="microphone mt-2" style="width: 20px;">
                        <i class="fas fa-microphone"></i>
                        <span class="recording-icon"></span>
                    </span>
                </div>
                <div class="mr-4 search-button" style="width: 80px;">
                    <button class="btn" style="font-size: 80%;width: 100%;height: 100%; background: white;border-radius: 0;">Search</button>
                </div>
            </form>
            <div class="mr-4 cs order-box" style="width: 70px;height: 35px;">
                <a href="{{url('don-hang')}}">
                    <p class="text-white mt-2" style="font-size: 80%">My order</p>
                </a>
            </div>

            @if(Auth::user())
            <div class="mr-4 pt-2 text-center cs cart-box" style="width: 120px;height: 35px;background: #d3012e">
                <a href="{{route('index.cart.index')}}">
                    <p class="text-white" style="font-size: 80%"><i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i> Cart</p>
                </a>
            </div>
            @else
            <div class="mr-4 pt-2 text-center login-box" style="width: 120px;height: 35px;background: #d3012e">
                <a href="{{route('index.login.index')}}">
                    <p class="text-white" style="font-size: 80%"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i>Login</p>
                </a>
            </div>
            @endif
            <div id="icon-category-mb" class="pt-2 text-center menu-reponsive" style="width: 50px;height: 35px;background: #d3012e;display: none;">
                <i class="fa fa-bars text-white" aria-hidden="true"></i>
            </div>
        </div>
        
    </div>
    <div id="category-mb"  style="width: 200px;position: fixed;height: 100vh;margin-left: -220px;margin-top: -25px;">
        <div id="side-bar-mb">
         <x-index.layouts.side-bar/>
     </div>
 </div>
</header>
<script src="{{ asset('js/virtual-assistant-main/index.js')}}"></script>

<script
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#icon-category-mb').on('click',function(){
        $('#category-mb').toggleClass('show-category');
    })
</script>

