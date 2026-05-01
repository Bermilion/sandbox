<x-layouts.base-layout title="Типографика">
	<x-layouts.documentation>
		<x-layouts.wrapper mod="800" class="mt-64 mb-32">
			<x-type::h size="1" class="mb-24">Компоненты типографики</x-type::h>
			<x-type::p class="mb-16">Набор компонентов для оформления текстового контента. Все компоненты поддерживают модификаторы через атрибут <x-ui.code>mod</x-ui.code> и дополнительные CSS-классы.</x-type::p>

			<x-type::supheading class="mb-8">Примеры заголовков</x-type::supheading>
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

			</x-ui.figure>

			<x-type::p class="mb-8">Атрибуты заголовков:</x-type::p>
			<x-type::p class="mb-4"><x-ui.code mod="inline">size</x-ui.code> — размер заголовка (1–6), по умолчанию 2;</x-type::p>
			<x-type::p class="mb-4"><x-ui.code mod="inline">mod</x-ui.code> — модификатор стиля;</x-type::p>
			<x-type::p class="mb-64"><x-ui.code mod="inline">text</x-ui.code> — текст заголовка (альтернатива слоту).</x-type::p>

			<x-type::supheading class="mb-8">Пример параграфа</x-type::supheading>
			<x-ui.figure class="mb-16">
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

			</x-ui.figure>
			<x-type::p class="mb-64">Атрибут у параграфа только <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

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
			<x-type::p class="mb-64">
				<x-ui.code>lang</x-ui.code>
				— язык текста (например, "ru") нужен для корректного переноса слов по слогам, если его не указать
				длинные слова не будут корректно переноситься по слогам.
			</x-type::p>

			<x-type::supheading class="mb-8">Пример надзаголовка</x-type::supheading>
			<x-ui.figure class="mb-16">
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

			</x-ui.figure>
			<x-type::p class="mb-16">Мелкий текст над заголовком для дополнительного контекста.</x-type::p>
			<x-type::p class="mb-64">Атрибут только один <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

			<x-type::supheading class="mb-8">Пример подсказки</x-type::supheading>
			<x-ui.figure class="mb-16">
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

			</x-ui.figure>
			<x-type::p class="mb-16">Текст для подсказок, примечаний или дополнительной информации.</x-type::p>
			<x-type::p class="mb-64">Атрибут только <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

			<x-type::supheading class="mb-8">Пример маркированного списка</x-type::supheading>
			<x-ui.figure class="mb-16">
				<x-type::ul mod="disc">
					<x-type::li class="mb-4">Первый элемент маркированного списка</x-type::li>
					<x-type::li class="mb-4">Второй элемент маркированного списка</x-type::li>
					<x-type::li>Третий элемент маркированного списка</x-type::li>
				</x-type::ul>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">ul</span>
						<span class="color-slate-300"> mod</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"disc"</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span>   </span>
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Первый элемент маркированного списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span>   </span>
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Второй элемент маркированного списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span>   </span>
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Третий элемент маркированного списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">ul</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-ui.figure>
			<x-type::p class="mb-64">Атрибут <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

			<x-type::supheading class="mb-8">Пример нумерованного списка</x-type::supheading>
			<x-ui.figure class="mb-16">
				<x-type::ol mod="base">
					<x-type::li class="mb-4">Первый элемент нумерованного списка</x-type::li>
					<x-type::li class="mb-4">Второй элемент нумерованного списка</x-type::li>
					<x-type::li>Третий элемент нумерованного списка</x-type::li>
				</x-type::ol>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">ol</span>
						<span class="color-slate-300"> mod</span>
						<span class="color-slate-400">=</span>
						<span class="color-sky-300">"base"</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span>   </span>
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Первый элемент нумерованного списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span>   </span>
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Второй элемент нумерованного списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span>   </span>
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Третий элемент нумерованного списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">ol</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-ui.figure>
			<x-type::p class="mb-64">Атрибут <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

			<x-type::supheading class="mb-8">Пример элемента списка</x-type::supheading>
			<x-ui.figure class="mb-16">
				<x-type::ul mod="disc">
					<x-type::li>Элемент списка</x-type::li>
				</x-type::ul>

				@slot('code')
					<div class="line">
						<span class="color-slate-400"><</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
						<span class="color-slate-50">Элемент списка</span>
						<span class="color-slate-400"><</span>
						<span class="color-slate-400">/</span>
						<span class="color-pink-400">x</span>
						<span class="color-slate-300">-</span>
						<span class="color-pink-400">type</span>
						<span class="color-slate-300">::</span>
						<span class="color-pink-400">li</span>
						<span class="color-slate-400">></span>
					</div>
				@endslot

			</x-ui.figure>
			<x-type::p class="mb-16">Компонент для элемента списка (используется внутри <x-ui.code>x-type::ol</x-ui.code> или <x-ui.code>x-type::ul</x-ui.code>).</x-type::p>
			<x-type::p class="mb-64">Атрибут <x-ui.code>mod</x-ui.code> — модификатор стиля.</x-type::p>

		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
