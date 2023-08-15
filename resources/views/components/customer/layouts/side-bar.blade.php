<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Tài khoản</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('customer.infomation.index')}}">Thông tin tài khoản</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('customer.change-password.index')}}">Đổi mật khẩu</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('don-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Quản lý đơn hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Thanh toán</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('customer.deposit.deposit')}}">Nạp tiền</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('lich-su-giao-dich')}}">Lịch sử giao dịch</a></li>
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




