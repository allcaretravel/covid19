@php
    $province = \App\Models\Models\ProvinceModel::pluck('name','id');
@endphp
<select name="province_id" class="form-control @error('province_id') is-invalid @enderror">
    <option value="">Please Select</option>
    @if(count($province) > 0)
        @foreach($province as $key => $pro)
            <option value="{{$key}}">{{$pro}}</option>
        @endforeach
    @endif
</select>
@error('province_id')
<div class="invalid-feedback">{{$message}}</div>
@enderror
