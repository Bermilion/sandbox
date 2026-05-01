@php
	$scales = [1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800];
@endphp

<x-layouts.base-layout title="Страница отладки">
	<div class="wrapper">
		<x-base::link href="#" icon="bars" text="Link"/>
		<x-base::link href="#" icon="bars" icon-right text="Link"/>
		<x-base::button icon="chevron-left" text="Button"/>
		<x-base::button icon="thumbs-up" icon-right text="Button"/>
		<x-base::button icon="chevron-left"/>
		<x-base::button icon="chevron-left" text="Button" disabled="true" />
		<x-base::button icon="chevron-left" mod="disabled" text="Button" />
	</div>
</x-layouts.base-layout>
