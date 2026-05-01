<x-layouts.base-layout title="Документация">
	<div class="layout">
		<x-sidebar>
			<x-type::supheading class="mb-12">Основная концепция</x-type::supheading>
			<x-ui.menu>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-micromodule">Микромодуль</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-clamp">Гибридная адаптация</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-responsive-design">Адаптивный дизайн</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-scale">Интервалы</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-color">Цвет</x-base::link></x-ui.menu-item>
			</x-ui.menu>
			<x-type::supheading class="mb-12">Компоненты</x-type::supheading>
			<x-ui.menu>
				<x-ui.menu-item><x-base::link mod="menu" href="#anchor-typography">Типографика</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Ссылки</x-base::link></x-ui.menu-item>
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


		</x-main>
	</div>
</x-layouts.base-layout>
