@php
	$steps = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
@endphp

<x-layouts.base-layout title="Документация">
	<div class="layout">
		<x-sidebar>
			<x-type::supheading class="mb-12">Основная концепция</x-type::supheading>
			<x-ui.menu>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-micromodule">Микромодуль</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-clamp">Гибридная адаптация</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-responsive-design">Адаптивный дизайн</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-scale">Интервалы</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-colors">Цвет</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-api">Единый API</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-utils-classes">Утилитарные классы</x-base::link></x-ui.menu-item>
			</x-ui.menu>
			<x-type::supheading class="mb-12">Компоненты</x-type::supheading>
			<x-ui.menu>
				<x-ui.menu-item><x-base::link mod="menu" href="/pages/dev">Страница dev</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-typography">Типографика</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-link">Ссылка</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-button">Кнопка</x-base::link></x-ui.menu-item>
			</x-ui.menu>
		</x-sidebar>
		<x-main>
			{{--Micromodule--}}
			<section id="anchor-micromodule" class="doc__section">
				<x-type::h size="2" class="mb-16">Микромодуль</x-type::h>
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

			{{--Clamp--}}
			<section id="anchor-clamp" class="doc__section">
				<x-type::h size="2" class="mb-16">Гибридная адаптивная система шрифтов</x-type::h>

				<x-type::p class="mb-16">
					Система rem-clamp сочетает математическую точность расчетов на основе viewport
					с контролируемым ростом функции clamp(). Это обеспечивает плавное масштабирование
					размера шрифта корня (html) в зависимости от ширины экрана устройства.
				</x-type::p>

				<x-type::p class="mb-24">
					Вместо фиксированных значений font-size используется CSS-функция clamp(),
					которая задаёт минимальный, предпочтительный и максимальный размер шрифта.
				</x-type::p>

				<x-type::h size="3" class="mt-64 mb-32">Принцип работы</x-type::h>

				<x-type::p class="mb-16">Система рассчитывает размер шрифта для каждого типа устройства:</x-type::p>

				<x-type::p class="mb-8"><x-ui.code>Телефон портрет (360px-767px): 8px → 9px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Телефон ландшафт (800px-1023px): 8px → 10px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Планшет портрет (768px-1023px): 8px → 10px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Планшет ландшафт (1024px-1279px): 8px → 11px</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Ноутбук (1280px-1599px): 8px → 11px</x-ui.code></x-type::p>
				<x-type::p><x-ui.code>Широкий экран (1600px+): 8px → 12px</x-ui.code></x-type::p>

				<x-type::h size="3" class="mt-64 mb-32">Математический расчёт</x-type::h>

				<x-type::p class="mb-16">
					Для линейного роста размера шрифта используется формула расчёта наклона (slope)
					и точки пересечения (intercept):
				</x-type::p>

				<x-type::p class="mb-8"><x-ui.code>slope = (maxSize - minSize) / (rangeMax - rangeMin) × 100vw</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>intercept = minSize - slope × rangeMin</x-ui.code></x-type::p>
				<x-type::p class="mb-8"><x-ui.code>Итоговый clamp() формируется как:</x-ui.code></x-type::p>
				<x-type::p><x-ui.code>font-size: clamp(minSize, intercept + slope, maxSize)</x-ui.code></x-type::p>

				<x-type::h size="3" class="mt-64 mb-32">Преимущества подхода</x-type::h>

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

				<x-type::h size="3" class="mt-64 mb-32">Использование в проекте</x-type::h>

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

			{{--Responsive-design--}}
			<section id="anchor-responsive-design" class="doc__section">
				<x-type::h size="2" class="mt-64 mb-40">Вьюпорты и сетки</x-type::h>
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

				<div class="viewport">
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
			</section>

			{{--Scale--}}
			<section id="anchor-scale" class="doc__section">
				<x-type::h size="2" class="mb-16">Система масштабов</x-type::h>

				<x-type::p class="mb-16">
					Модуль <x-ui.code>core/_scale.scss</x-ui.code> отвечает за систему spacing и типографики.
					Базовая единица масштаба — 8px (1rem), что соответствует микромодулю системы.
				</x-type::p>

				<x-type::h size="3" class="mt-48 mb-24">Функции масштаба</x-type::h>

				<x-type::p class="mb-16">Доступны две основные функции для работы с масштабами:</x-type::p>

				<x-type::p class="mb-8"><x-ui.code>scale()</x-ui.code> — возвращает CSS-переменные:</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>scale(8, 16)</x-ui.code> → <x-ui.code>var(--scale-8) var(--scale-16)</x-ui.code></x-type::p>

				<x-type::p class="mb-8"><x-ui.code>scale-value()</x-ui.code> — возвращает сырые значения:</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>scale-value(8, 16)</x-ui.code> → <x-ui.code>1rem 2rem</x-ui.code></x-type::p>

				<x-type::h size="3" class="mt-48 mb-24">Доступные значения</x-type::h>

				<x-type::p class="mb-16">Система поддерживает широкий диапазон значений, кратных микромодулю:</x-type::p>

				<x-type::p class="mb-16">
					Отрицательные: -104, -96, -88, -80, -72, -64, -56, -48, -40, -32, -24, -20, -16, -12, -8, -4, -2, -1
				</x-type::p>

				<x-type::p class="mb-16">
					Положительные: 0, 1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800
				</x-type::p>

				<x-type::h size="3" class="mt-48 mb-24">Использование в проекте</x-type::h>

				<x-type::p class="mb-16">
					Подключение через единый API токенов:
				</x-type::p>

				<x-ui.figure class="mb-16">
					<x-type::p>Пример: padding: token.scale(16, 24);</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-pink-10">@</span>
							<span class="color-pink-10">use </span>
							<div class="color-slate-10">"</div>
							<div class="color-green-10">@core</div>
							<div class="color-slate-10">/</div>
							<div class="color-green-10">tokens</div>
							<div class="color-slate-10">" </div>
							<span  class="color-pink-10"> as </span>
							<div class="color-green-10">token</div>
							<div class="color-slate-10">;</div>
						</div>
						<div class="line">
							<span class="color-slate-50">.</span>
							<div class="color-orange-10">container</div>
							<span class="color-slate-50"> {</span>
						</div>
						<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">padding</span>
							<span class="color-slate-10">:</span>
							<span class="color-green-10"> token</span>
							<span class="color-slate-10">.</span>
							<span class="color-pink-10">scale</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">16</span>
							<span class="color-slate-50">, </span>
							<span class="color-sky-20">24</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
						</div>
						<div class="line">
							<span class="color-slate-50">}</span>
						</div>
					@endslot
				</x-ui.figure>

				<x-type::p class="mb-16">
					После компиляции в CSS:
				</x-type::p>

				<x-ui.figure class="mb-16">
					<x-type::p>Результат: padding: var(--scale-16) var(--scale-24);</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-50">.</span>
							<div class="color-orange-10">container</div>
							<span class="color-slate-50"> {</span>
						</div>
						<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">padding</span>
							<span class="color-slate-10">: </span>
							<span class="color-yellow-10">var</span>
							<div class="color-slate-10">(</div>
							<div class="color-sky-20">--scale-16</div>
							<div class="color-slate-10">)</div>
							<div class="color-yellow-10"> var</div>
							<div class="color-slate-10">(</div>
							<div class="color-sky-20">--scale-24</div>
							<div class="color-slate-10">)</div>
							<div class="color-slate-50">;</div>
						</div>
						<div class="line">
							<span class="color-slate-50">}</span>
						</div>
					@endslot
				</x-ui.figure>
			</section>

			{{--Colors--}}
			<section id="anchor-colors" class="doc__section">
				<x-type::h size="2" class="mb-24">Функции для работы с цветом</x-type::h>

				<x-type::p class="mb-16">
					Модуль <x-ui.code>core/_colors.scss</x-ui.code> управляет цветовой системой проекта.
					<strong>Зона ответственности:</strong> преобразование цветов в OKLCH пространство, генерация оттенков,
					автоматический подбор контрастного цвета текста, поиск ближайшего оттенка в палитре Tailwind
					и генерация CSS-переменных.
				</x-type::p>

				<x-type::h size="3" class="mt-48 mb-16">Логика генерации оттенков</x-type::h>
				<x-type::p class="mb-16">Система использует цветовое пространство OKLCH для более точного восприятия цветов человеком. Процесс генерации оттенков:</x-type::p>

				<div class="colors">
					<x-type::h size="5">OKLCH:</x-type::h>
					<x-type::hint>С подстройкой интерполяции через систему цветов tailwind</x-type::hint>
					<div class="grid">
						@foreach($steps as $step)
							<div class="box box_accent-{{ $step }}">
								{{ $step }}
							</div>
						@endforeach
					</div>

					<x-type::h size="5">OKLCH:</x-type::h>
					<x-type::hint>Линейная интерполяция</x-type::hint>
					<div class="grid">
						@foreach($steps as $step)
							<div class="box box_oklch-accent-{{ $step }}">
								{{ $step }}
							</div>
						@endforeach
					</div>

					<x-type::h size="5">HSL:</x-type::h>
					<x-type::hint>Линейная интерполяция</x-type::hint>
					<div class="grid">
						@foreach($steps as $step)
							<div class="box box_hsl-accent-{{ $step }}">
								{{ $step }}
							</div>
						@endforeach
					</div>
				</div>

				<x-type::p class="mb-24">Палитра наглядно показывает что обычное линейное изменение параметра lightness не подходит для серьёзных манипуляций с цветом.</x-type::p>

				<x-type::p class="mb-4"><x-ui.code class="code_inline">Пространство OKLCH</x-ui.code> — все операции выполняются в пространстве OKLCH (Lightness, Chroma, Hue), которое обеспечивает более естественное восприятие цветов по сравнению с RGB/HSL.</x-type::p>
				<x-type::p class="mb-4"><x-ui.code class="code_inline">Интерполяция оттенков</x-ui.code> — для каждого базового цвета формируется 11 вариантов:</x-type::p>
				<x-type::ul class="mb-32 ml-24">
					<x-type::li class="mb-4"><x-ui.code class="code_inline">base</x-ui.code> — исходный цвет (оттенок 500)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code class="code_inline">light-10…light-50</x-ui.code> — светлые оттенки (уровни 400, 300, 200, 100, 50)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code class="code_inline">dark-10…dark-50</x-ui.code> — тёмные оттенки (уровни 600, 700, 800, 900, 950)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code class="code_inline">content</x-ui.code> — контрастный цвет текста (определяется автоматически)</x-type::li>
				</x-type::ul>

				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-ui.code>Поиск ближайшей палитры</x-ui.code> — система находит ближайший оттенок в палитре с использованием взвешенного евклидова расстояния в OKLCH (веса: lightness 1.0, hue 1.5, chroma 2.0)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>Интерполяция</x-ui.code> — оттенки вычисляются через параметры интерполяции (lightness, chroma, hue) из карты интерполяции для каждой палитры</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>Определение контента</x-ui.code> — если lightness > 56%, используется тёмный цвет текста; иначе — светлый</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>Поддержка прозрачности</x-ui.code> — все функции принимают параметр $alpha для создания полупрозрачных цветов</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">Основные функции</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-ui.code>base($color, $alpha: 1)</x-ui.code> — получить базовый цвет (оттенок 500)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-10($color, $alpha: 1)</x-ui.code> — светлый оттенок (уровень 400)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-20($color, $alpha: 1)</x-ui.code> — светлый оттенок (уровень 300)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-30($color, $alpha: 1)</x-ui.code> — светлый оттенок (уровень 200)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-40($color, $alpha: 1)</x-ui.code> — светлый оттенок (уровень 100)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-50($color, $alpha: 1)</x-ui.code> — светлый оттенок (уровень 50)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-10($color, $alpha: 1)</x-ui.code> — тёмный оттенок (уровень 600)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-20($color, $alpha: 1)</x-ui.code> — тёмный оттенок (уровень 700)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-30($color, $alpha: 1)</x-ui.code> — тёмный оттенок (уровень 800)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-40($color, $alpha: 1)</x-ui.code> — тёмный оттенок (уровень 900)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-50($color, $alpha: 1)</x-ui.code> — тёмный оттенок (уровень 950)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>content($color, $alpha: 1)</x-ui.code> — контрастный цвет текста (определяется по lightness)</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">CSS-переменные</x-type::h>
				<x-type::p class="mb-16">Все функции возвращают CSS-переменные в формате <x-ui.code>var(--color-{name})</x-ui.code>. Имена переменных генерируются автоматически:</x-type::p>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-ui.code>base</x-ui.code> → <x-ui.code>var(--color-{color-name})</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-10</x-ui.code> → <x-ui.code>var(--color-{color-name}-light-10)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-20</x-ui.code> → <x-ui.code>var(--color-{color-name}-dark-20)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>content</x-ui.code> → <x-ui.code>var(--color-content-dark)</x-ui.code> или <x-ui.code>var(--color-content-light)</x-ui.code></x-type::li>
					<x-type::li class="mb-4">С alpha < 1: <x-ui.code>var(--color-{color-name}-light-10-alpha-50)</x-ui.code></x-type::li>
				</x-type::ul>

				<x-type::h size="3" class="mb-16">Сырые значения</x-type::h>
				<x-type::p class="mb-16">Для получения сырых значений без CSS-переменных используйте функции с суффиксом <x-ui.code>-value</x-ui.code>:</x-type::p>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-ui.code>base-value($color, $alpha: 1)</x-ui.code> — базовый цвет (OKLCH)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>light-10-value($color, $alpha: 1)</x-ui.code> ... <x-ui.code>light-50-value</x-ui.code> — светлые оттенки</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>dark-10-value($color, $alpha: 1)</x-ui.code> ... <x-ui.code>dark-50-value</x-ui.code> — тёмные оттенки</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>content-value($color, $alpha: 1)</x-ui.code> — контрастный цвет текста (OKLCH)</x-type::li>
				</x-type::ul>
				<x-type::hint class="mb-16">Все оттенки генерируются автоматически в пространстве OKLCH на основе базовых цветов из конфигурации. Цвет контента определяется по lightness: для тёмных фонов — светлый текст, для светлых — тёмный. Все функции поддерживают параметр прозрачности $alpha.</x-type::hint>
			</section>

			{{--API--}}
			<section id="anchor-api" class="doc__section">
				<x-type::h size="2" class="mb-24">Единый API для всех функций в scss</x-type::h>

				<x-type::p class="mb-16">
					Модуль <x-ui.code>core/_tokens.scss</x-ui.code> предоставляет единый API для доступа ко всем функциям системы.
					Перед началом работы необходимо подключить модуль: <x-ui.code><span>@</span>use "@core/tokens" as token;</x-ui.code>
				</x-type::p>

				<x-type::h size="3" class="mt-48 mb-24">Доступные функции</x-type::h>

				<x-type::p class="mb-16">Через пространство имён <x-ui.code>token</x-ui.code> доступны следующие функции:</x-type::p>

				<x-type::h size="4" class="mb-16">Масштаб</x-type::h>
				<x-type::ul mod="disc" class="mb-24">
					<x-type::li class="mb-4"><x-ui.code>token.scale($values...)</x-ui.code> — возвращает CSS-переменные масштаба</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.scale-value($values...)</x-ui.code> — возвращает сырые значения в rem</x-type::li>
				</x-type::ul>

				<x-type::h size="4" class="mb-16">Цвета (CSS-переменные)</x-type::h>
				<x-type::ul mod="disc" class="mb-24">
					<x-type::li class="mb-4"><x-ui.code>token.color-base($color, $alpha: 1)</x-ui.code> — базовый цвет</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.color-light-10($color, $alpha: 1)</x-ui.code> ... <x-ui.code>light-50</x-ui.code> — светлые оттенки</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.color-dark-10($color, $alpha: 1)</x-ui.code> ... <x-ui.code>dark-50</x-ui.code> — тёмные оттенки</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.color-content($color, $alpha: 1)</x-ui.code> — контрастный цвет текста</x-type::li>
				</x-type::ul>

				<x-type::h size="4" class="mb-16">Цвета (сырые значения)</x-type::h>
				<x-type::ul mod="disc" class="mb-24">
					<x-type::li class="mb-4"><x-ui.code>token.color-base-value($color, $alpha: 1)</x-ui.code> — базовый цвет</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.color-light-10-value($color, $alpha: 1)</x-ui.code> ... <x-ui.code>light-50-value</x-ui.code> — светлые оттенки</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.color-dark-10-value($color, $alpha: 1)</x-ui.code> ... <x-ui.code>dark-50-value</x-ui.code> — тёмные оттенки</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>token.color-content-value($color, $alpha: 1)</x-ui.code> — контрастный цвет текста</x-type::li>
				</x-type::ul>

				<x-type::h size="4" class="mb-16">Веса шрифтов</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-ui.code>token.weight($weight)</x-ui.code> — возвращает CSS-переменную веса шрифта</x-type::li>
				</x-type::ul>

				<x-type::h size="3" class="mt-48 mb-24">Примеры использования</x-type::h>

				<x-type::supheading class="mb-8">Использование цветов</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::p>SCSS: background-color: token.color-base(token.$accent);</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-50">.</span>
							<span class="color-orange-10">button</span>
							<span class="color-slate-50"> {</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">background-color</span>
							<span class="color-slate-10">:</span>
							<span class="color-green-10"> token</span>
							<span class="color-slate-10">.</span>
							<span class="color-pink-10">color-base</span>
							<span class="color-slate-10">(</span>
							<span class="color-green-10">token</span>
							<span class="color-slate-10">.</span>
							<span class="color-yellow-10">$accent</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">color</span>
							<span class="color-slate-10">:</span>
							<span class="color-green-10"> token</span>
							<span class="color-slate-10">.</span>
							<span class="color-pink-10">color-content</span>
							<span class="color-slate-10">(</span>
							<span class="color-green-10">token</span>
							<span class="color-slate-10">.</span>
							<span class="color-yellow-10">$accent</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">}</span>
						</div>
					@endslot
				</x-ui.figure>

				<x-type::p class="mb-16">Результат компиляции в CSS:</x-type::p>

				<x-ui.figure class="mb-32">
					<x-type::p>CSS: background-color: var(--color-accent);</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-50">.</span>
							<span class="color-orange-10">button</span>
							<span class="color-slate-50"> {</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">background-color</span>
							<span class="color-slate-10">: </span>
							<span class="color-yellow-10">var</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">--color-accent</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">color</span>
							<span class="color-slate-10">: </span>
							<span class="color-yellow-10">var</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">--color-content-accent</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">}</span>
						</div>
					@endslot
				</x-ui.figure>

				<x-type::supheading class="mb-8">Использование масштабов</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::p>SCSS: padding: token.scale(16, 24);</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-50">.</span>
							<span class="color-orange-10">container</span>
							<span class="color-slate-50"> {</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">padding</span>
							<span class="color-slate-10">:</span>
							<span class="color-green-10"> token</span>
							<span class="color-slate-10">.</span>
							<span class="color-pink-10">scale</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">16</span>
							<span class="color-slate-50">, </span>
							<span class="color-sky-20">24</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">margin</span>
							<span class="color-slate-10">:</span>
							<span class="color-green-10"> token</span>
							<span class="color-slate-10">.</span>
							<span class="color-pink-10">scale</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">8</span>
							<span class="color-slate-50">, </span>
							<span class="color-sky-20">0</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">}</span>
						</div>
					@endslot
				</x-ui.figure>

				<x-type::p class="mb-16">Результат компиляции в CSS:</x-type::p>

				<x-ui.figure class="mb-32">
					<x-type::p>CSS: padding: var(--scale-16) var(--scale-24);</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-50">.</span>
							<span class="color-orange-10">container</span>
							<span class="color-slate-50"> {</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">padding</span>
							<span class="color-slate-10">: </span>
							<span class="color-yellow-10">var</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">--scale-16</span>
							<span class="color-slate-10">)</span>
							<span class="color-yellow-10"> var</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">--scale-24</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">  </span>
							<span class="color-sky-20">margin</span>
							<span class="color-slate-10">: </span>
							<span class="color-yellow-10">var</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">--scale-8</span>
							<span class="color-slate-10">)</span>
							<span class="color-yellow-10"> var</span>
							<span class="color-slate-10">(</span>
							<span class="color-sky-20">--scale-0</span>
							<span class="color-slate-10">)</span>
							<span class="color-slate-50">;</span>
							</div>
							<div class="line">
							<span class="color-slate-50">}</span>
						</div>
					@endslot
				</x-ui.figure>

				<x-type::hint class="mb-16">Все функции API возвращают CSS-переменные, что обеспечивает консистентность значений и возможность динамической смены тем. Для получения сырых значений используйте функции с суффиксом <x-ui.code>-value</x-ui.code>.</x-type::hint>
			</section>

			{{--Utils classes--}}
			<section id="anchor-utils-classes" class="doc__section">
				<x-type::h size="2" class="mb-24">Утилитарные классы spacing</x-type::h>

				<x-type::p class="mb-16">
					Система генерирует утилитарные классы для <x-ui.code>margin</x-ui.code> и <x-ui.code>padding</x-ui.code>
					на основе значений масштаба. Классы используют CSS-переменные масштаба и поддерживают адаптивность.
				</x-type::p>

				<x-type::h size="3" class="mt-48 mb-24">Структура классов</x-type::h>

				<x-type::p class="mb-16">Классы формируются по шаблону: <x-ui.code>[префикс][направление]-[значение]</x-ui.code></x-type::p>

				<x-type::h size="4" class="mb-16">Префиксы свойств</x-type::h>
				<x-type::ul mod="disc" class="mb-24">
					<x-type::li class="mb-4"><x-ui.code>m</x-ui.code> — margin</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>p</x-ui.code> — padding</x-type::li>
				</x-type::ul>

				<x-type::h size="4" class="mb-16">Направления</x-type::h>
				<x-type::ul mod="disc" class="mb-24">
					<x-type::li class="mb-4">без направления — все стороны</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>t</x-ui.code> — top (верх)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>r</x-ui.code> — right (право)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>b</x-ui.code> — bottom (низ)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>l</x-ui.code> — left (лево)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>x</x-ui.code> — left + right (по горизонтали)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>y</x-ui.code> — top + bottom (по вертикали)</x-type::li>
				</x-type::ul>

				<x-type::h size="3" class="mt-48 mb-24">Базовые классы</x-type::h>

				<x-type::p class="mb-16">Примеры классов и соответствующий CSS:</x-type::p>

				<x-type::ul mod="disc" class="mb-16">
					<x-type::li class="mb-4"><x-ui.code>.m-8</x-ui.code> → <x-ui.code>margin: var(--scale-8)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.mt-16</x-ui.code> → <x-ui.code>margin-top: var(--scale-16)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.mx-24</x-ui.code> → <x-ui.code>margin-left: var(--scale-24); margin-right: var(--scale-24)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.p-32</x-ui.code> → <x-ui.code>padding: var(--scale-32)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.py-8</x-ui.code> → <x-ui.code>padding-top: var(--scale-8); padding-bottom: var(--scale-8)</x-ui.code></x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.pr-4</x-ui.code> → <x-ui.code>padding-right: var(--scale-4)</x-ui.code></x-type::li>
				</x-type::ul>

				<x-type::h size="3" class="mt-48 mb-24">Адаптивные классы</x-type::h>

				<x-type::p class="mb-16">
					Для каждого viewport генерируются адаптивные версии классов с префиксом <x-ui.code>[device]:</x-ui.code>.
					Классы применяются только в соответствующем media-query.
				</x-type::p>

				<x-type::h size="4" class="mb-16">Префиксы устройств</x-type::h>
				<x-type::ul mod="disc" class="mb-24">
					<x-type::li class="mb-4"><x-ui.code>pp:</x-ui.code> — phone-portrait (360px-767px)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>pl:</x-ui.code> — phone-landscape (800px-1023px)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>p:</x-ui.code> — phone (все телефоны)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>tp:</x-ui.code> — tablet-portrait (768px-1023px)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>tl:</x-ui.code> — tablet-landscape (1024px-1279px)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>t:</x-ui.code> — tablet (все планшеты)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>m:</x-ui.code> — mobile (phone + tablet)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>l:</x-ui.code> — laptop (1280px-1599px)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>w:</x-ui.code> — wide (1600px+)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>d:</x-ui.code> — desktop (laptop + wide)</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>np:</x-ui.code> — no-phone (все кроме телефонов)</x-type::li>
				</x-type::ul>

				<x-type::h size="4" class="mb-16">Примеры адаптивных классов</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-ui.code>.p:m-8</x-ui.code> — margin на телефонах</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.l:p-16</x-ui.code> — padding на laptop</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.m:mx-24</x-ui.code> — горизонтальный margin на мобильных</x-type::li>
					<x-type::li class="mb-4"><x-ui.code>.np:py-32</x-ui.code> — вертикальный padding на всех устройствах кроме телефонов</x-type::li>
				</x-type::ul>

				<x-type::hint class="mb-16">Генерация выполняется через миксин <x-ui.code>generate-spacing-classes</x-ui.code> на основе значений масштаба из конфигурации. Отрицательные значения масштаба исключаются из генерации.</x-type::hint>
			</section>

			{{--Typography--}}
			<section id="anchor-typography" class="doc__section">
				<x-type::h size="2" class="mb-24">Компоненты типографики</x-type::h>
				<x-type::p class="mb-16">Набор компонентов для оформления текстового контента. Все компоненты поддерживают модификаторы через атрибут <x-ui.code>mod</x-ui.code> и дополнительные CSS-классы.</x-type::p>

				<x-type::supheading class="mb-8">Примеры заголовков</x-type::supheading>

				<x-ui.figure class="mb-16">
					<x-type::h size="1" class="mb-32">Заголовок первого уровня</x-type::h>
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

				<x-type::p class="mb-8">Атрибуты заголовков:</x-type::p>
				<x-type::p class="mb-4"><x-ui.code mod="inline">size</x-ui.code> — размер заголовка (1–6), по умолчанию 2;</x-type::p>
				<x-type::p class="mb-4"><x-ui.code mod="inline">mod</x-ui.code> — модификатор стиля;</x-type::p>
				<x-type::p class="mb-40"><x-ui.code mod="inline">text</x-ui.code> — текст заголовка (альтернатива слоту).</x-type::p>

				<x-type::supheading class="mb-8">Пример параграфа</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::p>Можно жить и на Земле.</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">p</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Можно жить и на Земле.</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">p</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-40">Атрибут у параграфа только <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

				<x-type::supheading class="mb-8">Пример Герой-текста</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::hero lang="ru">Главный заголовок страницы</x-type::hero>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">hero</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Главный заголовок страницы</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">hero</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-16">Крупный текст для заголовков секций или главных заголовков страницы.</x-type::p>
				<x-type::p class="mb-8">Атрибуты Герой-текста:</x-type::p>
				<x-type::p class="mb-4"><x-ui.code>mod</x-ui.code> — модификатор стиля;</x-type::p>
				<x-type::p class="mb-40">
					<x-ui.code>lang</x-ui.code>
					— язык текста (например, "ru") нужен для корректного переноса слов по слогам, если его не указать
					длинные слова не будут корректно переноситься по слогам.
				</x-type::p>

				<x-type::supheading class="mb-8">Пример надзаголовка</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::supheading>Дополнительный контекст</x-type::supheading>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">supheading</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Дополнительный контекст</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">supheading</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-16">Мелкий текст над заголовком для дополнительного контекста.</x-type::p>
				<x-type::p class="mb-40">Атрибут только один <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

				<x-type::supheading class="mb-8">Пример подсказки</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::hint>Важная подсказка</x-type::hint>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">hint</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Важная подсказка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">hint</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-16">Текст для подсказок, примечаний или дополнительной информации.</x-type::p>
				<x-type::p class="mb-40">Атрибут только <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>


				<x-type::supheading class="mb-8">Пример маркированного списка</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::ul mod="disc">
						<x-type::li class="mb-4">Первый элемент маркированного списка</x-type::li>
						<x-type::li class="mb-4">Второй элемент маркированного списка</x-type::li>
						<x-type::li>Третий элемент маркированного списка</x-type::li>
					</x-type::ul>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">ul</span>
							<span class="color-slate-20"> mod</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"disc"</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span>   </span>
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Первый элемент маркированного списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span>   </span>
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Второй элемент маркированного списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span>   </span>
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Третий элемент маркированного списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">ul</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-40">Атрибут <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

				<x-type::supheading class="mb-8">Пример нумерованного списка</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::ol mod="base">
						<x-type::li class="mb-4">Первый элемент нумерованного списка</x-type::li>
						<x-type::li class="mb-4">Второй элемент нумерованного списка</x-type::li>
						<x-type::li>Третий элемент нумерованного списка</x-type::li>
					</x-type::ol>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">ol</span>
							<span class="color-slate-20"> mod</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"base"</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span>   </span>
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Первый элемент нумерованного списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span>   </span>
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Второй элемент нумерованного списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span>   </span>
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Третий элемент нумерованного списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">ol</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-40">Атрибут <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

				<x-type::supheading class="mb-8">Пример элемента списка</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::ul mod="disc">
						<x-type::li>Элемент списка</x-type::li>
					</x-type::ul>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Элемент списка</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">type</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">li</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-8">Компонент для элемента списка используется внутри:</x-type::p>
				<x-type::ul mod="disc" class="mb-16">
					<x-type::li><x-ui.code>x-type::ol</x-ui.code></x-type::li>
					<x-type::li><x-ui.code>x-type::ul</x-ui.code></x-type::li>
				</x-type::ul>
				<x-type::p class="mb-64">Атрибут <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

			</section>

			{{--Link--}}
			<section id="anchor-link" class="doc__section">
				<x-type::h size="2" class="mb-24">Компонент ссылки</x-type::h>

				<x-type::supheading class="mb-8">Пример ссылки</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::p class="mb-8">
						<x-base::link icon="bars">Меню</x-base::link>
					</x-type::p>
					<x-type::p>
						<x-base::link icon="bars" icon-right>Меню</x-base::link>
					</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">link</span>
							<span class="color-slate-20"> icon</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"bars"</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Меню</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">link</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">link</span>
							<span class="color-slate-20"> icon</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"bars"</span>
							<span class="color-slate-20"> icon-right</span>
							<span class="color-slate-10">></span>
							<span class="color-slate-50">Меню</span>
							<span class="color-slate-10"><</span>
							<span class="color-slate-10">/</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">link</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-8">Атрибуты: </x-type::p>
				<x-type::p class="mb-16"><x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>text</x-ui.code> — текст ссылки (альтернатива слоту).</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>icon</x-ui.code> — иконка.</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>icon-right</x-ui.code> — позиционирование иконки относительно текста по умолчанию <x-ui.code>false</x-ui.code>.</x-type::p>
			</section>

			{{--Button--}}
			<section id="anchor-button" class="doc__section">
				<x-type::h size="2" class="mb-24">Компонент кнопки</x-type::h>

				<x-type::supheading class="mb-8">Пример кнопки</x-type::supheading>
				<x-ui.figure class="mb-16">
					<x-type::p class="mb-8">
						<x-base::button text="Кнопка"/>
					</x-type::p>
					<x-type::p class="mb-8">
						<x-base::button icon="chevron-left" text="Кнопка"/>
					</x-type::p>
					<x-type::p class="mb-8">
						<x-base::button icon="thumbs-up" icon-right text="Кнопка"/>
					</x-type::p>
					<x-type::p class="mb-8">
						<x-base::button icon="chevron-left"/>
					</x-type::p>
					<x-type::p>
						<x-base::button icon="chevron-left" text="Кнопка" disabled/>
					</x-type::p>

					@slot('code')
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">button</span>
							<span class="color-slate-20"> text</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"Кнопка"</span>
							<span class="color-slate-10">/</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">button</span>
							<span class="color-slate-20"> icon</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"chevron-left"</span>
							<span class="color-slate-20"> text</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"Кнопка"</span>
							<span class="color-slate-10">/</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">button</span>
							<span class="color-slate-20"> icon</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"thumbs-up"</span>
							<span class="color-slate-20"> icon-right</span>
							<span class="color-slate-20"> text</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"Кнопка"</span>
							<span class="color-slate-10">/</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">button</span>
							<span class="color-slate-20"> icon</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"chevron-left"</span>
							<span class="color-slate-10">/</span>
							<span class="color-slate-10">></span>
						</div>
						<div class="line">
							<span class="color-slate-10"><</span>
							<span class="color-pink-10">x</span>
							<span class="color-slate-20">-</span>
							<span class="color-pink-10">base</span>
							<span class="color-slate-20">::</span>
							<span class="color-pink-10">button</span>
							<span class="color-slate-20"> icon</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"chevron-left"</span>
							<span class="color-slate-20"> text</span>
							<span class="color-slate-10">=</span>
							<span class="color-sky-20">"Кнопка"</span>
							<span class="color-slate-20"> disabled</span>
							<span class="color-slate-10">/</span>
							<span class="color-slate-10">></span>
						</div>
					@endslot

				</x-ui.figure>
				<x-type::p class="mb-8">Атрибуты: </x-type::p>
				<x-type::p class="mb-16"><x-ui.code>mod</x-ui.code> — модификатор стиля по умолчанию <x-ui.code>button_accent</x-ui.code>.</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>text</x-ui.code> — текст кнопки (альтернатива слоту).</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>icon</x-ui.code> — иконка.</x-type::p>
				<x-type::p class="mb-16"><x-ui.code>icon-right</x-ui.code> — позиционирование иконки относительно текста по умолчанию <x-ui.code>false</x-ui.code>.</x-type::p>
			</section>


		</x-main>
	</div>
</x-layouts.base-layout>
