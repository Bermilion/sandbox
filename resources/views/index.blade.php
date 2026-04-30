<x-layouts.base-layout title="Документация">
	<div class="layout">
		<x-sidebar>
			<x-type::supheading class="mb-12">Основная концепция</x-type::supheading>
			<x-ui.menu>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-micromodule">Микромодуль</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-clamp">Гибридная адаптация</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Адаптивный дизайн</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-typography">Типографика</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Цвет</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Интервалы</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Компоненты</x-base::link></x-ui.menu-item>
			</x-ui.menu>
		</x-sidebar>
		<x-main>
			<section id="anchor-micromodule" class="doc__section">
				<x-type::h size="1" class="mb-16">Микромодуль</x-type::h>
				<x-type::p class="mb-16">
					Микромодуль — это самая малая и неделимая часть сетки интерфейса. Микромодуль в интерфейсе не изображается,
					это условность и абстракция.
				</x-type::p>

				<div class="micromodule mb-32">
					<div class="box box_blue"></div>
				</div>

				<x-type::p class="mb-16">Размеры остальных элементов в интерфейсе, которые задаются вручную, кратны размеру микромодуля.</x-type::p>
				<x-type::p class="mb-16">Микромодуль в «Чанкере» — квадрат размером 8×8.</x-type::p>
				<x-type::p class="mb-16">То есть размеры остальных элементов в интерфейсе кратны 8.</x-type::p>

				<x-type::p class="mb-16">Корректный размер: 8, 16, 24, 32, 40 и т.д. — они делятся на 8 без остатка.</x-type::p>
				<div class="micromodule mb-32">
					<div class="box box_green"></div>
				</div>

				<x-type::p class="mb-16">Некорректный размер: 6, 10, 12, 17, 19.93 и т.д. — они делятся на 8 с остатком.</x-type::p>
				<div class="micromodule mb-32">
					<div class="box box_red"></div>
				</div>

				<x-type::p class="mb-16">
					Однако, случаются ситуации, когда 8 — слишком много. Например, в кнопке могут располагаться иконка и текст.
					И при пробеле в 8 они кажутся оторванными друг от друга. Тогда допустимо использовать значение меньше 8:
				</x-type::p>

				<x-type::p>Допустимые размеры меньше микромодуля: 4, 2, 1, 0.</x-type::p>
			</section>

			<section id="anchor-clamp" class="doc__section">
				<x-type::h size="1" class="mb-16">Гибридная адаптивная система шрифтов</x-type::h>

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

				<x-type::p class="mb-8"><x-ui.code>Телефон портрет (360px-767px): 8px → 9px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Телефон ландшафт (800px-1023px): 8px → 10px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Планшет портрет (768px-1023px): 8px → 10px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Планшет ландшафт (1024px-1279px): 8px → 11px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Ноутбук (1280px-1599px): 8px → 11px</x-ui.code></x-type::p>
				<x-type::p><x-ui.code>Широкий экран (1600px+): 8px → 12px</x-ui.code></x-type::p>

				<x-type::h size="2" class="mt-64 mb-32">Математический расчёт</x-type::h>

				<x-type::p class="mb-16">
					Для линейного роста размера шрифта используется формула расчёта наклона (slope)
					и точки пересечения (intercept):
				</x-type::p>

				<x-type::p class="mb-8"><x-ui.code>slope = (maxSize - minSize) / (rangeMax - rangeMin) × 100vw</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>intercept = minSize - slope × rangeMin</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Итоговый clamp() формируется как:</x-ui.code></x-type::p>
				<x-type::p><x-ui.code>font-size: clamp(minSize, intercept + slope, maxSize)</x-ui.code></x-type::p>

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

				<x-type::p>
					Для настройки размеров можно изменить параметры в конфигурации viewports
					или скорректировать значения min/max в миксинах _adaptive-clamp и
					_root-font-size-clamped.
				</x-type::p>
			</section>

			<section id="anchor-typography" class="doc__section">
				<x-ui.figure class="mb-16">
					<x-type::h size="1" class="mb-32">Заголовок третьего уровня</x-type::h>
					<x-type::hint>По умолчанию параметр size имеет значение 2</x-type::hint>
					<x-type::h class="mb-16">Заголовок второго уровня</x-type::h>
					<x-type::h size="3" class="mb-16">Заголовок третьего уровня</x-type::h>
					<x-type::h size="4" class="mb-16">Заголовок четвертого уровня</x-type::h>
					<x-type::h size="5" class="mb-16">Заголовок пятого уровня</x-type::h>
					<x-type::h size="6">Заголовок шестого уровня</x-type::h>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-20"> size</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"1"</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Заголовок первого уровня</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Заголовок второго уровня</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-20"> size</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"3"</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Заголовок третьего уровня</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-20"> size</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"4"</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Заголовок четвертого уровня</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-20"> size</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"5"</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Заголовок пятого уровня</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-20"> size</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"6"</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Заголовок шестого уровня</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">h</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
			</section>



		</x-main>
	</div>
</x-layouts.base-layout>
