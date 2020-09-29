<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css.map')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.scss')}}">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.printPage.js"></script>
   <script type="text/javascript">
        $(document).ready(function (){
            window.print();
        })
    </script>
</head>
<body>
<center><br><br>
 @foreach ($rows as $item)
    <div class="container">
            <div class="ticket-content" id="design-1">
                    <h3> مجدى
                      <br>
                      <span class="date">{{now()->toDateTimeString('Y-m-d')}}</span>
                    </h3>
                    <h4 class="name"><span>اسم العميل:</span>
                        <span> {{$item->name}}</span>
                    </h4>

                    <h4 class="phone"><span>التلفون:</span>
                        <span>{{$item->phone}}</span></h4>
                    <div class="table-header">
                      <p class="quantity">الكمية</p >
                      <p class="description">المنتج</p >
                      <p class="price">السعر</p>
                    </div>
                    @php
                        $sum=0;
                        $discount = 0;
                    @endphp
                    @foreach ($item->billedProducts as $products)
                    @if($products->product)
                    <div class="table-data">
                      <p class="quantity">{{$products->product->quantity}}</p>
                      <p class="description">{{$products->product->name}}	</p>
                      <p class="selling_price">{{$products->product->selling_price}}</p>
                            @php
                                $sum+= $products->product->quantity * $products->product->selling_price;
                                $discountValue = ($products->product->quantity * $products->product->selling_price * $products->product->discount);
                                $discount +=(  $discountValue);
                            @endphp
                   </div >
                    @endif
                    @endforeach
                 <div class="total-price">
                     <p class="title">اجمالى السعر</p>
                     <p class="cost">{{$sum}}</p>
                   </div>

                   <div class="total-sale">
                    <p class="title">اجمالى الخصم</p>
                    <p class="cost">{{$discount}}</p>
                  </div>
                  <div class="total-pay">
                    <p class="title">المطلوب دفعه</p>
                    <p class="cost">{{$sum-$discount}}</p>
                  </div>
                    <p class="table-footer">الأسعار تشمل ضريبة القيمة المضافة</p>

                  </div><br>

    </div>
    @endforeach
</center>
</body>
</html>
