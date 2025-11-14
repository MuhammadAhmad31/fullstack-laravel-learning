@php
    $value = $item[$column];
@endphp

{{ $value ? 'Rp ' . number_format($value, 0, ',', '.') : '-' }}