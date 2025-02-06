@props(['color' => 'indigo'])

@php
    $bgColor = "bg-{$color}-500";
    $borderColor = "border-white-100";
    $textColor = "text-white-700";
    $iconColor = "text-{$color}-500";
@endphp


<div x-data="{ show: true }" x-show="show" {{ $attributes->merge(['class' => "$bgColor $borderColor $textColor px-4 py-3 rounded relative"]) }} >

    <svg class="inline-block h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
        <path fill="#4caf50" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
        <path fill="#ccff90" d="M34.602,14.602L21,28.199l-5.602-5.598l-2.797,2.797L21,33.801l16.398-16.402L34.602,14.602z"></path>
    </svg>
    <span class="block sm:inline">{{ $slot }}</span>
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
        <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z"/>
        </svg>
    </button>
</div>
