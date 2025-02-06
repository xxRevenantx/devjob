@props(['color' => 'indigo'])

@php
    $bgColor = "bg-red-300";
    $borderColor = "border-white-100";
    $textColor = "text-white-700";
    $iconColor = "text-{$color}-500";
@endphp


<div  {{ $attributes->merge(['class' => "$bgColor $borderColor $textColor px-4 py-3 rounded relative"]) }} >


    <span class="block sm:inline">{{ $slot }}</span>

</div>
