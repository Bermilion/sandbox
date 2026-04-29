@php
	$scales = [1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800];
@endphp

<x-layouts.base-layout title="Страница отладки">
	<div class="block-scales">
		@foreach($scales as $scale)
			<div class="box-scale box-scale_{{ $scale }}"></div>
		@endforeach

		<div class="box-scale box-scale_dark-blue"></div>
	</div>
</x-layouts.base-layout>
