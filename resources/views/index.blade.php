<x-layouts.base-layout title="Документация">
	<div class="layout">
		<x-sidebar>
			<x-type::supheading>Основная концепция</x-type::supheading>
			<x-ui.menu>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Микромодуль</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Система шрифтов</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Базовый блок</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Адаптивный дизайн</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Типографика</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Цвет</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Интервалы</x-base::link></x-ui.menu-item>
				<x-ui.menu-item><x-base::link mod="menu" href="#">Компоненты</x-base::link></x-ui.menu-item>
			</x-ui.menu>
		</x-sidebar>
		<x-main>
			<x-type::h size="1" class="mb-16">Микромодуль</x-type::h>
			<x-type::p class="mb-16">Микромодуль — базовая единица измерения равная <x-ui.code>8px</x-ui.code>. Все переменные <x-ui.code>$scale</x-ui.code> подчиняются логике кратности микромодулю, обеспечивая согласованность интервалов во всём проекте.</x-type::p>
			<x-type::p class="mb-16">Значения масштаба могут быть указаны как:</x-type::p>
			<x-type::p class="mb-16">Число, кратное 8 (например: <x-ui.code>8</x-ui.code>, <x-ui.code>16</x-ui.code>, <x-ui.code>24</x-ui.code>)</x-type::p>
			<x-type::p class="mb-16">rem-значение (например: <x-ui.code>1rem</x-ui.code>, <x-ui.code>2rem</x-ui.code>)</x-type::p>
			<x-type::p class="mb-16">Имя переменной из конфига (например: <x-ui.code>scale-8</x-ui.code>)</x-type::p>
			<x-type::hint class="mb-32">Исключения возможны для специфических случаев, но по умолчанию все размеры должны быть кратны микромодулю.</x-type::hint>


			<x-ui.figure class="mb-16">

				<div class="micromodule">
					<div class="box_blue"></div>
				</div>

				@slot('code')
					<div class="line">
						<span class="color-slate-10"><</span>
						<span class="color-pink-10">div</span>
						<span class="color-slate-20"> class</span>
						<span class="color-slate-10">=</span>
						<span class="color-sky-20">"box_blue"</span>
						<span class="color-slate-10">></span>
						<span class="color-slate-10"><</span>
						<span class="color-slate-10">/</span>
						<span class="color-pink-10">div</span>
						<span class="color-slate-10">></span>
					</div>
					<div class="line"> </div>
					<div class="line">
						<span class="color-slate-20">  </span>
						<span class="color-slate-10">@</span>
						<span class="color-pink-10">return</span>
						<span class="color-slate-20"> var(</span>
						<span class="color-slate-10">--</span>
						<span class="color-sky-20">scale-8</span>
						<span class="color-slate-20">) var(</span>
						<span class="color-slate-10">--</span>
						<span class="color-sky-20">scale-16</span>
						<span class="color-slate-20">);</span>
					</div>
					<div class="line">
						<span class="color-slate-10">@</span>
						<span class="color-pink-10">function</span>
						<span class="color-slate-20"> scale-value(</span>
						<span class="color-sky-20">$values...</span>
						<span class="color-slate-20">)</span>
					</div>
					<div class="line">
						<span class="color-slate-20">  </span>
						<span class="color-slate-10">@</span>
						<span class="color-pink-10">return</span>
						<span class="color-slate-20"> 8px 16px;</span>
					</div>
					<div class="line">
						<span class="color-slate-10">@</span>
						<span class="color-pink-10">function</span>
						<span class="color-slate-20"> is-multiple(</span>
						<span class="color-sky-20">$value</span>
						<span class="color-slate-20">)</span>
					</div>
					<div class="line">
						<span class="color-slate-20">  </span>
						<span class="color-slate-10">@</span>
						<span class="color-pink-10">return</span>
						<span class="color-slate-20"> $value % 8 == 0;</span>
					</div>
				@endslot

			</x-ui.figure>
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



		</x-main>
	</div>
</x-layouts.base-layout>
