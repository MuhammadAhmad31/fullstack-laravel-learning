<div class="flex flex-col gap-2">

    @foreach ($options as $value => $label)
        <label class="flex items-center gap-2">
            <input 
                type="radio"
                name="{{ $name }}"
                value="{{ $value }}"
                @checked(old($name, $valueSelected) == $value)
            >
            {{ $label }}
        </label>
    @endforeach

</div>
