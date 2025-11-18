<input 
    type="file"
    name="{{ $name }}"
    class="w-full border px-3 py-2 rounded"
>

@if($value)
    <p class="text-sm mt-2">Current file: <strong>{{ $value }}</strong></p>
@endif
