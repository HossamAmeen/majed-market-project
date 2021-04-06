@extends('back-end.layout.app')

@php $row_num = 1; $pageTitle = "عرض الفواتير" @endphp
@section('title')
{{$pageTitle}}
@endsection

@section('content')

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
            <th> رقم الفاتورة</th>
            <th>اسم المشتري</th>
            <th>رقم الموبايل</th>
            <th>اسم المنتج (العدد) - السعر</th>
            <th>فلوس الفاتورة</th>
            <th>خصم الفاتورة</th>
            <th> فلوس الفاتورة بعد الخصم</th>
            <th>تاريخ الصرف</th>
            <th>المسؤول</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($rows as $item)
        @php
        $totalCost = 0 ; $totalDiscount = 0 ;
        @endphp
        <tr id="row{{$item->id}}" >
            <td> {{$row_num++}}</td>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->phone??"--"}}</td>
            <td>
                @foreach ($item->orders as $order)
                {{$order->product_name ?? " "}} ( {{$order->quantity}} ) - {{ $order->price}} جنيها<br>
                @php
                $totalCost += ($order->quantity * $order->price); $totalDiscount += $order->discount ;
                @endphp
                @endforeach
            </td>
            <td>{{$totalCost}}</td>
            <td>{{$totalDiscount + $item->discount}}</td>
            <td>{{$totalCost- $totalDiscount - $item->discount}}</td>
            <td>{{$item->updated_at}}</td>
            <td>{{$item->user->user_name ?? ""}}</td>
            <td width="15%">
                <form action="{{ route($routeName.'.destroy' , ['id' => $item]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="{{ route($routeName.'.edit' , ['id' => $item]) }}" rel="tooltip" title=""
                    class="btn btn-xs btn-info"> <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <button type="submit" rel="tooltip" title="" onclick="check()" class="btn btn-xs btn-danger"><i
                            class="fa fa-minus"></i></button>
                 

                    <a href="{{route($routeName.'.print' , ['id' => $item->id])}}" rel="tooltip" title="عرض الفاتورة"
                        class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-eye"></i>
                    </a>
             

                    <a href="#" rel="tooltip" title="طباعة" onclick="printPageWithAjax()" class="btn btn-xs btn-info">
                        <i class="fa fa-print" data-route="{{url('/admin/print-bill/'.$item->id)}}"></i>
                    </a>
                   

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
@endsection

@push('js')

<script type="text/javascript">
    $(document).ready(function(){
            $("#{{$routeName}}").addClass('active');
        });
/*
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.onload=function(){ // necessary if the div contain images

mywindow.focus(); // necessary for IE >= 10
mywindow.print();
mywindow.close();
}

}*/

$.ajaxSetup({
            headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

function printPageWithAjax(){

var route= $(event.target).attr("data-route");

var mywindow = window.open(route, 'PRINT', 'height=600,width=800');
mywindow.focus(); // necessary for IE >= 10
mywindow.print();
}
/*function printPageWithAjax(){

var route= $(event.target).attr("data-route");
var mywindow = window.open(route, 'PRINT', 'height=600,width=800');

$.ajax({
url  : route,
type : 'GET',
 data: {},
dataType: 'html',
success: function(html) {
   // mywindow.document.write(data);
    mywindow.focus();
    mywindow.print();
},
error: function (data) {
console.log('Error:', data);
}
})

}*/


</script>

{{-- <script type="text/javascript">
    function printContent(element){
           window.print(); window.close();
            }
</script>
<script>
    function printDiv(id) {
        var divContents = document.getElementById("row"+id).innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body > <h1>Div contents are <br>' + id);
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>--}}
@endpush