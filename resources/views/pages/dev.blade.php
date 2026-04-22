@php
	$colors = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
@endphp

<x-layouts.base-layout title="Страница отладки">

	<div class="grid">
		@foreach ($colors as $color)
			<div class="box box_red-{{ $color }}"></div>
		@endforeach
		@foreach ($colors as $color)
			<div class="box box_accent-{{ $color }}"></div>
		@endforeach
		@foreach ($colors as $color)
			<div class="box box_gray-{{ $color }}"></div>
		@endforeach
	</div>

</x-layouts.base-layout>
