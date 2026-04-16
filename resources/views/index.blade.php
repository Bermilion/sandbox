<x-layouts.base-layout title="Документация">
	<x-layouts.documentation>
		<x-layouts.wrapper>
			<x-type::h size="1" class="mt-64 mb-48">Гибридная адаптивная система шрифтов</x-type::h>

			<x-type::p class="mb-16">
				Система rem-clamp сочетает математическую точность расчетов на основе viewport
				с контролируемым ростом функции clamp(). Это обеспечивает плавное масштабирование
				размера шрифта корня (html) в зависимости от ширины экрана устройства.
			</x-type::p>

			<x-type::p class="mb-24">
				Вместо фиксированных значений font-size используется CSS-функция clamp(),
				 которая задаёт минимальный, предпочтительный и максимальный размер шрифта.
			</x-type::p>

			<x-type::h size="2" class="mt-64 mb-32">Принцип работы</x-type::h>

			<x-type::p class="mb-16">Система рассчитывает размер шрифта для каждого типа устройства:</x-type::p>

			<div class="highlight highlight_info mb-24">
				Телефон портрет (360px-767px): 8px → 9px
			</div>

			<div class="highlight highlight_info mb-24">
				Телефон ландшафт (800px-1023px): 8px → 10px
			</div>

			<div class="highlight highlight_info mb-24">
				Планшет портрет (768px-1023px): 8px → 10px
			</div>

			<div class="highlight highlight_info mb-24">
				Планшет ландшафт (1024px-1279px): 8px → 11px
			</div>

			<div class="highlight highlight_info mb-24">
				Ноутбук (1280px-1599px): 8px → 11px
			</div>

			<div class="highlight highlight_info mb-24">
				Широкий экран (1600px+): 8px → 12px
			</div>

			<x-type::h size="2" class="mt-64 mb-32">Математический расчёт</x-type::h>

			<x-type::p class="mb-16">
				Для линейного роста размера шрифта используется формула расчёта наклона (slope)
				и точки пересечения (intercept):
			</x-type::p>

			<div class="highlight highlight_succses mb-24">
				slope = (maxSize - minSize) / (rangeMax - rangeMin) × 100vw
			</div>

			<div class="highlight highlight_succses mb-24">
				intercept = minSize - slope × rangeMin
			</div>

			<x-type::p class="mb-24">
				Итоговый clamp() формируется как:
			</x-type::p>

			<div class="highlight highlight_succses mb-64">
				font-size: clamp(minSize, intercept + slope, maxSize)
			</div>

			<x-type::h size="2" class="mt-64 mb-32">Преимущества подхода</x-type::h>

			<x-type::p class="mb-16">Использование гибридной системы даёт несколько преимуществ:</x-type::p>

			<x-type::p class="mb-16">
				Плавное масштабирование без резких скачков при переходе между брейкпоинтами.
				Размер шрифта растёт линейно в пределах каждого диапазона viewport.
			</x-type::p>

			<x-type::p class="mb-16">
				Контролируемые границы — минимальный размер никогда не падает ниже 8px,
				а максимальный ограничен для каждого типа устройства.
			</x-type::p>

			<x-type::p class="mb-64">
				Математическая точность — расчёты основаны на реальных диапазонах viewport,
				что обеспечивает предсказуемое поведение на всех устройствах.
			</x-type::p>

			<x-type::h size="2" class="mt-64 mb-32">Использование в проекте</x-type::h>

			<x-type::p class="mb-16">
				Система автоматически применяется к элементу html через медиа-запросы
				для каждого типа viewport. Все размеры в rem будут автоматически масштабироваться
				относительно этого базового размера.
			</x-type::p>

			<x-type::p class="mb-64">
				Для настройки размеров можно изменить параметры в конфигурации viewports
				или скорректировать значения min/max в миксинах _adaptive-clamp и
				_root-font-size-clamped.
			</x-type::p>
		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
