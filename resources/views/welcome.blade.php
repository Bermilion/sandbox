<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="body">

	<x-type::h size="1" mode="light" text="Заголовок первого уровня"/>

    <x-utils::icon name="bars"/>

    <div class="viewports">
	    <p class="viewport viewport_mobile">Мобильное устройство</p>
	    <p class="viewport viewport_phone">Смартфон</p>
	    <p class="viewport viewport_phone-portrait">Смартфон вертикальный</p>
	    <p class="viewport viewport_phone-landscape">Смартфон горизонтальный</p>
	    <p class="viewport viewport_tablet">Планшет</p>
	    <p class="viewport viewport_tablet-portrait">Планшет вертикальный</p>
	    <p class="viewport viewport_tablet-landscape">Планшет горизонтальный</p>
	    <p class="viewport viewport_desktop">Десктоп</p>
	    <p class="viewport viewport_laptop">Ноутбук</p>
	    <p class="viewport viewport_wide">Широкоэкранник</p>
    </div>

    <button type="button" class="button">
	    <x-utils::icon name="bars"/>
	    <span>Кнопка</span>
    </button>

    </body>
</html>
