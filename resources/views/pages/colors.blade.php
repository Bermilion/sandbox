@php
	$colors = json_decode(file_get_contents(public_path('colors.json')), true);
@endphp

<x-layouts.base-layout title="Цвет">
	<x-layouts.documentation>
		<x-layouts.wrapper class="my-64">

			@foreach($colors as $colorName => $shades)
				@foreach($shades as $shadeName => $colorValue)
					<div class="box box_{{ $colorName }}-{{ $shadeName }}"></div>
					{{ $colorName }}-{{ $shadeName }}: {{ $colorValue }}
				@endforeach
			@endforeach


		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
