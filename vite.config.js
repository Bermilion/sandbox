import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import purge from '@erbelion/vite-plugin-laravel-purgecss';
import { generateDynamicSafelist } from './vite-pugins/vite-plugin-dynamic-safelist.js';


const dynamicSafelist = generateDynamicSafelist();

export default defineConfig({
	resolve: {
		alias: {
			'@config': path.resolve(__dirname, 'resources/scss/config'),
			'@core': path.resolve(__dirname, 'chunker2i/base/resources/scss/core'),
			'@blocks': path.resolve(__dirname, 'chunker2i/base/resources/scss/blocks'),
			'@type': path.resolve(__dirname, 'chunker2i/base/resources/scss/type'),
			'@utils': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils'),
			'@functions': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils/functions'),
			'@mixins': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils/mixins'),
			'@classes': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils/classes'),
			'@colors': path.resolve(__dirname, 'chunker2i/base/resources/scss/utils/tailwind-colors'),
			'@ui': path.resolve(__dirname, 'chunker2i/base/resources/scss/ui'),
		}
	},
	plugins: [
		laravel({
			input: ['resources/scss/app.scss', 'resources/js/app.js'],
			refresh: true,
		}),
		purge({
			paths: ['resources/views/**/*.blade.php'],
			safelist: {
				standard: [
					/^highlight/, /^highlight_/, /^highlight_*/, /link/, /link_menu/,
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
					...dynamicSafelist.map(cls => cls.replace(':', '\\:')),
				],
				// Сохранять псевдоэлементы и псевдоклассы
				deep: [/^:/, /^::/],
				// Сохранять селекторы атрибутов
				greedy: [/^\[/],
			},
		}),
	],
});
