@props([
	'mod' => null,
])

@php
	// Формируем модификатор только если mode передан
    $class = 'wrapper';
    if ($mod) {
        $class .= ' wrapper_' . $mod;
    }
    $class = trim($class);
@endphp

<div {{ $attributes->class($class) }}>
	{{ $slot }}
</div>
