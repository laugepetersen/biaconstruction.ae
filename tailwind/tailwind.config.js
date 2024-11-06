// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		fontFamily: {
			heading: ['Cormorant Infant', 'Times New Roman', 'Garamond', 'Georgia', 'serif'],
			body: ['Supreme', defaultTheme.fontFamily.sans],
		},
		extend: {
			colors: {
				"bg-gray": '#F1F0F5',
				"bg-beige": '#F6F3EE',
				black: '#282220',
				white: '#ffffff',
				transparent: 'transparent',
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),

		plugin(function ({ addUtilities }) {
      const newUtilities = {
        ".absolute-center": {
          position: "absolute",
          top: "50%",
          left: "50%",
          transform: "translate(-50%, -50%)",
        },
        ".absolute-cover": {
          position: "absolute",
          top: "0",
          left: "0",
          width: "100%",
          height: "100%",
        },
      };

      addUtilities(newUtilities);
    }),
	],
};
