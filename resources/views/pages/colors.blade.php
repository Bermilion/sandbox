@php
	$colors = json_decode(file_get_contents(public_path('colors.json')), true);
	$steps = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "950"];
@endphp

<x-layouts.base-layout title="Цвет">
	<x-layouts.documentation>
		<x-layouts.wrapper class="my-64">
			<div class="description mb-40">
				<x-type::h size="2" class="mb-24">Функции для работы с цветами</x-type::h>
				<x-type::p class="mb-16">Модуль цветов предоставляет набор SCSS-функций для автоматической генерации оттенков в пространстве OKLCH и работы с цветовой палитрой проекта.</x-type::p>
				<x-type::h size="3" class="mb-16">Логика генерации оттенков</x-type::h>
				<x-type::p class="mb-16">Система использует цветовое пространство OKLCH для более точного восприятия цветов человеком. Процесс генерации оттенков:</x-type::p>

				<div class="colors">
					<x-type::h size="5">OKLCH:</x-type::h>
					<x-type::hint>С подстройкой интерполяции через систему цветов tailwind</x-type::hint>
					<div class="grid">
						@foreach($steps as $step)
							<div class="box box_{{ $step }}">
								{{ $step }}
							</div>
						@endforeach
					</div>

					<x-type::h size="5">OKLCH:</x-type::h>
					<x-type::hint>Линейная интерполяция</x-type::hint>
					<div class="grid">
						@foreach($steps as $step)
							<div class="box box_oklch-{{ $step }}">
								{{ $step }}
							</div>
						@endforeach
					</div>

					<x-type::h size="5">HSL:</x-type::h>
					<x-type::hint>Линейная интерполяция</x-type::hint>
					<div class="grid">
						@foreach($steps as $step)
							<div class="box box_hsl-{{ $step }}">
								{{ $step }}
							</div>
						@endforeach
					</div>
				</div>

				<x-type::p class="mb-24">Палитра наглядно показывает что обычное линейное изменение параметра lightness не подходит для серьёзных манипуляций с цветом.</x-type::p>

				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>Пространство OKLCH</x-type::code> — все операции выполняются в пространстве OKLCH (Lightness, Chroma, Hue), которое обеспечивает более естественное восприятие цветов по сравнению с RGB/HSL</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Интерполяция оттенков</x-type::code> — для каждого базового цвета формируется 11 вариантов:
						<x-type::ul mod="disc" class="mb-4">
							<x-type::li class="mb-4"><x-type::code>base</x-type::code> — исходный цвет (оттенок 500)</x-type::li>
							<x-type::li class="mb-4"><x-type::code>light-10…light-50</x-type::code> — светлые оттенки (уровни 400, 300, 200, 100, 50)</x-type::li>
							<x-type::li class="mb-4"><x-type::code>dark-10…dark-50</x-type::code> — тёмные оттенки (уровни 600, 700, 800, 900, 950)</x-type::li>
							<x-type::li class="mb-4"><x-type::code>content</x-type::code> — контрастный цвет текста (определяется автоматически)</x-type::li>
						</x-type::ul>
					</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Поиск ближайшей палитры</x-type::code> — система находит ближайший оттенок в палитре с использованием взвешенного евклидова расстояния в OKLCH (веса: lightness 1.0, hue 1.5, chroma 2.0)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Интерполяция</x-type::code> — оттенки вычисляются через параметры интерполяции (lightness, chroma, hue) из карты интерполяции для каждой палитры</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Определение контента</x-type::code> — если lightness > 50%, используется тёмный цвет текста; иначе — светлый</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Поддержка прозрачности</x-type::code> — все функции принимают параметр $alpha для создания полупрозрачных цветов</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">Основные функции</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>base($color, $alpha: 1)</x-type::code> — получить базовый цвет (оттенок 500)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>light-10($color, $alpha: 1)</x-type::code> — светлый оттенок (уровень 400)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>light-20($color, $alpha: 1)</x-type::code> — светлый оттенок (уровень 300)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>light-30($color, $alpha: 1)</x-type::code> — светлый оттенок (уровень 200)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>light-40($color, $alpha: 1)</x-type::code> — светлый оттенок (уровень 100)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>light-50($color, $alpha: 1)</x-type::code> — светлый оттенок (уровень 50)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark-10($color, $alpha: 1)</x-type::code> — тёмный оттенок (уровень 600)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark-20($color, $alpha: 1)</x-type::code> — тёмный оттенок (уровень 700)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark-30($color, $alpha: 1)</x-type::code> — тёмный оттенок (уровень 800)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark-40($color, $alpha: 1)</x-type::code> — тёмный оттенок (уровень 900)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark-50($color, $alpha: 1)</x-type::code> — тёмный оттенок (уровень 950)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>content($color, $alpha: 1)</x-type::code> — контрастный цвет текста (определяется по lightness)</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">CSS-переменные</x-type::h>
				<x-type::p class="mb-16">Все функции возвращают CSS-переменные в формате <x-type::code>var(--color-{name})</x-type::code>. Имена переменных генерируются автоматически:</x-type::p>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>base</x-type::code> → <x-type::code>var(--color-{color-name})</x-type::code></x-type::li>
					<x-type::li class="mb-4"><x-type::code>light-10</x-type::code> → <x-type::code>var(--color-{color-name}-light-10)</x-type::code></x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark-20</x-type::code> → <x-type::code>var(--color-{color-name}-dark-20)</x-type::code></x-type::li>
					<x-type::li class="mb-4"><x-type::code>content</x-type::code> → <x-type::code>var(--color-content-dark)</x-type::code> или <x-type::code>var(--color-content-light)</x-type::code></x-type::li>
					<x-type::li class="mb-4">С alpha < 1: <x-type::code>var(--color-{color-name}-light-10-alpha-50)</x-type::code></x-type::li>
				</x-type::ul>
				<x-type::hint class="mb-16">Все оттенки генерируются автоматически в пространстве OKLCH на основе базовых цветов из конфигурации. Цвет контента определяется по lightness: для тёмных фонов — светлый текст, для светлых — тёмный. Все функции поддерживают параметр прозрачности $alpha.</x-type::hint>
			</div>
			<div class="color-modules">
				@foreach($colors as $colorName => $shades)
					<div class="color-modules__module">
						<x-type::h size="5" text="{{ ucfirst($colorName) }}" />
						<div class="color-modules__grid">
							@foreach($shades as $shadeName => $colorValue)
								<div class="color-modules__color">
									<div class="color-modules__box color-modules__box_{{ $colorName }}-{{ $shadeName }}"></div>
									<x-type::p>{{ $shadeName }}</x-type::p>
								</div>
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
