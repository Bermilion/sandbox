@props([
	'mod' => null,
])

@php
	// Формируем модификатор только если mode передан
    $class = 'highlight';
    if ($mod) {
        $class .= ' highlight_' . $mod;
    }
    $class = trim($class);
@endphp

<div {{ $attributes->class($class) }}>
	{{ $slot }}
</div>
