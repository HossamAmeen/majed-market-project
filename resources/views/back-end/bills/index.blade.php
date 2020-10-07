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
            <th>اسم المشتري</th>
            <th>رقم الموبايل</th>
            <th></th>
            {{-- <th></th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $item)
        <tr id="row{{$item->id}}">
            <td> {{$row_num++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>
                <form action="{{ route($routeName.'.destroy' , ['id' => $item]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="{{ route($routeName.'.edit' , ['id' => $item]) }}" rel="tooltip" title=""
                        class="btn btn-xs btn-info"> <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <button type="submit" rel="tooltip" title="" onclick="check()" class="btn btn-xs btn-danger"><i
                            class="fa fa-minus"></i></button>
                    <button><a href="{{route($routeName.'.print' , ['id' => $item->id])}}" class="btnPrint" id="print"
                    style="text-decoration: none" target="_blank">Print</a></button>
                    <a href="#" rel="tooltip" title="print" class="btn btn-xs btn-info"
                        onclick="printDiv({{$item->id}})"> <i class="fa fa-print"></i>
                    </a>
                    {{-- <button  rel="tooltip" title="" id="print"
                    onclick="printDiv({{$item->id}})"
                    class="btn btn-xs btn-danger">
                    <i class="fa fa-print"></i></button> --}}
                    {{-- <button onclick="printDiv()"  class="btn btn-xs btn-info" ><i class="fa fa-print"></i></button> --}}

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
</script>

{{-- <script type="text/javascript">
    function printContent(element){
           window.print(); window.close();
            }
</script> --}}
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
</script>
@endpush
