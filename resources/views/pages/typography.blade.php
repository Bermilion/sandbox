<x-layouts.base-layout title="Типографика">
	<x-layouts.documentation>
		<x-layouts.wrapper class="mt-64 mb-32">
			<x-type::h size="1" class="mb-24">Компоненты типографики</x-type::h>
			<x-type::p class="mb-16">Набор компонентов для оформления текстового контента. Все компоненты поддерживают модификаторы через атрибут <x-type::code>mod</x-type::code> и дополнительные CSS-классы.</x-type::p>

			<x-type::h size="2" class="mt-48 mb-24">Доступные компоненты</x-type::h>

			<x-type::h size="3" class="mt-32 mb-16">x-type::h — Заголовки</x-type::h>
			<x-type::p class="mb-16">Компонент для заголовков уровня h1–h6.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::h size="1"&gt;Заголовок первого уровня&lt;/x-type::h&gt;
&lt;x-type::h size="2"&gt;Заголовок второго уровня&lt;/x-type::h&gt;
&lt;x-type::h size="3"&gt;Заголовок третьего уровня&lt;/x-type::h&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>size</x-type::code> — размер заголовка (1–6), по умолчанию 2</x-type::li>
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
				<x-type::li class="mb-4"><x-type::code>text</x-type::code> — текст заголовка (альтернатива слоту)</x-type::li>
			</x-type::ul>

			<x-type::h size="3" class="mt-32 mb-16">x-type::p — Параграф</x-type::h>
			<x-type::p class="mb-16">Компонент для текстовых параграфов.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::p&gt;Текст параграфа&lt;/x-type::p&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
			</x-type::ul>

			<x-type::h size="3" class="mt-32 mb-16">x-type::hero — Герой-текст</x-type::h>
			<x-type::p class="mb-16">Крупный текст для заголовков секций или главных заголовков страницы.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::hero lang="ru"&gt;Главный заголовок страницы&lt;/x-type::hero&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
				<x-type::li class="mb-4">
					<x-type::code>lang</x-type::code>
					— язык текста (например, "ru") нужен для корректного переноса слов по слогам, если его не указать
					длинные слова не будут корректно переноситься по слогам.
				</x-type::li>
			</x-type::ul>

			<x-type::h size="3" class="mt-32 mb-16">x-type::supheading — Надзаголовок</x-type::h>
			<x-type::p class="mb-16">Мелкий текст над заголовком для дополнительного контекста.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::supheading&gt;Дополнительный контекст&lt;/x-type::supheading&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
			</x-type::ul>

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

			<x-type::h size="3" class="mt-32 mb-16">x-type::hint — Подсказка</x-type::h>
			<x-type::p class="mb-16">Текст для подсказок, примечаний или дополнительной информации.</x-type::p>
			<x-type::code mod="block" class="mb-16">
				```blade
&lt;x-type::hint&gt;Важная подсказка&lt;/x-type::hint&gt;
```
			</x-type::code>
			<x-type::p class="mb-8">Атрибуты:</x-type::p>
			<x-type::ul mod="disc" class="mb-24">
				<x-type::li class="mb-4"><x-type::code>mod</x-type::code> — модификатор стиля</x-type::li>
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
			<x-type::h size="2" class="mt-48 mb-24">Примеры использования</x-type::h>
			<x-type::hero lang="ru" class="mt-32 mb-40 np:mt-64 np:mb-72">Каждому человеку нужна собственная планета</x-type::hero>
			<x-type::supheading>Таблица с ценами на модели минипланет</x-type::supheading>
			<x-type::h size="1" lang="ru" class="mb-32 np:mb-56">Каждому человеку нужна собственная планета</x-type::h>
			<x-type::p>Первый раз минипланеты были упомянуты французским лётчиком в книге для взрослых детей. Тогда читатели
				углубились в философский аспект произведения, не придав значения идее частных планет-астероидов.
				Но с середины прошлого века технологии развились достаточно, чтобы предложить людям особенную замену
				классичискому решению жилищного вопроса.
			</x-type::p>
			<x-type::h size="2" class="mt-48 mb-24 np:mt-96 np:mb-48">Что такое минипланета?</x-type::h>
			<x-type::p class="mb-16">Минипланета — небольшой астероид, размером примерно с двухэтажный дом. Он перемещается по просторам
				космоса со скоростью 30 км/с. Безопасность перемещения обеспечивается автопилотом «Rose4Spikes».
			</x-type::p>
			<x-type::p>Каждая планета при желании может быть оснащена вулканами, фонарями и роботами-садовниками для прополки
				ростков баобабов.</x-type::p>
			<x-type::h size="3" class="mt-48 mb-24 np:mt-80 np:mb-40">Какими особенностями обладают минипланеты?</x-type::h>
			<x-type::p>На планете есть комплект мебели, необходимый для просмотра закатов</x-type::p>
			<x-type::h size="4" class="mt-64 mb-32 np:mt-80 np:mb-40">Как происходит транспортировка жителей на минипланету? Это, наверно, не быстро?</x-type::h>
			<x-type::p class="mb-16">Это быстро. Дело в том, что минипланеты оборудованы телепортами «DesertSnake 30s». Вы можете посетить
				любую из телестанций на Земле, с которой за 30 секунд вы всей семьёй сможете переместиться на поверхность
				вашего астероида.
			</x-type::p>
			<x-type::p>Вы также можете взять с собой багаж, но не более 23 кг на человека за рейс.</x-type::p>
			<x-type::h size="5" class="mt-48 mb-24 np:mt-64 np:mb-32">Сколько стоит частная минипланета? Есть гарантия на встроенное оборудование? На каких
				условиях предоставляется обслуживание?
			</x-type::h>
			<x-type::p>Мы даём бессрочную гарантию на частные астероиды и всё встроенное оборудование. Регулярное
				обслуживание минипланет мы предоставляем по отдельному договору.
			</x-type::p>
			<x-type::h size="6" class="mt-48 mb-24">А чем минипланета лучше квартиры или дома на земле? Разве не лучше жить вместе со всеми, как
				тысячи лет ранее?
			</x-type::h>
			<x-type::p class="mb-16">Можно жить и на Земле. Но в этом случае вы зависите от решений, принимаемых посторнними людьми.
				Войны, революции, вредная экология, уродливая реклама — зачем вам это? Не лучше ли сидеть на кресле, едующим
				за закатом по железной дороге и распивать можевеловый сок, дыша чистым свежесгенерированным кислородом
				в окружении близких?
			</x-type::p>
			<x-type::hint class="mb-32">Таблица с ценами на модели минипланет</x-type::hint>
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
