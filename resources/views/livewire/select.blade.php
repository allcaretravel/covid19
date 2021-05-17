<div>
    <div class="form-group">
        <label>Province:</label>
        <select name="province"  wire:model="province" class="form-control input-lg"> 
                <option>Choose a province</option>
                @foreach($provinces as $province)
                    <option value='{{$province->id}}'>{{$province->name}}</option>
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