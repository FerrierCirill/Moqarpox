module.exports = {
	theme: {
		extend: {}
	},
	variants: {},
	plugins: [
		require('postcss-import'),
		require('tailwindcss'),
		require('postcss-nested'),
		require('postcss-custom-properties'),
		require('autoprefixer')
	]
};
