<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="body">
		<div class="box"></div>

		<div class="wrapper">
			<div class="grid">
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
				<div class="grid__item"></div>
			</div>
		</div>

		<p class="hero">Hero text</p>

		<div class="debug-grid"></div>
    </body>
</html>
