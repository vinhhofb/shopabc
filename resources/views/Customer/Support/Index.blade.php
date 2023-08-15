@extends("Customer.Layouts.Master")
@section('Title', 'Hỗ trợ kỹ thuật')
@section('Content')
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <x-customer.layouts.header-dashboard/>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">

    </div>
    
    <div class="side-bar-box" style="width: 250px;">
      <x-customer.layouts.side-bar/>
    </div>

    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                <div>
                  <div>
                   <form method="post" action="{{route('customer.change-password.change-password-post')}}">
                    @csrf
                    <div class="bg-white p-3">
                      <div class="w-100 d-flex">
                        <div  style="width: 50px;height: 50px;">
                          <img src="{{ asset('images/avatars/default-admin.png')}}" style="width: 100%;border-radius: 50%;">
                        </div>
                        <p class="mt-3 ml-3 font-weight-bold">Chat Bot</p>

                      </div>
                      <div class="w-100 mt-3">
                        <div class="bg text-white p-3" style="width: 80%;">
                          <p>Xin chào Vinh Huu Ho👋, mình là CLEO - CHATBOT hỗ trợ thông minh dành riêng cho bạn. CLEO có thể ngay lập tức hỗ trợ hoặc giúp bạn kết nối tới Chuyên viên tư vấn. Bạn có thể chọn 1 trong các chủ đề bên dưới, hoặc nhắn câu hỏi ngắn gọn, dễ hiểu giúp CLEO nhé 💜</p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>




      </div>

    </div>

  </div>   

</div>


@endsection


















