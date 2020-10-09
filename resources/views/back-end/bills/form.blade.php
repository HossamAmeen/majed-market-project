<div class="form-group">
    @php $input = "name"; @endphp
    <label class="col-lg-2 control-label">اسم المشتري</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
            required >
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @php $input = "phone"; @endphp
    <label class="col-lg-2 control-label">رقم الموبايل</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group">
    @php $input = "products[]"; @endphp
    <label class="col-lg-2 control-label"> المنتج</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
        required>
    </div>
</div>

<div class="form-group">

    @php $input = "quantity[]"; @endphp
    <label class="col-lg-2 control-label">كمية</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 1 }}" class="form-control">
    </div>
    @php $input = "costs[]"; @endphp
    <label class="col-lg-2 control-label">سعر</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
    </div>
    @php $input = "discounts[]"; @endphp
    <label class="col-lg-2 control-label">الخصم</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 0 }}" class="form-control">
    </div>
</div>
<div class="form-group">
    @php $input = "products[]"; @endphp
    <label class="col-lg-2 control-label"> المنتج</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
        >
    </div>
</div>

<div class="form-group">

    @php $input = "quantity[]"; @endphp
    <label class="col-lg-2 control-label">كمية</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 1 }}" class="form-control">
    </div>
    @php $input = "costs[]"; @endphp
    <label class="col-lg-2 control-label">سعر</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
    </div>
    @php $input = "discounts[]"; @endphp
    <label class="col-lg-2 control-label">الخصم</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 0 }}" class="form-control">
    </div>
</div>

<div class="form-group">
    @php $input = "products[]"; @endphp
    <label class="col-lg-2 control-label"> المنتج</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
        >
    </div>
</div>

<div class="form-group">

    @php $input = "quantity[]"; @endphp
    <label class="col-lg-2 control-label">كمية</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 1 }}" class="form-control">
    </div>
    @php $input = "costs[]"; @endphp
    <label class="col-lg-2 control-label">سعر</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
    </div>
    @php $input = "discounts[]"; @endphp
    <label class="col-lg-2 control-label">الخصم</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 0 }}" class="form-control">
    </div>
</div>

<div class="form-group">
    @php $input = "products[]"; @endphp
    <label class="col-lg-2 control-label"> المنتج</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
        >
    </div>
</div>

<div class="form-group">

    @php $input = "quantity[]"; @endphp
    <label class="col-lg-2 control-label">كمية</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 1 }}" class="form-control">
    </div>
    @php $input = "costs[]"; @endphp
    <label class="col-lg-2 control-label">سعر</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
    </div>
    @php $input = "discounts[]"; @endphp
    <label class="col-lg-2 control-label">الخصم</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 0 }}" class="form-control">
    </div>
</div>

<div class="form-group">
    @php $input = "products[]"; @endphp
    <label class="col-lg-2 control-label"> المنتج</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control"
        >
    </div>
</div>

<div class="form-group">

    @php $input = "quantity[]"; @endphp
    <label class="col-lg-2 control-label">كمية</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 1 }}" class="form-control">
    </div>
    @php $input = "costs[]"; @endphp
    <label class="col-lg-2 control-label">سعر</label>
    <div class="col-lg-2">
        <input type="text"    name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
    </div>
    @php $input = "discounts[]"; @endphp
    <label class="col-lg-2 control-label">الخصم</label>
    <div class="col-lg-2">
        <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : 0 }}" class="form-control">
    </div>
</div>
