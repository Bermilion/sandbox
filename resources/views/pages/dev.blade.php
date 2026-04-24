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
{{--		@foreach ($steps as $step)--}}
{{--			<div class="box box_color-{{ $step }}">{{ $step }}</div>--}}
{{--		@endforeach--}}
		<div class="box box_color-1"></div>
		<div class="box box_color-2"></div>
		<div class="box box_color-3"></div>
		<div class="box box_color-4"></div>
		<div class="box box_color-5"></div>
{{--		<div class="box box_red-origin-50"></div>--}}
{{--		@foreach ($steps as $step)--}}
{{--			<div class="box box_red-my-{{ $step }}"></div>--}}
{{--		@endforeach--}}
{{--		<div class="box box_color"></div>--}}
{{--		<div class="box box_1"></div>--}}
{{--		<div class="box box_2"></div>--}}
	</div>

</x-layouts.base-layout>
