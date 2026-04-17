<x-layouts.base-layout title="Адаптивный дизайн">
	<x-layouts.documentation>
		<x-layouts.wrapper>
			<x-type::h size="1" class="mt-64 mb-40">Вьюпорты и сетки</x-type::h>
			<x-type::p class="mb-16">
				Вьюпорт — это область просмотра страницы сайта. Размер вьюпорта обычно зависит от устройства, с которого
				смотрят сайт.
			</x-type::p>
			<x-type::p class="mb-16">
				Сетка — это система, используемая для организации контента в макетах. С помощью сетки можно легко
				выстраивать элементы, сохраняя при этом баланс и пропорциональность между ними.
			</x-type::p>
			<x-type::p class="mb-16">
				В макетах мы используем колоночную сетку, которая разбивает контент макета на вертикальные колонки.
			</x-type::p>
			<x-type::h size="2" class="mt-48 mb-32">Размеры</x-type::h>

			<x-type::p class="mb-16">Сетка адаптируется под 4 основных вьюпорта:</x-type::p>
			<x-type::ul mod="disc" class="mb-16">
				<x-type::li class="mb-8">широкий экран — wide</x-type::li>
				<x-type::li class="mb-8">ноутбук — laptop</x-type::li>
				<x-type::li class="mb-8">вертикальный планшет — tablet portrait</x-type::li>
				<x-type::li>вертикальный смартфон — phone portrait</x-type::li>
			</x-type::ul>

			<x-type::p class="mb-16">И два дополнительных:</x-type::p>
			<x-type::ul mod="disc" class="mb-16">
				<x-type::li class="mb-8">горизонтальный планшет — tablet landscape</x-type::li>
				<x-type::li>горизонтальный смартфон — phone landscape</x-type::li>
			</x-type::ul>

			<div class="hightlight hightlight_warning mb-24">
				Обычные макеты адаптируем под 4 основных вьюпорта: wide, laptop, tablet portrait и phone portrait.
				Дополнительные вьюпорты используем только по необходимости
			</div>

			<x-type::p class="mb-16">Для каждого вьюпорта сетка имеет заданные параметры:</x-type::p>
			<x-type::ul mod="disc" class="mb-16">
				<x-type::li class="mb-8">ширину контента</x-type::li>
				<x-type::li class="mb-8">количество колонок — count</x-type::li>
				<x-type::li class="mb-8">межколонник — gutter</x-type::li>
				<x-type::li>поля — margin</x-type::li>
			</x-type::ul>

			<div class="viewport mb-64">
				<p class="viewport__item viewport_mobile">Мобильное устройство</p>
				<p class="viewport__item viewport_phone">Смартфон</p>
				<p class="viewport__item viewport_phone-portrait">Смартфон вертикальный</p>
				<p class="viewport__item viewport_phone-landscape">Смартфон горизонтальный</p>
				<p class="viewport__item viewport_tablet">Планшет</p>
				<p class="viewport__item viewport_tablet-portrait">Планшет вертикальный</p>
				<p class="viewport__item viewport_tablet-landscape">Планшет горизонтальный</p>
				<p class="viewport__item viewport_desktop">Десктоп</p>
				<p class="viewport__item viewport_laptop">Ноутбук</p>
				<p class="viewport__item viewport_wide">Широкоэкранник</p>
				<p class="viewport__item viewport_no-phone">Все кроме телефонов</p>
			</div>
		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
