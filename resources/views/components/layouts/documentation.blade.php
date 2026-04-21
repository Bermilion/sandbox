<div class="layout">
	<x-sidebar>
		<x-base::link href="/" text="Адаптивная система шрифтов"/>
		<x-base::link href="/pages/base-block" text="Базовый блок"/>
		<x-base::link href="/pages/responsive-design" text="Адаптивный дизайн"/>
		<x-base::link href="/pages/typography" text="Типографика" />
		<x-base::link href="/pages/colors" text="Цвет" />
		<x-base::link href="/pages/sizes" text="Интервалы" />
		<x-base::link href="/pages/components" text="Компоненты" />
	</x-sidebar>
	<x-main>
		{{ $slot }}
	</x-main>
</div>
