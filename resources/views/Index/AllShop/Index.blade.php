@extends("Index.Layouts.Master")
@section('Title', 'All Store')
@section('Content')

<div class="container d-flex" style="padding-top: 60px;">
  <div style="width: 210px;height: 1000px;">
    <x-index.layouts.side-bar/>
  </div>
  <div class="px-3" style="width: calc(100% - 210px);">
    <div class="mt-3 p-2 bg-white" style="width: 100%;border-radius: 8px;">
      <p class="fz95 font-weight-bold mb-0">All Store</p>
      <div style="clear: both;"></div>
      <div class="row d-flex mx-0 mb-0">
        @forelse($GetTopShops as $GetTopShops)
        <div class="col-3 p-1 mt-2 mb-0">
          <div class="product-discount-item bg-white cs" style="border-radius: 8px;width: 100%;">
            <img src="{{ asset("Index/images/shops")."/".$GetTopShops->image}}" width="100%" height="170px" style="border-radius: 8px;">
            <p class="fz95 mx-2 mt-2 mb-2 font-weight-bold" style="height: 20px;overflow-y:hidden;">{{$GetTopShops->name}}</p>
            <p class="fz95 mx-2 mt-2 mb-2" style="font-size:80%;height: 75px;overflow-y:hidden;">{{$GetTopShops->content}}</p>
            <i class="mx-2" style="font-size: 80%">{{$GetTopShops->name_market}}-{{$GetTopShops->name_city}}</i>
            
            <div class="px-2 pb-2">
              <a href="{{url('cua-hang')."/".$GetTopShops->id}}">
                <button class="w-100 bg btn text-white">See store</button>
              </a>
            </div>

          </div>
        </div>
        @empty
        <div class="pb-5" style="margin:auto;width: 350px;">
          <img src="../index/images/icons/empty.svg" width="100%">
          <p class="text-center font-weight-bold mt-3 text-white">No data yet.</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>

  @endsection

  @section('Script')


  @endsection
