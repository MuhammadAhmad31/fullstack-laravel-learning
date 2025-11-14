{{-- <div class=" bg-yellow-500 w-[500px] gap-5 p-5 flex flex-col justify-between items-center"> --}}
<div {{ $attributes->merge(['class' => 'bg-yellow-500 w-[500px] gap-5 p-5 flex flex-col justify-between items-center' . ($shadow ? ' shadow-lg' : '')]) }} >
    <div>
        {{ $header }}
    </div>
    <div>
        {{ $content }}
    </div>
    <div>
        {{ $footer }}
    </div>
</div>
