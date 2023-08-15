@extends("Index.Layouts.Master")
@section('Title', 'Trang chủ')
@section('Content')
@if(Session::get('id_city') == null)
<x-index.home.choose-city/>
@endif
<style type="text/css">
  @media only screen and (max-width: 998px) {
        .sidebar-box{
            display: none;
            width: 0;
        }
        .content-box{
          width: 100% !important;
          padding: 0 !important;
        }
        .container {
          max-width: none !important;
        }
    }

</style>
<div class="container d-flex p-0" style="padding-top: 60px !important;">
  <div class="sidebar-box" style="width: 210px;height: 1000px;">
    <x-index.layouts.side-bar/>
  </div>
  <div class="px-3 content-box" style="width: calc(100% - 210px);">
    <x-index.home.banner/>
    <x-index.home.market/>
    <x-index.home.top-shop/>
    <x-index.home.product-relate/>
  </div>
  @endsection
  @section('Style')

  @endsection
  @section('Script')

  <script>
    @if(count($errors) > 0)
    toastr.error("Vui lòng kiểm tra các trường");
    @endif
  </script>


  <script type="text/javascript">
    $('.set-active44').addClass('active');

  </script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" interity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('system/js/validate/validate.validate.js') }}"></script>

  @endsection
