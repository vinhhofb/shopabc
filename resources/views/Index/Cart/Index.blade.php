@extends("Index.Layouts.Master")
@section('Title', 'Cart')
@section('Content')

<div class="container d-flex" style="padding-top: 60px;">
  <div class="px-3" style="width: calc(100% - 280px);">
    <div class="bg-white" style="border-radius: 8px;">
      <div class="bg p-2" style="border-top-left-radius: 8px;border-top-right-radius: 8px;">
        <p class="mb-0 text-white font-weight-bold">Your cart</p>

      </div>
      <table class="table">
        <thead>

        </thead>
        <tbody>
          @php
          $total=0;
          @endphp
          @forelse($getShopCart as $getShopCart)
          <table class="table">
            <thead>
              <p class="ml-3 tx font-weight-bold float-left">{{$getShopCart->shop_name}} - </p>
              <p class="mr-3 tx font-weight-bold float-left">&nbsp{{$getShopCart->market_name}}</p>
              <div class="clboth"></div>
            </thead>
            <tbody>
              @foreach($getProductsCart as $getProductsCart2)
              @if($getShopCart->shop_id == $getProductsCart2->shop_id)
              <tr>
                <td width="8%">
                  <div class="text-center" style="width: 40px;height: 40px;">
                    <img src="{{ asset("Index/images/products")."/".$getProductsCart2->image}}" width="100%" height="100%" style="border-radius: 4px;">
                  </div>
                </td>
                <td class="fz95 pt-4" width="25%">{{$getProductsCart2->name}}</td>
                <td width="18%" class="pt-4">{{number_format($getProductsCart2->price)}}$</td>
                <td width="25%">
                  <a href="{{url('giam-san-pham')."/".$getProductsCart2->id}}">
                    <div class="text-center float-left mr-2 pt-2 font-weight-bold tx cs" style="width: 40px;height: 40px;border-radius: 4px;background-color: #fde6e7;">
                      -
                    </div>
                  </a>
                  <a href="{{url('xoa-san-pham')."/".$getProductsCart2->id}}">
                    <div class="text-center float-left mr-2 cs" style="width: 40px;height: 40px;border-radius: 4px;background-color: #fde6e7;">
                      <i class="fa fa-trash-alt tx" style="line-height: 38px;"></i>
                    </div>
                  </a>
                  <a href="{{url('them-san-pham')."/".$getProductsCart2->id}}">
                    <div class="text-center float-left mr-2 pt-2 font-weight-bold tx cs" style="width: 40px;height: 40px;border-radius: 4px;background-color: #fde6e7;">
                      +
                    </div>
                  </a>
                  <div class="clboth"></div>
                </td>
                <td width="12%" class="pt-4">{{number_format($getProductsCart2->quanlity)}}</td>
                
                <td width="15%" class="tx font-weight-bold pt-4">{{number_format($getProductsCart2->price*$getProductsCart2->quanlity)}}đ</td>
              </tr>
              @php
              $total+=$getProductsCart2->price*$getProductsCart2->quanlity;
              @endphp
              @endif
              @endforeach
            </tbody>
          </table>
          @empty
          <div></div>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div style="width: 280px;">
    <div class="p-2" style="width: 280px;position: fixed;background: white;border-radius: 8px;">
      <p style="font-size:90%"><i class="fa fa-credit-card mr-2 tx" aria-hidden="true"></i>Billing Information</p>
      <hr style="margin-top: -10px;">
      @if(Auth::user()->name ==null || Auth::user()->address ==null)
      <a href="{{url('thong-tin-ca-nhan')}}">
      <button class="text-white btn bg w-100" style="border: 0;outline: none;">Update infomation</button>
      </a>
      @endif
      @if(Auth::user()->name !=null && Auth::user()->address !=null)
      <div>
        <p class="fz95 float-left tx font-weight-bold mb-1">Customer name</p>
        <p class="fz95 float-right mb-1">{{Auth::user()->name}}</p>
        <div class="clboth"></div>
        <p class="fz95 float-left tx font-weight-bold mb-1">Address</p>
        <p class="fz95 float-right mb-1">{{Auth::user()->address}}</p>
      
        <div class="clboth"></div>
        <p class="fz95 float-left tx font-weight-bold mb-1">Phone</p>
        <p class="fz95 float-right mb-1">{{Auth::user()->phone}}</p>
        <div class="clboth"></div>
      </div>
      <hr>
      @endif
      @if(Auth::user()->name !=null && Auth::user()->address !=null)
      @if($total !=0)
      <form method="post" action="{{url('thanh-toan')}}">
        @csrf
        <div>
          <p class="fz95 float-left tx font-weight-bold mb-1">Product Price</p>
          <p class="fz95 float-right mb-1">{{number_format($total)}}đ</p>
          <div class="clboth"></div>
          <p class="fz95 float-left tx font-weight-bold mb-1">Discount</p>
          <p class="fz95 float-right mb-1">{{$getConfig[1]->value}}%</p>

          <div class="clboth"></div>
          <p class="fz95 float-left tx font-weight-bold mb-1">Fee ship</p>
          <input id="fee-ship" type="number" name="feeship" class="float-right" style="width: 80px;" required>
          
          <div class="clboth"></div>
          <p class="fz95 float-left tx font-weight-bold mb-1">TAX</p>
          <p class="fz95 float-right mb-1">{{$getConfig[0]->value}}%</p>
          <div class="clboth"></div>
          <p class="fz95 float-left tx font-weight-bold mb-1">Total</p>
          <p id="total-payment" class="fz95 float-right mb-1 font-weight-bold">{{number_format($total+$total*$getConfig[0]->value/100-$total*$getConfig[1]->value/100)}}đ</p>
          <div class="clboth"></div>
        </div>
        <div class="btn bg w-100 text-white mt-3 cs">
          <p class="mb-0" style="font-size:80%">Wallet: {{number_format(Auth::user()->balance)}}$</p>
          @if(Auth::user()->balance < $total+$total*$getConfig[0]->value/100-$total*$getConfig[1]->value/100)
          <a href="{{url('nap-tien')}}">Deposit</a>
          @else
          <input id="fee-ship-value" type="number" hidden name="total" value="{{$total+$total*$getConfig[0]->value/100-$total*$getConfig[1]->value/100}}">
          <button type="submit" class="text-white" style="background: none;border: 0;outline: none;">Payment</button>
          @endif
        </div>
      </form>
      @endif
      @endif
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var formatter = new Intl.NumberFormat('en-US', {
      currency: 'USD',
    });
    $('#fee-ship').change(function(){
    $('#total-payment').text(formatter.format(parseInt($('#fee-ship-value').val())+parseInt($('#fee-ship').val()))+"đ")
  });
</script>
@endsection
