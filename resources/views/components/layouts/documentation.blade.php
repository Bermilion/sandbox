<div class="layout">
	<x-sidebar>
		<x-type::supheading>Основные концепции</x-type::supheading>
		<x-ui.menu>
			<x-ui.menu-item><x-base::link mod="dark" href="/" text="Адаптивная система шрифтов"/></x-ui.menu-item>
			<x-ui.menu-item><x-base::link mod="dark" href="/pages/base-block" text="Базовый блок"/></x-ui.menu-item>
			<x-ui.menu-item><x-base::link mod="dark" href="/pages/responsive-design" text="Адаптивный дизайн"/></x-ui.menu-item>
			<x-ui.menu-item><x-base::link mod="dark" href="/pages/typography" text="Типографика" /></x-ui.menu-item>
			<x-ui.menu-item><x-base::link mod="dark" href="/pages/colors" text="Цвет" /></x-ui.menu-item>
			<x-ui.menu-item><x-base::link mod="dark" href="/pages/sizes" text="Интервалы" /></x-ui.menu-item>
			<x-ui.menu-item><x-base::link mod="dark" href="/pages/components" text="Компоненты" /></x-ui.menu-item>
		</x-ui.menu>
	</x-sidebar>
	<x-main>
		{{ $slot }}
	</x-main>
</div>
