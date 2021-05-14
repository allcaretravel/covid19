<div>
    <div class="form-group">
        <label>Country:</label>
         <!-- wire:model   is not work-->
        <select name="country"  wire:model="country" class="form-control input-lg"> 
                <option select disabled>Choose a country</option>
                @foreach($countries as $country)
                    <option value={{$country->id}}>{{$country->name}}</option>
                @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="area">Area:</label>
        <select name="area" class="form-control input-lg">
                <option>Choose a area</option>
               @foreach($areas as $area)
                    <option value={{$area->id}}>{{$area->name}}</option>
            @endforeach
        </select>
    </div>

</div>
