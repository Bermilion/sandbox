<div class="layout">
	<x-sidebar>
		<x-base::link href="/" text="Главная"/>
		<x-base::link href="/pages/base-block" text="Базовый блок"/>
		<x-base::link href="/pages/responsive-design" text="Адаптивный дизайн"/>
		<x-base::link href="/pages/typography" text="Типографика" />
	</x-sidebar>
	<x-main>
		{{ $slot }}
	</x-main>
</div>
