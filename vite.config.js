import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {createSvgIconsPlugin} from "vite-plugin-svg-icons";
import path from 'path';
import purge from '@erbelion/vite-plugin-laravel-purgecss';
import fs from 'fs';
import { globSync } from 'glob';

// Функция для динамической генерации safelist
function generateDynamicSafelist() {
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

const dynamicSafelist = generateDynamicSafelist();
// console.log('Dynamic safelist patterns:', dynamicSafelist.map(cls => ({
// 	original: new RegExp(`^${cls}$`),
// 	escaped: new RegExp(`^${cls.replace(':', '\\\\:')}$`)
// })));

export default defineConfig({
	resolve: {
		alias: {
			'@config': path.resolve(__dirname, 'resources/scss/config'),
			'@core': path.resolve(__dirname, 'chunker2i/base/resources/scss/core'),
			'@blocks': path.resolve(__dirname, 'chunker2i/base/resources/scss/blocks'),
			'@type': path.resolve(__dirname, 'chunker2i/base/resources/scss/type'),
			'@utils': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils')
		}
	},
	plugins: [
		laravel({
			input: ['resources/scss/app.scss', 'resources/js/app.js'],
			refresh: true,
		}),
		createSvgIconsPlugin({
			iconDirs: [path.resolve(process.cwd(), 'resources/icons')],
			symbolId: 'icon-[name]',
			svgoOptions: {
				plugins: [
					{
						name: 'removeAttrs',
						params: {
							attrs: 'fill',
						},
					},
					{
						name: 'addAttributesToSVGElement',
						params: {
							attributes: [{fill: 'currentColor'}],
						},
					},
				],
			},
		}),
		purge({
			paths: ['resources/views/**/*.blade.php'],
			safelist: {
				standard: [
					/^highlight/, /^highlight_/, /^highlight_*/,
					// Сохранять HTML элементы из _reset.scss
					'html', 'body', 'div', 'span', 'object', 'iframe', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
					'p', 'blockquote', 'pre', 'abbr', 'address', 'cite', 'code', 'del', 'dfn', 'em', 'img',
					'ins', 'kbd', 'q', 'samp', 'var', 'small', 'strong', 'sub', 'sup', 'b', 'i', 'dl', 'dt',
					'dd', 'ol', 'ul', 'li', 'a', 'fieldset', 'form', 'label', 'legend', 'table', 'caption',
					'tbody', 'tfoot', 'thead', 'tr', 'th', 'td', 'article', 'aside', 'figure', 'footer',
					'header', 'menu', 'nav', 'section', 'time', 'mark', 'audio', 'video', 'details', 'summary',
					'main', 'hr', 'input', 'select', 'textarea', 'button',
					// Динамически добавленные классы
					...dynamicSafelist,
					...dynamicSafelist.map(cls => cls.replace(':', '\\:'))
				],
				// Сохранять псевдоэлементы и псевдоклассы
				deep: [/^:/, /^::/],
				// Сохранять селекторы атрибутов
				greedy: [/^\[/],
			},
		}),
	],
});
