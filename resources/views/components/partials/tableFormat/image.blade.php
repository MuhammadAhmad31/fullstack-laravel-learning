@php
    $value = $item[$column]
@endphp

@if($value)
    <img src={{ $value }} 
        alt="Image"
        class="w-12 h-12 rounded object-cover border"
    />
@else
    <span class="text-gray-500">No Image</span>
@endif