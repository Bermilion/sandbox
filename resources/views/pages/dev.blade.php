@php
	$scales = [1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800];
@endphp

<x-layouts.base-layout title="Страница отладки">
{{--	<div class="wrapper">--}}
{{--		<x-base::button text="Открыть модальное окно" popovertarget="modal"/>--}}
{{--		<dialog popover="auto" id="modal" class="modal">--}}
{{--			<x-base::button text="×" class="modal__button-close" popovertarget="modal" aria-label="close"/>--}}
{{--			<x-type::h size="2">I'm <x-ui.code>manual</x-ui.code> Popover 2!</x-type::h>--}}
{{--			<x-type::p>A <x-ui.code>manual</x-ui.code> popover can <strong>not</strong> be "light dismissed".</x-type::p>--}}
{{--			<x-type::p>Opening a <x-ui.code>manual</x-ui.code> popover does <strong>not</strong> automatically close any other <x-ui.code>manual</x-ui.code> popovers that were open, but <em>will</em> close any <x-ui.code>auto</x-ui.code> popovers that were open.</x-type::p>--}}
{{--			<x-type::p>Clicking the <x-ui.code>button</x-ui.code> a second time will close the one it opened.</x-type::p>--}}
{{--			<x-type::p>Note this popover also has a "close" <x-ui.code>button</x-ui.code>.</x-type::p>--}}
{{--		</dialog>--}}
{{--	</div>--}}
{{--	<div class="wrapper">--}}
{{--		<details name="foo">--}}
{{--			<summary>Initially open, clicking others will close this</summary>--}}
{{--			Content is initially visible, but can be hidden by clicking the summary; only one panel can be open at a time.--}}
{{--		</details>--}}
{{--		<details name="foo">--}}
{{--			<summary>Initially closed, clicking will open this, and close others</summary>--}}
{{--			Content is initially hidden, but can be revealed by clicking the summary; only one panel can be open at a time.--}}
{{--		</details>--}}
{{--		<details name="foo">--}}
{{--			<summary>Initially closed, clicking will open this, and close others</summary>--}}
{{--			Content is initially hidden, but can be revealed by clicking the summary; only one panel can be open at a time.--}}
{{--		</details>--}}
{{--	</div>--}}



{{--	<div class="wrapper">--}}
{{--		<div class="viewport viewport_w">Широкий экран</div>--}}
{{--		<div class="viewport viewport_l">Ноутбук</div>--}}
{{--		<div class="viewport viewport_tp">Вертикальный планшет</div>--}}
{{--		<div class="viewport viewport_pp">Вертикальный смартфон</div>--}}
{{--		<div class="viewport viewport_tl">Горизонтальный планшет</div>--}}
{{--		<div class="viewport viewport_pl">Горизонтальный смартфон</div>--}}
{{--	</div>--}}
{{--	<div class="wrapper_grid">--}}
{{--		<div class="grid">--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--			<div class="grid__item"></div>--}}
{{--		</div>--}}
{{--	</div>--}}
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

{{--	<div class="wrapper">--}}
{{--		<x-base::link href="#" icon="bars" text="Link"/>--}}
{{--		<x-base::link href="#" icon="bars" icon-right text="Link"/>--}}
{{--		<x-base::button icon="chevron-left" text="Button"/>--}}
{{--		<x-base::button icon="thumbs-up" icon-right text="Button"/>--}}
{{--		<x-base::button icon="chevron-left"/>--}}
{{--		<x-base::button icon="chevron-left" text="Button" disabled="true" />--}}
{{--		<x-base::button icon="chevron-left" mod="disabled" text="Button" />--}}
{{--	</div>--}}
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="bars" variant="white" square/>
		<x-chunker::button icon="bars" variant="white" square disabled/>
		<x-chunker::button icon="bars" square/>
		<x-chunker::button icon="bars" square disabled/>
		<x-chunker::button icon="bars" color="success" square/>
		<x-chunker::button icon="bars" color="success" square disabled/>
		<x-chunker::button icon="bars" color="danger" square/>
		<x-chunker::button icon="bars" color="danger" square disabled/>
		<x-chunker::button icon="bars" variant="outline" square/>
		<x-chunker::button icon="bars" variant="outline" square disabled/>
		<x-chunker::button icon="bars" variant="outline" color="success" square/>
		<x-chunker::button icon="bars" variant="outline" color="success" square disabled/>
		<x-chunker::button icon="bars" variant="outline" color="danger" square/>
		<x-chunker::button icon="bars" variant="outline" color="danger" square disabled/>
		<x-chunker::button icon="bars" variant="ghost" square/>
		<x-chunker::button icon="bars" variant="ghost" square disabled/>
		<x-chunker::button icon="bars" variant="ghost" color="success" square/>
		<x-chunker::button icon="bars" variant="ghost" color="success" square disabled/>
		<x-chunker::button icon="bars" variant="ghost" color="danger" square/>
		<x-chunker::button icon="bars" variant="ghost" color="danger" square disabled/>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="play" size="sm" square/>
		<x-chunker::button icon="play" square/>
		<x-chunker::button icon="play" size="lg" square/>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="chevron-left" variant="white">Button</x-chunker::button>
		<x-chunker::button icon="chevron-left" variant="white" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle">Button</x-chunker::button>
		<x-chunker::button icon="chevron-left" disabled>Button</x-chunker::button>
		<x-chunker::button icon="route" href="#" variant="ghost" size-scale="none" size-font="sm" color="gray">Построить<br>маршрут</x-chunker::button>
		<x-chunker::button icon="taxi" href="#" variant="ghost" size-scale="none" size-font="sm" color="gray">Вызвать<br>такси</x-chunker::button>
		<x-chunker::button icon="map" href="#" variant="ghost" size-scale="none" size-font="sm" color="gray">Открыть<br>на карте</x-chunker::button>
		<x-chunker::button icon="thumbs-up" variant="ghost" size-scale="none" color="gray">1000</x-chunker::button>
		<x-chunker::button icon="route-solid" variant="ghost" size-scale="none" color="dark" weight="bold" size-font="lg">Мой маршрут</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="primary" color="success">Button</x-chunker::button>
		<x-chunker::button icon="chevron-left" variant="primary" color="success" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="primary" color="danger">Button</x-chunker::button>
		<x-chunker::button icon="chevron-left" variant="primary" color="danger" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="outline">Button</x-chunker::button>
		<x-chunker::button icon="plus-circle" variant="outline" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="outline" color="success">Button</x-chunker::button>
		<x-chunker::button icon="plus-circle" variant="outline" color="success" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="outline" color="danger">Button</x-chunker::button>
		<x-chunker::button icon="plus-circle" variant="outline" color="danger" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="ghost">Button</x-chunker::button>
		<x-chunker::button icon="plus-circle" variant="ghost" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="ghost" color="success">Button</x-chunker::button>
		<x-chunker::button icon="plus-circle" variant="ghost" color="success" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="plus-circle" variant="ghost" color="danger">Button</x-chunker::button>
		<x-chunker::button icon="plus-circle" variant="ghost" color="danger" disabled>Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon="chevron-left" size-scale="sm">Button</x-chunker::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-chunker::button icon:trailing="arrow-back-rounded" size-icon="base" size="lg" weight="bold">Выбрать маршрут</x-chunker::button>
	</div>
</x-layouts.base-layout>
