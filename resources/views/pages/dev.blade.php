@php
	$steps = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
	$substeps = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
@endphp

<x-layouts.base-layout title="Страница отладки">

	<x-type::h size="5">OKLCH:</x-type::h>
	<x-type::hint>С подстройкой интерполяции через tailwind</x-type::hint>
	<div class="grid">
		@foreach($steps as $step)
			<div class="box box_{{ $step }}">
				{{ $step }}
			</div>
		@endforeach
	</div>

	<x-type::h size="5">OKLCH:</x-type::h>
	<div class="grid">
		@foreach($steps as $step)
			<div class="box box_oklch-{{ $step }}">
				{{ $step }}
			</div>
		@endforeach
	</div>

	<x-type::h size="5">HSL:</x-type::h>
	<div class="grid">
		@foreach($steps as $step)
			<div class="box box_hsl-{{ $step }}">
				{{ $step }}
			</div>
		@endforeach
	</div>

</x-layouts.base-layout>
