<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="tx navbar-brand brand-logo mr-5" href="{{url("/")}}" style="font-weight: bold;">GIAO HÀNG</a>

  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    @if(Auth::user())
    <div class=" ml-5 d-flex">
      <div class="mr-4 mt-2" style="height: 35px;">
        <a href="{{url('/kenh-giao-hang/nhan-don-hang')}}" class="d-flex">
          <span class="tx" style="margin-top: 6px;">Nhận đơn hàng</span>
        </a>
      </div>
      
    </div>
    @endif

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          @if(Auth::user()->avatar == null)
          <img src="{{ asset('images/avatars/default.jpg')}}" />
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{url('kenh-giao-hang/dang-xuat')}}">
            <i class="ti-power-off text-primary"></i>
            Đăng xuất
          </a>
        </div>
      </li>
      
    </ul>
    
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>

  </div>
</nav>