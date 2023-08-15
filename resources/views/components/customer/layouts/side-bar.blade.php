<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Account</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('customer.infomation.index')}}">Basic information</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('customer.change-password.index')}}">Change Password</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('don-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Manage Order</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Payment</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('customer.deposit.deposit')}}">Deposit</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('lich-su-giao-dich')}}">Transaction history</a></li>
        </ul>
      </div>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="{{url('yeu-cau-ho-tro')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Yêu cầu hỗ trợ</span>
      </a>
    </li> --}}

  </ul>
</nav>




