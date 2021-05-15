<div>
    <div class="form-group">
        <label>Country:</label>
        <select name="country"  wire:model="countryc" class="form-control input-lg"> 
                <option>Choose a country</option>
                @foreach($countries as $country)
                    <option value='{{$country->id}}'>{{$country->name}}</option>
                @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="area">Area:</label>
        <select name="area"  wire:model="area" class="form-control input-lg">
                <option>Choose a area</option>
                @foreach($areas as $area)
                    <option value='{{$area->id}}'>{{$area->name}}</option>
                @endforeach
        </select>
    </div>
</div>