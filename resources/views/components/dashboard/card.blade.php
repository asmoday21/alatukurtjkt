@props(['icon', 'title', 'route', 'text', 'color' => 'blue', 'extra' => []])

<div class="bg-white p-5 rounded-lg shadow-lg border hover:shadow-xl transition">
    <div class="flex items-center gap-3 mb-3">
        <span class="text-2xl">{{ $icon }}</span>
        <h4 class="text-lg font-semibold text-gray-700">{{ $title }}</h4>
    </div>
    <p class="text-sm text-gray-500 mb-4">{{ $text }}</p>
    <a href="{{ $route }}" class="inline-block bg-{{ $color }}-500 hover:bg-{{ $color }}-600 text-white px-4 py-2 rounded transition mb-2">
        Buka {{ $title }}
    </a>

    {{-- Extra buttons --}}
    @foreach ($extra as [$label, $url, $btnColor])
        <a href="{{ $url }}" class="block bg-{{ $btnColor }}-500 hover:bg-{{ $btnColor }}-600 text-white px-4 py-2 rounded transition mt-2">
            {{ $label }}
        </a>
    @endforeach
</div>
