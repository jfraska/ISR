@props([
    "textColor",
    "bgColor",
])
<button
    {{ $attributes }}
    style="background-color: {{ $bgColor }}; color: {{ $textColor }}"
    class="rounded-xl px-3 py-1 text-base"
>
    {{ $slot }}
</button>
