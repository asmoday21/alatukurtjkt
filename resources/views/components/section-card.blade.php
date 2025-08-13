@props(['title'])

<div class="bg-white shadow-md rounded p-4 space-y-2">
    <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
    {{ $slot }}
</div>
