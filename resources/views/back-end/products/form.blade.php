@php $input = "name"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label">اسم المنتج</label>
    <div class="col-lg-10">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required style="width: 420px; height: 40px" >
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@php $input = "purchasing_price"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label"> سعر الشراء</label>
    <div class="col-lg-10">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required style="width: 420px; height: 40px" id="purchasing_price">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@php $input = "selling_price"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label"> سعر البيع</label>
    <div class="col-lg-10">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required style="width: 420px; height: 40px">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@php $input = "quantity"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label">الكمية</label>
    <div class="col-lg-10">
        <input type="quantity" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required style="width: 420px; height: 40px" id="quantity">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@php $input = "total_price"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label"> السعر الكلى </label>

    <div class="col-lg-10">
        <input type="text" name="{{ $input }}" class="form-control"
            required style="width: 420px; height: 40px" readonly id="total_price" >
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@php $input = "code"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label"> الكود </label>
    <div class="col-lg-10">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required style="width: 420px; height: 40px">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@php $input = "discount"; @endphp
<div class="form-group">
    <label class="col-lg-2 control-label"> الخصم </label>
    <div class="col-lg-10">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required style="width: 420px; height: 40px">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<script>
    function total() {
  var quantity = parseInt(document.getElementById('quantity').value);

  var purchasing_price = parseInt(document.getElementById('purchasing_price').value);

  var total = purchasing_price * quantity;

  document.getElementById('total_price').innerHTML = total;

}
</script>




