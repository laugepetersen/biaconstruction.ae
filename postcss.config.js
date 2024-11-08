/* eslint-env node */

module.exports = {
	plugins: [
		require('postcss-import-ext-glob'),
		require('postcss-import')({
			path: [
				'./',
				'./node_modules',
				__dirname
			]
		}),
		require('tailwindcss/nesting'),
		require('tailwindcss'),
	],
};
