@props(['href', 'color' => 'blue', 'class' => ''])

<a href="{{ $href }}"
   class="inline-block {{ $class }} bg-{{ $color }}-500 hover:bg-{{ $color }}-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
    {{ $slot }}
</a>
