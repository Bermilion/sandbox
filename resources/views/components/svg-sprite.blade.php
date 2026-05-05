@php
	function getSvgFiles($path) {
		$files = [];
		if (is_dir($path)) {
			$dirFiles = scandir($path);
			foreach ($dirFiles as $file) {
				if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'svg') {
					$files[] = $file;
				}
			}
		}
		return $files;
	}

	function processSvgToSymbol($svgPath, $iconName, $isColored = false) {
		$svgContent = file_get_contents($svgPath);
		$dom = new DOMDocument();
		$dom->loadXML($svgContent, LIBXML_NOERROR);
		$svgElement = $dom->getElementsByTagName('svg')->item(0);

		if (!$svgElement) {
			return '';
		}

		$symbolId = "icon-{$iconName}";
		$viewBox = $svgElement->getAttribute('viewBox');

		$html = '<symbol id="' . $symbolId . '"';
		if ($viewBox) {
			$html .= ' viewBox="' . $viewBox . '"';
		}
		$html .= '>';

		foreach ($svgElement->childNodes as $child) {
			$clonedChild = $dom->importNode($child, true);

			// Для монохромных иконок заменяем fill на currentColor
			if (!$isColored && $clonedChild->hasAttributes()) {
				if ($clonedChild->hasAttribute('fill')) {
					$clonedChild->removeAttribute('fill');
				}
				$clonedChild->setAttribute('fill', 'currentColor');
			}

			// Рекурсивно обрабатываем дочерние элементы (только для монохромных)
			if (!$isColored && $clonedChild->hasChildNodes()) {
				$xpath = new DOMXPath($dom);
				$nodes = $xpath->query('.//*[@fill]', $clonedChild);
				foreach ($nodes as $node) {
					$node->removeAttribute('fill');
					$node->setAttribute('fill', 'currentColor');
				}
			}

			$html .= $dom->saveXML($clonedChild);
		}

		$html .= '</symbol>';
		return $html;
	}

	$iconsPath = resource_path('icons');
	$coloredIconsPath = resource_path('icons-colored');

	$monochromeIcons = getSvgFiles($iconsPath);
	$coloredIcons = getSvgFiles($coloredIconsPath);
@endphp

<svg id="__svg__icons__dom__" style="position: absolute; width: 0; height: 0; overflow: hidden;" aria-hidden="true">
	{{-- Монохромные иконки с currentColor --}}
	@foreach($monochromeIcons as $svgFile)
		{!! processSvgToSymbol($iconsPath . '/' . $svgFile, pathinfo($svgFile, PATHINFO_FILENAME), false) !!}
	@endforeach

	{{-- Цветные иконки с оригинальными цветами --}}
	@foreach($coloredIcons as $svgFile)
		{!! processSvgToSymbol($coloredIconsPath . '/' . $svgFile, pathinfo($svgFile, PATHINFO_FILENAME), true) !!}
	@endforeach
</svg>
