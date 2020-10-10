@extends('back-end.layout.app')
@php $row_num = 1; $pageTitle = "عرض المنتجات" @endphp
@section('title')
{{$pageTitle}}
@endsection

@section('content')
<a class="btn  btn-danger" href="{{$routeName.'?quantity=' . 5}}"> المنتجات المقتربة من النفاذ</a>
<br><br>
<button  class="btn  btn-info">عدد الاصناف :  {{$productsCount}} </button>
<button  class="btn  btn-info">اجمالي القطع :  {{$totalQuantity}} </button>
<button  class="btn  btn-info">اجمالي سعر الشراء  : {{$totalBuyCost}}</button>
<button  class="btn  btn-info">اجمالي سعر البيع  : {{$totalSellCost}} </button>
<button  class="btn  btn-success">صافي مكسب: {{$totalSellCost - $totalBuyCost}}</button>
{{-- <p style="float: right">عدد القطع :  {{$productsCount}}</p>
<p style="margin: 0% 20% ; float: right">اجمالي سعر الشراء  : {{$totalBuyCost}}</p>
<p style="margin: 0% 20%">اجمالي سعر البيع  : {{$totalSellCost}}</p>
<h4 style="text-align: center">صافي مكسب: {{$totalSellCost - $totalBuyCost}}</h4> --}}
<br><br>
  

@component('back-end.layout.header')
@slot('nav_title')
{{$pageTitle}}
<a href="{{ route($routeName.'.create') }}">
    <button class="alert-success"> <i class="fa fa-plus"></i> </button>
</a>
@endslot
@endcomponent
@component('back-end.shared.table' )
@if (session()->get('action') )
<div class="alert alert-success">
    <strong>{{session()->get('action')}}</strong>
</div>
@endif
<table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
    <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>سعر الشراء</th>
            <th>سعر البيع</th>
            <th>الكمية</th>
            <th>سعر الشراء الكلى</th>
            <th>سعر البيع الكلى</th>
            <th>الكود</th>
            <th>المسؤول</th>
            {{-- <th>الخصم</th> --}}


            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $item)
        <tr @if($item->quantity < 3) style="color: red" @endif>
            <td> {{$row_num++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->purchasing_price}}</td>
            <td>{{$item->selling_price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->purchasing_price * $item->quantity}}</td>
            <td>{{$item->selling_price * $item->quantity}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->user->user_name ?? " "}}</td>
            {{-- <td>{{$item->discount}}</td> --}}
            <td>
                @section('moreButton')
                <a href="#" rel="tooltip" title="طباعة" onclick="printPageWithAjax()" class="btn btn-xs btn-info">
                    <i class="fa fa-print" data-route="{{url('/admin/print-bill/'.$item->id)}}"></i>
                </a>
                @endsection
                @include('back-end.shared.buttons.delete')
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br><br>
<h2 style="text-align: center">اجمالي عدد القطع : 5     -   اجمالي فلوس : 25 - اجمالي سعر البيع : 35 - صافي المكسب : 10</h2>
<br><br>
@endcomponent
@endsection

@push('js')

<script type="text/javascript">
    $(document).ready(function(){
            $("#{{$routeName}}").addClass('active');
        });
</script>
@endpush


