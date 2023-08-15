


<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/quan-ly-nguoi-dung')}}">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Customer Manage</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/quan-ly-cua-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Store Manage</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/quan-ly-shiper')}}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Shiper Manage</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/quan-ly-dia-diem')}}">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Location Manage</span>
      </a>
    </li>

   
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Config</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/thuoc-tinh')}}">Properties</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/doi-mat-khau')}}">Change Password</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/quan-ly-danh-muc')}}">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Categories</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/quan-ly-thanh-toan')}}">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Payment Manage</span>
      </a>
    </li>
    

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#email-campagn" aria-expanded="false" aria-controls="email-campagn">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Email campain</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="email-campagn">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/chien-dich-email/mau-email')}}">Template</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/chien-dich-email/cau-hinh-email')}}">Email Config</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/chien-dich-email/gui-email')}}">Send email</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/chien-dich-email/thiet-lap')}}">Config</a></li>
        </ul>
      </div>
    </li>
  {{-- <li class="nav-item">
      <a class="nav-link" href="{{url('admin/nhan-dien-guong-mat')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Nhận diện gương mặt</span>
      </a>
    </li> --}}

  </ul>
</nav>
