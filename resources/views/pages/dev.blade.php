<x-layouts.base-layout title="Страница отладки">

	<div class="grid">
		@foreach (["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"] as $color)
			<div class="box box_red-{{ $color }}"></div>
		@endforeach
	</div>

	<div class="pfpf">Text</div>

</x-layouts.base-layout>
