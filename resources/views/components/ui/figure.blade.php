@props([
	'mod' => null,
])

@php
	use Chunker2i\Base\Traits\ModifiersTrait;

	// Create anonymous class to use trait
	$modifierHelper = new class {
		use ModifiersTrait;
	};

	// Build CSS class with modifiers
	$class = $modifierHelper->buildModifiersClass('figure', $mod);
@endphp

<figure {{ $attributes->class($class) }}>
	<div class="figure__content">
		{!! $slot !!}
	</div>
	@if ($slot->isNotEmpty())
		<div class="figure__code">
			<x-ui.code mod="block">
				{{ $code }}
			</x-ui.code>
		</div>
	@endif
</figure>
