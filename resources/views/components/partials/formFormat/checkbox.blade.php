<div class="flex flex-col gap-2">

    @foreach ($options as $value => $label)
        @php
            $isChecked = is_array(old($name, $valueSelected))
                ? in_array($value, old($name, $valueSelected))
                : !empty($valueSelected) && in_array($value, (array) $valueSelected);
        @endphp

        <label class="flex items-center gap-2">
            <input type="checkbox" name="{{ $name }}[]" value="{{ $value }}" @checked($isChecked)>
            {{ $label }}
        </label>
    @endforeach

</div>
