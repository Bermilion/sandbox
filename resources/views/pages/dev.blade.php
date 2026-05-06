@php
	$scales = [1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800];
@endphp

<x-layouts.base-layout title="Страница отладки">
	<div class="wrapper">
		<x-base::button text="Открыть модальное окно" popovertarget="modal"/>
		<dialog popover="auto" id="modal" class="modal">
			<x-base::button text="×" class="modal__button-close" popovertarget="modal" aria-label="close"/>
			<x-type::h size="2">I'm <x-ui.code>manual</x-ui.code> Popover 2!</x-type::h>
			<x-type::p>A <x-ui.code>manual</x-ui.code> popover can <strong>not</strong> be "light dismissed".</x-type::p>
			<x-type::p>Opening a <x-ui.code>manual</x-ui.code> popover does <strong>not</strong> automatically close any other <x-ui.code>manual</x-ui.code> popovers that were open, but <em>will</em> close any <x-ui.code>auto</x-ui.code> popovers that were open.</x-type::p>
			<x-type::p>Clicking the <x-ui.code>button</x-ui.code> a second time will close the one it opened.</x-type::p>
			<x-type::p>Note this popover also has a "close" <x-ui.code>button</x-ui.code>.</x-type::p>
		</dialog>
	</div>
	<div class="wrapper">
		<details name="foo">
			<summary>Initially open, clicking others will close this</summary>
			Content is initially visible, but can be hidden by clicking the summary; only one panel can be open at a time.
		</details>
		<details name="foo">
			<summary>Initially closed, clicking will open this, and close others</summary>
			Content is initially hidden, but can be revealed by clicking the summary; only one panel can be open at a time.
		</details>
		<details name="foo">
			<summary>Initially closed, clicking will open this, and close others</summary>
			Content is initially hidden, but can be revealed by clicking the summary; only one panel can be open at a time.
		</details>
	</div>



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
	<div class="wrapper_layout">
		<div class="grid-cards">
			<x-card-1/>
			<x-card-2/>
			<x-card-1/>
			<x-card-2/>
			<x-card-1/>
			<x-card-2/>
			<x-card-1/>
			<x-card-2/>
		</div>
	</div>

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
