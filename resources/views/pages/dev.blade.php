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
		<div class="box box_color-6">light-50 50</div>
		<div class="box box_color-5">light-40 100</div>
		<div class="box box_color-4">light-30 200</div>
		<div class="box box_color-3">light-20 300</div>
		<div class="box box_color-2">light-10 400</div>
		<div class="box box_color-1">base 500</div>
		<div class="box box_color-7">dark-10 600</div>
		<div class="box box_color-8">dark-20 700</div>
		<div class="box box_color-9">dark-30 800</div>
		<div class="box box_color-10">dark-40 900</div>
		<div class="box box_color-11">dark-50 950</div>
{{--		<div class="box box_red-origin-50"></div>--}}
{{--		@foreach ($steps as $step)--}}
{{--			<div class="box box_red-my-{{ $step }}"></div>--}}
{{--		@endforeach--}}
{{--		<div class="box box_color"></div>--}}
{{--		<div class="box box_1"></div>--}}
{{--		<div class="box box_2"></div>--}}
	</div>

</x-layouts.base-layout>
