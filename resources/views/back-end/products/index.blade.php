@extends('back-end.layout.app')
@php $row_num = 1; $pageTitle = "عرض المنتجات" @endphp
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
            <th>الاسم</th>
            <th>سعر الشراء</th>
            <th>سعر البيع</th>
            <th>الكمية</th>
            <th>السعر الكلى</th>
            <th>الكود</th>
            <th>الخصم</th>


            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $item)
        <tr>
            <td> {{$row_num++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->purchasing_price}}</td>
            <td>{{$item->selling_price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->total_price}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->discount}}</td>
            <td>

                @include('back-end.shared.buttons.delete')


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
</script>
@endpush


