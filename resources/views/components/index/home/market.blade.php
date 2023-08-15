<style type="text/css">
    .market-active{
        border: 4px solid #d3012e;
    }

</style>
<div class="mt-3 p-2" style="width: 100%;background: white;">
  <p class="font-weight-bold" style="font-size: 95%">Choose market</p>
  <div class="row d-flex mx-0" style="margin-top:-20px;overflow-x: auto;height: 280px;">
    <div class="px-1 text-center pt-3 cs top-sale-item" style="width: 10%;">
        <a href="{{url('chon-cho/0')}}">
            <div class="rounded-circle bg @if(0 ==Session::get('id_market')) market-active @endif"  style="width: 100%;height: 75px">
                <p class="font-weight-bold text-center text-white" style="line-height: 73px">All</p>
            </div>
            <p style="font-size:80%" class="mb-0">All</p>
        </a>
    </div>
   
    @foreach($GetMarkets as $GetMarkets)
    <div class="px-1 text-center pt-3 cs top-sale-item" style="width: 10%;">
        <a href="{{url('chon-cho')."/".$GetMarkets->id}}" style="color: black !important;">
            @if($GetMarkets->image == null)
            <img class="rounded-circle @if($GetMarkets->id ==Session::get('id_market')) market-active @endif" src="{{ asset("Index/images/markets/default.png")}}" width="100%" height="75px">
            @else
            <img class="rounded-circle @if($GetMarkets->id ==Session::get('id_market')) market-active @endif" src="{{ asset("Index/images/markets")."/".$GetMarkets->image}}" width="100%" height="75px">
            @endif
            <p style="font-size:80%" class="mb-0">{{$GetMarkets->name}}</p>
        </a>
    </div>
    @endforeach
    

</div>
</div>