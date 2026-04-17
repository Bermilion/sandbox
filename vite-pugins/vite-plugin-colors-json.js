import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(path.dirname(__filename));

/**
 * Vite plugin для генерации JSON с картой цветов из SCSS
 */
export function colorsJsonPlugin(options = {}) {
	const {
		scssPath = 'chunker2i/base/resources/scss/core/_variables.scss',
		outputPath = 'public/colors.json',
		watch = true
	} = options;

	let resolvedScssPath;
	let resolvedOutputPath;

	return {
		name: 'colors-json',
		
		configResolved(config) {
			resolvedScssPath = path.resolve(config.root, scssPath);
			resolvedOutputPath = path.resolve(config.root, outputPath);
		},

		async buildStart() {
			await generateColorsJson();
		},

		configureServer(server) {
			if (watch) {
				server.watcher.add(resolvedScssPath);
				server.watcher.add(path.resolve(__dirname, 'resources/scss/config/_colors.scss'));
				server.watcher.add(path.resolve(__dirname, 'chunker2i/base/resources/scss/core/_colors.scss'));
				server.watcher.on('change', async (filePath) => {
					if (filePath === resolvedScssPath || 
						filePath.includes('config/_colors.scss') || 
						filePath.includes('core/_colors.scss')) {
						await generateColorsJson();
					}
				});
			}
		}
	};

	async function generateColorsJson() {
		try {
			// Компилируем SCSS с помощью sass-embedded
			const sass = await import('sass-embedded');
			const result = sass.compile(resolvedScssPath, {
				loadPaths: [
					path.resolve(__dirname, 'resources/scss'),
					path.resolve(__dirname, 'chunker2i/base/resources/scss/core'),
					path.resolve(__dirname, 'chunker2i/base/resources/scss/config'),
					path.resolve(__dirname, 'chunker2i/base/resources/scss/blocks'),
					path.resolve(__dirname, 'chunker2i/base/resources/scss/type'),
					path.resolve(__dirname, 'chunker2i/base/resources/scss/utils'),
				],
				importers: [{
					findFileUrl(url) {
						// Обработка алиасов
						if (url.startsWith('@')) {
							const aliasMap = {
								'@config': path.resolve(__dirname, 'resources/scss/config'),
								'@core': path.resolve(__dirname, 'chunker2i/base/resources/scss/core'),
								'@blocks': path.resolve(__dirname, 'chunker2i/base/resources/scss/blocks'),
								'@type': path.resolve(__dirname, 'chunker2i/base/resources/scss/type'),
								'@utils': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils')
							};
							
							for (const [alias, aliasPath] of Object.entries(aliasMap)) {
								if (url.startsWith(alias)) {
									const relativePath = url.replace(alias, '').replace(/^\//, '');
									const fullPath = path.resolve(aliasPath, relativePath);
									
									// Проверяем различные варианты расширений
									const possiblePaths = [
										fullPath,
										fullPath + '.scss',
										fullPath.replace(/_/g, '') + '.scss',
										path.join(aliasPath, '_' + relativePath),
										path.join(aliasPath, '_' + relativePath + '.scss'),
									];
									
									for (const possiblePath of possiblePaths) {
										if (fs.existsSync(possiblePath)) {
											return new URL(`file://${possiblePath}`);
										}
									}
								}
							}
						}
						return null;
					}
				}]
			});

			// Парсим CSS и извлекаем цвета
			const colors = parseColorsFromCss(result.css);

			// Сохраняем JSON
			fs.mkdirSync(path.dirname(resolvedOutputPath), { recursive: true });
			fs.writeFileSync(resolvedOutputPath, JSON.stringify(colors, null, 2), 'utf-8');

			console.log(`✓ Colors JSON generated: ${resolvedOutputPath}`);
		} catch (error) {
			console.error('Error generating colors JSON:', error.message);
		}
	}

	function parseColorsFromCss(css) {
		const colors = {};
		const lines = css.split('\n');

		for (const line of lines) {
			const trimmed = line.trim();
			
			// Парсим CSS custom properties с цветами (hex, rgb, hsl)
			if (trimmed.startsWith('--color-') && trimmed.includes(':')) {
				const match = trimmed.match(/--color-([a-z0-9-]+):\s*(#[a-fA-F0-9]+|rgb\([^)]+\)|hsl\([^)]+\))/);
				if (match) {
					const [, colorName, colorValue] = match;
					const parts = colorName.split('-');
					
					// Определяем оттенок (base, light, dark, content)
					// Если последний элемент - известный оттенок, то используем его
					const shade = parts[parts.length - 1];
					const validShades = ['base', 'light', 'dark', 'content'];
					
					if (validShades.includes(shade)) {
						// Базовый цвет - всё кроме последнего элемента
						const baseColor = parts.slice(0, -1).join('-');
						
						if (!colors[baseColor]) {
							colors[baseColor] = {};
						}
						colors[baseColor][shade] = colorValue;
					} else {
						// Если последний элемент не является известным оттенком,
						// считаем что это весь цвет и оттенок = base
						if (!colors[colorName]) {
							colors[colorName] = {};
						}
						colors[colorName]['base'] = colorValue;
					}
				}
			}
		}

		return colors;
	}
}
