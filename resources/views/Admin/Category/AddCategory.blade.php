@extends("Admin.Layouts.Master")
@section('Title', 'Add')
@section('Content')
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
                    <h4 class="mb-4">Add</h4>
                    <form action="{{url('admin/quan-ly-danh-muc/them-danh-muc')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                          </div>
                        </div>
                        
                        
                      </div>
                      <p>@if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                      @endif</p>
                      
                      <button type="submit" class="btn btn-info btn-fill pull-right">Add</button>
                      <div class="clearfix"></div>
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

















