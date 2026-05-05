@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }}</title>
	@vite(['resources/scss/app.scss'])
</head>
<body class="body">
	{{ $slot }}
	<x-svg-sprite />
	@vite(['resources/js/app.js'])
</body>
</html>
