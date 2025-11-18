<select 
    name="{{ $name }}" 
    class="w-full border px-3 py-2 rounded"
>
    @foreach ($options as $value => $label)
        <option 
            value="{{ $value }}" 
            @selected(old($name, $valueSelected) == $value)
        >
            {{ $label }}
        </option>
    @endforeach
</select>
