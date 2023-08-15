<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="tx navbar-brand brand-logo mr-5" href="{{url("/")}}" style="font-weight: bold;">STORE</a>
   
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
   
    <ul class="navbar-nav navbar-nav-right">
      
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          @if(Auth::user()->avatar == null)
          <img src="{{ asset('images/avatars/default-admin.png')}}" />
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{url('kenh-cua-hang/dang-xuat')}}">
            <i class="ti-power-off text-primary"></i>
           Logout
          </a>
        </div>
      </li>
      
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>