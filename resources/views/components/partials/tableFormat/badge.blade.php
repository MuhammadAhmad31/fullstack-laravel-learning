@php
    $value = $item[$column];
    $color = 'bg-gray-400';

    if(in_array($value, ['active', 'success', 'completed'])) {
        $color = 'bg-green-500';
    } elseif(in_array($value, ['pending', 'in progress', 'warning'])) {
        $color = 'bg-yellow-500';
    } elseif(in_array($value, ['inactive', 'failed', 'canceled'])) {
        $color = 'bg-red-500';
    }
@endphp

<span class="px-2 py-1 text-xs text-white rounded {{ $color }}">
    {{ $value ?: '-' }}
</span>