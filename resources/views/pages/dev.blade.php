@php
	$scales = [1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800];
@endphp

<x-layouts.base-layout title="Страница отладки">
	<div class="wrapper">
		<x-base::button text="Открыть модальное окно" popovertarget="modal-price"/>
		<dialog popover="auto" id="modal-price" class="modal">
			<div class="modal__button-close">
				<x-base::button variant="ghost" icon="times" size="sm" size-icon="lg" size-scale="none" popovertarget="modal-price" aria-label="close"/>
			</div>
			<x-type::h size="2" class="mb-16">Выберите тариф</x-type::h>
			<x-type::p class="mb-24">Доступ на 24 часа с момента покупки</x-type::p>
			<div class="modal__plan-grid">
				<x-price-card title="Один маршрут" price="300"/>
				<x-price-card title="Три маршрута" price="500" active/>
				<x-price-card title="Безлимит" price="700"/>
			</div>
		</dialog>

		<dialog popover="auto" id="modal-form" class="modal">
			<div class="modal__button-close">
				<x-base::button variant="ghost" icon="times" size="sm" size-icon="lg" size-scale="none" popovertarget="modal-form" aria-label="close"/>
			</div>
			<x-type::h size="2" class="mb-16">Введите контакты</x-type::h>
			<x-type::p class="mb-24">Чек и ссылка на маршрут придут на указанный вами телефон или почту</x-type::p>
			<form action="" class="modal__form">
				<select name="plan" id="plan">
					<option value="300">300</option>
					<option value="500">500</option>
					<option value="700">700</option>
				</select>
				<input
					type="tel"
					id="phone"
					name="phone"
					class="form-control iti__tel-input"
					title="Введите свой номер телефона"
					data-intl-tel-input-id="0"
					autocomplete="tel"
					inputmode="tel"
					placeholder="912 345-67-89"
				>
				<x-base::button type="submit" text="Перейти к оплате" icon:trailing="arrow-back-rounded"/>
			</form>
		</dialog>
	</div>
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
		<x-utils::icon name="spinner" class="animate-spin"/>
		<x-base::button icon="bars" variant="white"/>
		<x-base::button icon="bars" variant="white" disabled/>
		<x-base::button icon="bars"/>
		<x-base::button icon="bars" disabled/>
		<x-base::button icon="bars" color="success"/>
		<x-base::button icon="bars" color="success" disabled/>
		<x-base::button icon="bars" color="danger"/>
		<x-base::button icon="bars" color="danger" disabled/>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="bars" variant="outline"/>
		<x-base::button icon="bars" variant="outline" disabled/>
		<x-base::button icon="bars" variant="outline" color="success"/>
		<x-base::button icon="bars" variant="outline" color="success" disabled/>
		<x-base::button icon="bars" variant="outline" color="danger"/>
		<x-base::button icon="bars" variant="outline" color="danger" disabled/>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="bars" variant="ghost"/>
		<x-base::button icon="bars" variant="ghost" square disabled/>
		<x-base::button icon="bars" variant="ghost" color="success"/>
		<x-base::button icon="bars" variant="ghost" color="success" disabled/>
		<x-base::button icon="bars" variant="ghost" color="danger"/>
		<x-base::button icon="bars" variant="ghost" color="danger" disabled/>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="play" size="sm" square/>
		<x-base::button icon="play" square/>
		<x-base::button icon="play" size="lg" square/>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button active>Button</x-base::button>
		<x-base::button loading>Button</x-base::button>
		<x-base::button variant="white" loading>Button</x-base::button>
		<x-base::button icon="chevron-left" variant="white">Button</x-base::button>
		<x-base::button icon="chevron-left" variant="white" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle">Button</x-base::button>
		<x-base::button icon="chevron-left" disabled>Button</x-base::button>
		<x-base::button icon="route" href="#" variant="ghost" size-scale="none" size-font="sm" color="gray">Построить<br>маршрут</x-base::button>
		<x-base::button icon="taxi" href="#" variant="ghost" size-scale="none" size-font="sm" color="gray">Вызвать<br>такси</x-base::button>
		<x-base::button icon="map" href="#" variant="ghost" size-scale="none" size-font="sm" color="gray">Открыть<br>на карте</x-base::button>
		<x-base::button icon="thumbs-up" variant="ghost" size-scale="none" color="gray">1000</x-base::button>
		<x-base::button icon="route-solid" variant="ghost" size-scale="none" color="dark" weight="bold" size-font="lg">Мой маршрут</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="primary" color="success">Button</x-base::button>
		<x-base::button icon="chevron-left" variant="primary" color="success" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="primary" color="danger">Button</x-base::button>
		<x-base::button icon="chevron-left" variant="primary" color="danger" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="outline">Button</x-base::button>
		<x-base::button icon="plus-circle" variant="outline" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="outline" color="success">Button</x-base::button>
		<x-base::button icon="plus-circle" variant="outline" color="success" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="outline" color="danger">Button</x-base::button>
		<x-base::button icon="plus-circle" variant="outline" color="danger" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="ghost">Button</x-base::button>
		<x-base::button icon="plus-circle" variant="ghost" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="ghost" color="success">Button</x-base::button>
		<x-base::button icon="plus-circle" variant="ghost" color="success" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="plus-circle" variant="ghost" color="danger">Button</x-base::button>
		<x-base::button icon="plus-circle" variant="ghost" color="danger" disabled>Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button icon="chevron-left" size-scale="sm">Button</x-base::button>
	</div>
	<div class="wrapper wrapper_buttons">
		<x-base::button
			icon:trailing="arrow-back-rounded"
			size-icon="md"
			size="lg"
			weight="bold"
			text="Выбрать маршрут"
		/>
	</div>

	@livewire('test-loading')
</x-layouts.base-layout>
