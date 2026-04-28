<x-layouts.base-layout title="Интервалы">
	<x-layouts.documentation>
		<x-layouts.wrapper class="my-64">
			<x-type::h size="1" class="mb-24">Интервалы</x-type::h>
			<x-type::p class="mb-16">Все размеры представлены в карте `$sizes` в файле `scss/config/_sizes.scss`. Они
				служат базой для микромодулей. И доступны как css переменные через функцию
				<x-ui.code>s($keys...)</x-ui.code> где $keys - это ключи из карты `$sizes`.
			</x-type::p>
			<x-ui.code mod="block" class="mb-32">
				```scss
		$sizes: (
			'0': 	0,      	// 0px
			'1': 	0.125rem,	// 1px
			'2': 	0.25rem, 	// 2px
			'4': 	0.5rem,  	// 4px
			'8': 	1rem,   	// 8px
			'12': 	1.5rem,   	// 12px
			'16': 	2rem,     	// 16px
			'20': 	2.5rem,   	// 20px
			'24': 	3rem,     	// 24px
			'32': 	4rem,     	// 32px
			'40': 	5rem,    	// 40px
			'48': 	6rem,   	// 48px
			'56': 	7rem,    	// 56px
			'64': 	8rem,    	// 64px
			'72': 	9rem,    	// 72px
			'80': 	10rem,   	// 80px
			'88': 	11rem,   	// 88px
			'96': 	12rem,   	// 96px
			'104': 	13rem,  	// 104px
			'240':  30rem,   	// 240px
			'320':  40rem,   	// 320px
			'800':  100rem,   	// 800px
		);
	```
			</x-ui.code>
			<x-type::p class="mb-16">Так как микромодуль 8px и равен 1rem для удобства все ключи отсылают нас к пиксельным значениям.</x-type::p>
			<x-type::p class="mb-16">Функция
				<x-ui.code>s($keys...)</x-ui.code>
				принимает в себя от одного до четырех значений перечисленных через запятую. Вернёт `null` если ключ не
				найден (нет в карте `$sizes`).
			</x-type::p>

			<x-type::h size="2" class="mt-48 mb-24">Классы отступов</x-type::h>
			<x-type::p class="mb-16">На основе карты `$sizes` генерируются утилитарные классы для `padding` и `margin`. Классы поддерживают все направления и адаптивные модификаторы для различных устройств.</x-type::p>

			<x-type::h size="3" class="mt-48 mb-24">Padding (внутренние отступы)</x-type::h>
			<x-type::p class="mb-16">Префикс <x-ui.code>p</x-ui.code> — для padding. Формат: <x-ui.code>p{направление}-{размер}</x-ui.code></x-type::p>

			<x-ui.code mod="block" class="mb-32">
				```scss
p-{size}        // Все стороны
pt-{size}       // Только top
pr-{size}       // Только right
pb-{size}       // Только bottom
pl-{size}       // Только left
px-{size}       // left + right
py-{size}       // top + bottom
```
			</x-ui.code>

			<x-type::h size="4" class="mt-48 mb-24">Примеры использования padding</x-type::h>
			<x-type::p class="mb-16">p-16 — отступ 16px со всех сторон</x-type::p>
			<x-type::p class="mb-16">px-24 py-12 — горизонтальный 24px, вертикальный 12px</x-type::p>
			<x-type::p>pt-32 pb-16 — top 32px, bottom 16px</x-type::p>

			<x-type::h size="3" class="mt-48 mb-24">Margin (внешние отступы)</x-type::h>
			<x-type::p class="mb-16">Префикс <x-ui.code>m</x-ui.code> — для margin. Формат: <x-ui.code>m{направление}-{размер}</x-ui.code></x-type::p>

			<x-ui.code mod="block" class="mb-32">
				```scss
m-{size}        // Все стороны
mt-{size}       // Только top
mr-{size}       // Только right
mb-{size}       // Только bottom
ml-{size}       // Только left
mx-{size}       // left + right
my-{size}       // top + bottom
```
			</x-ui.code>

			<x-type::h size="4" class="mt-48 mb-24">Примеры использования margin</x-type::h>
			<x-type::p class="mb-16">m-16 — отступ 16px со всех сторон</x-type::p>
			<x-type::p class="mb-16">mb-24 — bottom 24px</x-type::p>
			<x-type::p>mt-32 mb-16 — top 32px, bottom 16px</x-type::p>

			<x-type::h size="3" class="mt-48 mb-24">Адаптивные модификаторы</x-type::h>
			<x-type::p class="mb-16">Классы поддерживают адаптивные префиксы для разных устройств:</x-type::p>

			<x-ui.code mod="block" class="mb-32">
				```scss
pp  // phone-portrait   (портретный телефон)
pl  // phone-landscape   (альбомный телефон)
p   // phone             (телефон)
tp  // tablet-portrait   (портретный планшет)
tl  // tablet-landscape  (альбомный планшет)
t   // tablet            (планшет)
m   // mobile            (мобильные устройства)
l   // laptop            (ноутбук)
w   // wide              (широкие экраны)
d   // desktop           (десктоп)
np  // no-phone          (не телефон)
```
			</x-ui.code>

			<x-type::p class="mb-16">Формат адаптивного класса: <x-ui.code>{устройство}:{класс}</x-ui.code></x-type::p>

			<x-ui.code mod="block" class="mb-32">
				```scss
p:pt-16     // padding-top: 16px на телефоне
np:px-24    // padding-x: 24px не на телефоне
d:mb-48     // margin-bottom: 48px на десктопе
```
			</x-ui.code>

			<x-type::h size="4" class="mt-48 mb-24">Пример адаптивных отступов</x-type::h>
			<x-type::p>p-16 tp:px-24 np:px-48 — базовый 16px, на планшете портретной ориентации 24px, не на телефоне 48px по горизонтали</x-type::p>

		</x-layouts.wrapper>
	</x-layouts.documentation>
</x-layouts.base-layout>
