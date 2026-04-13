import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {createSvgIconsPlugin} from "vite-plugin-svg-icons";
import path from 'path';

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
	],
});
