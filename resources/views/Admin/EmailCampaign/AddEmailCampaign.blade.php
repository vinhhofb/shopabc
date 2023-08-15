@extends("Admin.Layouts.Master")
@section('Title', 'Tạo chiến dịch email')
@section('Content')
<style type="text/css">
  .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
    height: 38px !important;
  }
</style>
<div class="container-scroller">
  <x-admin.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-admin.layouts.side-bar/>
    </div>
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div class="bg-white p-4">
                    <h4 class="mb-4">Tạo chiến dịch email</h4>
                    <form id="form-add-campaign" method="post" action="">
                      @csrf
                      <p class="font-weight-bold mt-4">Thông tin</p>
                      <div class="row m-0 p-4" style="border: 1px solid #ccc;">
                        <div class="col-6 pl-0">
                          <label>Tên chiến dịch</label>
                          <input type="text" name="campaign_name" class="form-control" required>
                        </div>
                        <div class="col-6 pr-0">
                          <label>Mẫu email gửi</label>
                          <div class="form-group">

                            <select class="form-control" id="exampleFormControlSelect1" name="mail_template_id">
                              @foreach($listTemplate as $item)
                              <option value="{{$item->id}}">{{$item->template_title}}</option>
                              @endforeach
                             
                            </select>
                          </div>
                        </div>
                      </div>
                      <p class="font-weight-bold mt-4">Đối tượng gửi</p>
                      <div class="row m-0 p-4"  style="border: 1px solid #ccc;">

                        <div class="col-12 p-0 mb-4 fz95">
                          <label class="font-weight-bold fz95">Chọn nhóm người dùng</label><br>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="type_user" value="0">All
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="type_user" value="3">Khách hàng
                            </label>
                          </div>
                          <div class="form-check-inline disabled">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="type_user" value="2">Cửa hàng
                            </label>
                          </div>
                          <div class="form-check-inline disabled">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="type_user" value="4">Giao hàng
                            </label>
                          </div>
                        </div>
                        <div class="col-12 p-0 mb-4 fz95">
                          <label class=" font-weight-bold fz95">Chọn thành viên muốn gửi</label><br>
                          <select name="list_user[]" class="chosen" data-order="true"  id="multiselect" multiple="true" style="height: 50px;width: 100%;">
                            @foreach ($listUser as $item )
                            <option value="{{$item->id}}">[ID: {{$item->id}}] {{$item->phone}} - {{$item->email}}</option>
                            @endforeach
                          </select>
                        </div>
                        
                        <div class="col-12 p-0  text-center">
                          @if (\Session::has('msg'))
                          <span class="text-danger mt-2">{!! \Session::get('msg') !!}</span>
                          @endif
                        </div>
                        

                      </div>
                      <p class="font-weight-bold mt-4">Lịch trình gửi</p>
                      <div class="row m-0 p-4" style="border: 1px solid #ccc;">
                        <div class="col-6 p-4">
                          <div class="form-check" >
                            <input type="checkbox" class="form-check-input " id="exampleCheck1" name="send_now" checked>
                            <label class="form-check-label " for="exampleCheck1" style="margin-left: 3px !important;">Gửi ngay</label>
                          </div>
                        </div>
                        <div class="col-6 p-4">
                          <label>Đặt lịch</label>
                          <input type="datetime-local" name="start_date" class="form-control">
                        </div>
                      </div>
                      <div class="col-12 p-0 pr-2 mb-2 text-center mt-3">
                        <div onclick="submitForm()" class="btn bg text-white">Tạo chiến dịch</div>
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
    <script type="text/javascript">
    function submitForm(){
      if($('#multiselect').val() == ""){
        $('#form-add-campaign').attr('action', "{{url('admin/chien-dich-email/gui-email/them-loc')}}");
  
        document.getElementById("form-add-campaign").submit();
      }else{
         $('#form-add-campaign').attr('action', "{{url('admin/chien-dich-email/gui-email/them-danh-sach')}}")
         document.getElementById("form-add-campaign").submit();
      }
      

    }
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript">
    $(".chosen").chosen({
      width: "100%",
      height:"42px",
      enable_search_threshold: 10
    }).change(function(event)
    {
      if(event.target == this)
      {
        var value = $(this).val();
        $("#result").text(value);
      }
    });
    $('.chosen-search-input').val("Nhập danh sách")
  </script>



{{--   <script type="text/javascript">
    $(document).ready(function() {
      $('input[type=radio][name=optradio]').change(function() {


        $.get("{{url('/admin/chien-dich-email/gui-email/loc-tai-khoan')}}/"+this.value, function(data, status){
          var html = "";
          $.each(data.getUserByType, function(i, item) {

            html +=`<option value="`+item.id+`">[ID: `+item.id+`] `+item.phone+` - `+item.name+`</option>`
          });
          console.log(html)
          $('#multiselect').html("Hello <b>world</b>!");

        });

      });
    });

  </script> --}}


  @endsection








