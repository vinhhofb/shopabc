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
                          <h4 class="card-title float-left">Danh sách email chiến dịch</h4>
                          <div class="float-right"> 
                           <a href="{{url("admin/chien-dich-email/gui-email/them")}}">
                            <div class="btn btn-success">Tạo chiến dịch</div>
                          </a> 
                        </div>
                        <div style="clear: both;"></div>

                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>ID</th>
                              <th>Tên</th>
                              <th>Mẫu mail</th>
                              <th>Tiến trình</th>
                              <th>Type</th>
                              <th>Created</th>
                              <th>Thao tác</th>

                            </thead>
                            <tbody>

                             @foreach($getEmailCampaign as $item)
                             <tr>
                              <td>{{$item->id}}</td>
                              <td> {{$item->campaign_name}}</td>
                              <td>{{$item->template_title}}</td>
                              <td>{{$item->total_receipt_mail}}/{{$item->total_mail}}
                              </td>
                              <td>
                                @if($item->type_send == 0)
                                Gửi ngay
                                @else
                                Đặt lịch
                                {{\Carbon\Carbon::parse($item->start_date)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s')}}
              
                                @endif
                              </td>

                              <td> {{\Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s')}}</td>
                              <td>
                                <a href="{{url('admin/chien-dich-email/gui-email/chi-tiet')."/".$item->id}}">
                                  <button class="btn btn-primary">Xem chi tiết</button>
                               </a>
                               @if($item->type_send == 1)
                               @if($item->total_receipt_mail == 0)
                               <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$item->id}}">Xóa</button> 
                               @endif   
                               @endif
                             </td>
                           </tr>
                           <div class="modal fade mt-5" id="exampleModalBlock{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa mẫu email</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <p>Bạn đồng ý xóa chiến dịch email này?</p>
                               </div>
                               <div class="p-2">
                                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Hủy</button>
                                 <a  href="{{url('/admin/chien-dich-email/gui-email/xoa')."/".$item->id}}">
                                  <button type="button" class="btn btn-danger float-right mr-2">
                                    Đồng ý                   
                                  </button>
                                </a>
                                <div style="clear: both"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach


                      </tbody>
                    </table>
                    <div class="float-right pr-3">
                      {{ $getEmailCampaign->links('pagination::bootstrap-4') }}
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

@endsection






