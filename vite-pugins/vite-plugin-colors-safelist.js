import fs from 'fs';

/**
 * Функция для динамической генерации safelist на основе colors.json
 * Генерирует паттерны для классов вида box_darkest-blue, box_accent_light и т.д.
 */
export function generateColorsSafelist() {
	const safelistPatterns = [];

	// Читаем colors.json
	try {
		const colorsJson = fs.readFileSync('public/colors.json', 'utf8');
		const colors = JSON.parse(colorsJson);

		// Генерируем паттерны для каждого цвета
		Object.keys(colors).forEach(colorName => {
			// Паттерн для box_{color-name}
			safelistPatterns.push(new RegExp(`^box_${colorName}$`));

			// Паттерны для box_{color-name}_{variant} (base, light, dark, content)
			const variants = ['base', 'light', 'dark', 'content'];
			variants.forEach(variant => {
				safelistPatterns.push(new RegExp(`^box_${colorName}_${variant}$`));
			});
		});

		// console.log('Generated color-based safelist patterns:', safelistPatterns.length);
	} catch (error) {
		console.error('Error reading colors.json:', error.message);
	}

	return safelistPatterns;
}
