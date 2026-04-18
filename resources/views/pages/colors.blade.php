@php
	$colors = json_decode(file_get_contents(public_path('colors.json')), true);
@endphp

<x-layouts.base-layout title="Цвет">
	<x-layouts.documentation>
		<x-layouts.wrapper class="my-64">
			<div class="description mb-40">
				<x-type::h size="2" class="mb-24">Функции для работы с цветами</x-type::h>
				<x-type::p class="mb-16">Модуль цветов предоставляет набор SCSS-функций для автоматической генерации оттенков и работы с цветовой палитрой проекта.</x-type::p>
				<x-type::h size="3" class="mb-16">Логика генерации оттенков</x-type::h>
				<x-type::p class="mb-16">Система автоматически генерирует дополнительные оттенки для каждого базового цвета из конфигурации. Процесс проходит в несколько этапов:</x-type::p>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>Сканирование конфига</x-type::code> — модуль считывает все переменные из конфигурационного файла цветов и отбирает только те, что являются цветами</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Создание оттенков</x-type::code> — для каждого базового цвета формируется массив из 4 вариантов:
						<x-type::ul mod="disc" class="mb-4">
							<x-type::li class="mb-4"><x-type::code>base</x-type::code> — исходный цвет без изменений</x-type::li>
							<x-type::li class="mb-4"><x-type::code>light</x-type::code> — светлый оттенок (яркость +10%)</x-type::li>
							<x-type::li class="mb-4"><x-type::code>dark</x-type::code> — тёмный оттенок (яркость -10%)</x-type::li>
							<x-type::li class="mb-4"><x-type::code>content</x-type::code> — цвет текста для этого фона (определяется автоматически)</x-type::li>
						</x-type::ul>
					</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Расчёт яркости</x-type::code> — для определения подходящего цвета контента используется формула с весовыми коэффициентами для каждого канала:
						<x-type::code>яркость = (0.299 × R + 0.587 × G + 0.114 × B) / 255 × 100%</x-type::code>
						Коэффициенты учитывают различное восприятие человеком красного, зелёного и синего каналов
					</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Определение контента</x-type::code> — если яркость базового цвета превышает 50%, для текста используется тёмно-серый (#222); если меньше — белый (#fff)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>Сохранение результата</x-type::code> — все сгенерированные оттенки сохраняются в двумерную карту, где ключ — название цвета, а значение — массив с оттенками</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">Основные функции</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>get($color, $shade: "base")</x-type::code> — получить оттенок из массива цветов</x-type::li>
					<x-type::li class="mb-4"><x-type::code>base($color)</x-type::code> — получить базовый цвет</x-type::li>
					<x-type::li class="mb-4"><x-type::code>light($color)</x-type::code> — получить светлый оттенок (+10% яркости)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>dark($color)</x-type::code> — получить тёмный оттенок (-10% яркости)</x-type::li>
					<x-type::li class="mb-4"><x-type::code>content($color)</x-type::code> — получить цвет контента (определяется автоматически по яркости)</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">CSS-переменные</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>var-base($color)</x-type::code> — получить CSS-переменную базового цвета</x-type::li>
					<x-type::li class="mb-4"><x-type::code>var-light($color)</x-type::code> — получить CSS-переменную светлого оттенка</x-type::li>
					<x-type::li class="mb-4"><x-type::code>var-dark($color)</x-type::code> — получить CSS-переменную тёмного оттенка</x-type::li>
					<x-type::li class="mb-4"><x-type::code>var-content($color)</x-type::code> — получить CSS-переменную цвета контента</x-type::li>
					<x-type::li class="mb-4"><x-type::code>get-var-color($color-name, $shade-name)</x-type::code> — получить CSS-переменную по названию цвета и оттенка</x-type::li>
				</x-type::ul>
				<x-type::h size="3" class="mb-16">Вспомогательные функции</x-type::h>
				<x-type::ul mod="disc" class="mb-32">
					<x-type::li class="mb-4"><x-type::code>get-base-colors-map()</x-type::code> — получить карту базовых цветов из конфига</x-type::li>
					<x-type::li class="mb-4"><x-type::code>get-colors-map()</x-type::code> — получить двумерную карту цветов с вариациями</x-type::li>
					<x-type::li class="mb-4"><x-type::code>get-colors-map-flat()</x-type::code> — получить плоскую карту цветов (ключ: цвет-оттенок)</x-type::li>
				</x-type::ul>
				<x-type::hint class="mb-16">Все оттенки генерируются автоматически на основе базовых цветов из конфигурации. Цвет контента определяется по яркости базового цвета: для тёмных фонов — белый текст, для светлых — тёмно-серый.</x-type::hint>
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
