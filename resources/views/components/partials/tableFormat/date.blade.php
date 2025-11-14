@php
    $value = $item[$column] ?? null;
@endphp

{{ $value ? \Carbon\Carbon::parse($value)->format('d M Y') : '-' }}