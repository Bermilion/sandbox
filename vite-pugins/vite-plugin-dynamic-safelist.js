import fs from 'fs';
import { globSync } from 'glob';

/**
 * Функция для динамической генерации safelist
 * Сканирует blade файлы и извлекает классы с префиксами устройств
 */
export function generateDynamicSafelist() {
	const bladeFiles = globSync('resources/views/**/*.blade.php');
	const usedClasses = new Set();

	// console.log('Found blade files:', bladeFiles.length);

	bladeFiles.forEach(file => {
		const content = fs.readFileSync(file, 'utf8');
		// Ищем все class="..." атрибуты
		const classMatches = content.match(/class="([^"]*)"/g) || [];
		classMatches.forEach(match => {
			const classString = match.match(/="([^"]*)"/)[1];
			const classes = classString.split(/\s+/);
			classes.forEach(cls => {
				// Ищем классы с префиксами устройств
				if (/^(pp|pl|p|tp|tl|t|m|l|w|d|np):[mp][trblxy]*-\d+$/.test(cls)) {
					usedClasses.add(cls);
				}
			});
		});
	});

	// console.log('Found device-prefixed classes:', Array.from(usedClasses));
	return Array.from(usedClasses);
}
