@extends("Admin.Layouts.Master")
@section('Title', 'Danh sách email cấu hình')
@section('Content')
<style type="text/css">
  @media only screen and (max-width: 900px) {
    td{
      white-space: nowrap;
    }
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
                  <div>

                   <div class="bg-white">

                    <div class="col-lg-12 grid-margin stretch-card p-0">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title float-left">Chi tiết email gửi</h4>


                          <div class="table-responsive">
                            <table class="table table-hover table-striped">
                              <thead>
                                <th>ID</th>
                                <th>Email gửi</th>
                                <th>Email nhận</th>
                                <th>Status</th>
                                <th>Ngày gửi</th>

                              </thead>
                              <tbody>

                               @forelse($getDetail as $item)
                               <tr>
                                {{-- id mẫu mail --}}
                                <td >{{$item->id}}</td>
                                <td>
                                  {{-- tiêu đề mail --}}
                                  {{$item->mail_username}}
                                </td>
                                <td>
                                 {{$item->user_email}}
                               </td>
                               <td>
                                @if($item->receipt_status ==0)
                                <p class="mb-0 text-warning">Chờ gửi</p>
                                @elseif($item->receipt_status ==1)
                                <p class="mb-0 text-success">Thành công</p>
                                @elseif($item->receipt_status ==2)
                                <p class="mb-0 text-danger">Gửi lỗi</p>
                                @endif
                              </td>
                              <td>
                                @if($item->receipt_time == null)
                                ---
                                @else
                                {{\Carbon\Carbon::parse($item->receipt_time)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y h:i:s')}}
                               
                                @endif
                              </td>
                            </tr>
                            @empty
                            <td colspan="9">Chưa có dữ liệu</td>
                            @endforelse


                          </tbody>
                        </table>
                        <div class="float-right pr-3">
                          {{ $getDetail->links('pagination::bootstrap-4') }}
                        </div>
                        <div style="clear: both"></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>


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
  setTimeout(function(){
   window.location.reload(1);
 }, 5000);
</script>
@endsection






