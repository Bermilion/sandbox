<div class="layout">
	<x-sidebar>
		<x-base::link href="/" text="Главная"/>
		<x-base::link href="/pages/base-block" text="Концепция"/>
		<x-base::link href="/pages/typography" text="Типографика" />
	</x-sidebar>
	<x-main>
		{{ $slot }}
	</x-main>
</div>
