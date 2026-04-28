<x-layouts.base-layout title="Типографика">
	<x-layouts.documentation>
		<x-layouts.wrapper class="mt-64 mb-32">
			<x-type::h size="1" class="mb-24">Компоненты типографики</x-type::h>
			<x-type::p class="mb-16">Набор компонентов для оформления текстового контента. Все компоненты поддерживают модификаторы через атрибут <x-type::code>mod</x-type::code> и дополнительные CSS-классы.</x-type::p>

			<x-type::supheading class="mb-8">Примеры заголовков</x-type::supheading>
			<x-type::figure class="mb-16">
				<x-type::h size="1" class="mb-32">Заголовок третьего уровня</x-type::h>
				<x-type::hint>По умолчанию параметр size имеет значение 2</x-type::hint>
				<x-type::h class="mb-16">Заголовок второго уровня</x-type::h>
				<x-type::h size="3" class="mb-16">Заголовок третьего уровня</x-type::h>
				<x-type::h size="4" class="mb-16">Заголовок четвертого уровня</x-type::h>
				<x-type::h size="5" class="mb-16">Заголовок пятого уровня</x-type::h>
				<x-type::h size="6">Заголовок шестого уровня</x-type::h>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-300"> size</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"1"</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Заголовок первого уровня</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Заголовок второго уровня</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-300"> size</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"3"</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Заголовок третьего уровня</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-300"> size</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"4"</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Заголовок четвертого уровня</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-300"> size</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"5"</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Заголовок пятого уровня</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-300"> size</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"6"</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Заголовок шестого уровня</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">h</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-type::figure>

			<x-type::p class="mb-8">Атрибуты заголовков:</x-type::p>
			<x-type::p class="mb-4"><x-type::code mod="inline">size</x-type::code> — размер заголовка (1–6), по умолчанию 2;</x-type::p>
			<x-type::p class="mb-4"><x-type::code mod="inline">mod</x-type::code> — модификатор стиля;</x-type::p>
			<x-type::p class="mb-64"><x-type::code mod="inline">text</x-type::code> — текст заголовка (альтернатива слоту).</x-type::p>

			<x-type::supheading class="mb-8">Пример параграфа</x-type::supheading>
			<x-type::figure class="mb-16">
				<x-type::p>Можно жить и на Земле.</x-type::p>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">p</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Можно жить и на Земле.</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">p</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-type::figure>
			<x-type::p class="mb-64">Атрибут у параграфа только <x-type::code>mod</x-type::code> — модификатор стиля.</x-type::p>

			<x-type::supheading class="mb-8">Пример Герой-текста</x-type::supheading>
			<x-type::figure class="mb-16">
				<x-type::hero lang="ru">Главный заголовок страницы</x-type::hero>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">hero</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Главный заголовок страницы</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">hero</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-type::figure>
			<x-type::p class="mb-16">Крупный текст для заголовков секций или главных заголовков страницы.</x-type::p>
			<x-type::p class="mb-8">Атрибуты Герой-текста:</x-type::p>
			<x-type::p class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля;</x-type::p>
			<x-type::p class="mb-64">
				<x-type::code>lang</x-type::code>
				— язык текста (например, "ru") нужен для корректного переноса слов по слогам, если его не указать
				длинные слова не будут корректно переноситься по слогам.
			</x-type::p>


			<x-type::supheading class="mb-8">Пример надзаголовка</x-type::supheading>
			<x-type::figure class="mb-16">
				<x-type::supheading>Дополнительный контекст</x-type::supheading>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">supheading</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Дополнительный контекст</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">supheading</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-type::figure>
			<x-type::p class="mb-16">Мелкий текст над заголовком для дополнительного контекста.</x-type::p>
			<x-type::p class="mb-64">Атрибут только один <x-type::code>mod</x-type::code> — модификатор стиля.</x-type::p>


			<x-type::supheading class="mb-8">Пример подсказки</x-type::supheading>
			<x-type::figure class="mb-16">
				<x-type::hint>Важная подсказка</x-type::hint>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">hint</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Важная подсказка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">hint</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-type::figure>
			<x-type::p class="mb-16">Текст для подсказок, примечаний или дополнительной информации.</x-type::p>
			<x-type::p class="mb-64">Атрибут только <x-type::code>mod</x-type::code> — модификатор стиля</x-type::p>



			<x-type::h size="3" class="mt-32 mb-16">x-type::code — Код</x-type::h>
			<x-type::p class="mb-16">Компонент для выделения фрагментов кода или технических терминов.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::code&gt;inline-code&lt;/x-type::code&gt;
&lt;x-type::code mod="block"&gt;```css
body { color: red; }
```&lt;/x-type::code&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля (например, "block" для блока кода)</x-type::li>
			</x-type::ul>


			<x-type::h size="3" class="mt-32 mb-16">x-type::ol — Нумерованный список</x-type::h>
			<x-type::p class="mb-16">Компонент для нумерованных списков. Используется с <x-type::code>x-type::li</x-type::code>.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::ol mod="base"&gt;
	&lt;x-type::li&gt;Первый элемент&lt;/x-type::li&gt;
	&lt;x-type::li&gt;Второй элемент&lt;/x-type::li&gt;
&lt;/x-type::ol&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
			</x-type::ul>

			<x-type::h size="3" class="mt-32 mb-16">x-type::ul — Маркированный список</x-type::h>
			<x-type::p class="mb-16">Компонент для маркированных списков. Используется с <x-type::code>x-type::li</x-type::code>.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::ul mod="disc"&gt;
	&lt;x-type::li&gt;Первый элемент&lt;/x-type::li&gt;
	&lt;x-type::li&gt;Второй элемент&lt;/x-type::li&gt;
&lt;/x-type::ul&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
			</x-type::ul>

			<x-type::h size="3" class="mt-32 mb-16">x-type::li — Элемент списка</x-type::h>
			<x-type::p class="mb-16">Компонент для элемента списка (используется внутри <x-type::code>x-type::ol</x-type::code> или <x-type::code>x-type::ul</x-type::code>).</x-type::p>
			<x-type::code mod="block" class="mb-32">
				```blade
&lt;x-type::li&gt;Элемент списка&lt;/x-type::li&gt;
```
			</x-type::code>
		</x-layouts.wrapper>
		<x-layouts.wrapper class="mt-32 mb-64 wrapper_800">
			<x-type::ol mod="base" class="mb-32">
				<x-type::li class="mb-4">Первый элемент нумерованного списка</x-type::li>
				<x-type::li class="mb-4">Второй элемент нумерованного списка</x-type::li>
				<x-type::ol class="mb-4">
					<x-type::li class="mb-4">Первый элемент вложенного нумерованного списка</x-type::li>
					<x-type::ol class="mb-4">
						<x-type::li class="mb-4">Первый элемент вложенного нумерованного списка</x-type::li>
						<x-type::li class="mb-4">Второй элемент вложенного нумерованного списка</x-type::li>
						<x-type::li class="mb-4">третий элемент вложенного нумерованного списка</x-type::li>
						<x-type::ol class="mb-4">
							<x-type::li class="mb-4">Первый элемент вложенного нумерованного списка</x-type::li>
							<x-type::li class="mb-4">Второй элемент вложенного нумерованного списка</x-type::li>
							<x-type::li class="mb-4">третий элемент вложенного нумерованного списка</x-type::li>
						</x-type::ol>
					</x-type::ol>
					<x-type::li class="mb-4">Второй элемент вложенного нумерованного списка</x-type::li>
					<x-type::li class="mb-4">третий элемент вложенного нумерованного списка</x-type::li>
				</x-type::ol>
				<x-type::li class="mb-4">Третий элемент нумерованного списка</x-type::li>
			</x-type::ol>
			<x-type::ul mod="disc" class="mb-64">
				<x-type::li class="mb-4">Первый элемент маркированного списка</x-type::li>
				<x-type::li class="mb-4">Второй элемент маркированного списка</x-type::li>
				<x-type::li class="mb-4">Третий элемент маркированного списка</x-type::li>
			</x-type::ul>
		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
