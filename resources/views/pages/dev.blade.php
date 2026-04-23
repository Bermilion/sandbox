@php
	$steps = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
	$substeps = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
@endphp

<x-layouts.base-layout title="Страница отладки">

	<div class="grid">
{{--		@foreach ($steps as $step)--}}
{{--			@foreach($substeps as $substep)--}}
{{--				<div class="box box_red-{{ $step }}-{{ $substep }}"></div>--}}
{{--			@endforeach--}}
{{--		@endforeach--}}
{{--		@foreach ($colors as $color)--}}
{{--			<div class="box box_accent-{{ $color }}"></div>--}}
{{--		@endforeach--}}
{{--		@foreach ($colors as $color)--}}
{{--			<div class="box box_gray-{{ $color }}"></div>--}}
{{--		@endforeach--}}
{{--		<div class="box box_color"></div>--}}
		<div class="box box_1"></div>
		<div class="box box_2"></div>
	</div>

</x-layouts.base-layout>
