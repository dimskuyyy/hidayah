/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./application/**/*.{js,php}"],
	theme: {
		container: {
			center: true,
			padding: "16px",
		},
		extend: {
			fontFamily: {
				poppins: ["Poppins", "sans-serif"],
			},
			colors: {
				mytosca: "#05A7A4",
				"mytosca-dark": "#0E9795",
			},
		},
	},
	plugins: [
		require("prettier-plugin-tailwindcss"),
		require("@tailwindcss/typography"),
		require("@tailwindcss/forms"),
		require("tailwind-scrollbar")({ nocompatible: true }),
	],
	corePlugins: {
		preflight:false
	}
};
