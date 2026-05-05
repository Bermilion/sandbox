@php
	$scales = [1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800];
@endphp

<x-layouts.base-layout title="Страница отладки">
	<div class="wrapper">
		<div class="viewport viewport_w">Широкий экран</div>
		<div class="viewport viewport_l">Ноутбук</div>
		<div class="viewport viewport_tp">Вертикальный планшет</div>
		<div class="viewport viewport_pp">Вертикальный смартфон</div>
		<div class="viewport viewport_tl">Горизонтальный планшет</div>
		<div class="viewport viewport_pl">Горизонтальный смартфон</div>
	</div>
	<div class="wrapper_grid">
		<div class="grid">
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
			<div class="grid__item"></div>
		</div>
	</div>
{{--	<div class="wrapper_layout">--}}
{{--		<div class="grid-cards">--}}
{{--			<x-card-1/>--}}
{{--			<x-card-2/>--}}
{{--			<x-card-1/>--}}
{{--			<x-card-2/>--}}
{{--			<x-card-1/>--}}
{{--			<x-card-2/>--}}
{{--			<x-card-1/>--}}
{{--			<x-card-2/>--}}
{{--		</div>--}}
{{--	</div>--}}

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
