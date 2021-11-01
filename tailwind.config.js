module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class', // or 'media' or 'class'
    daisyui: {
        styled: true,
        themes: true,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
    },
    theme: {
        extend: {},
    },
    variants: {
        extend: {

            colors: require('daisyui/colors'),
        },
    },
    plugins: [require('postcss-import'), require('daisyui'), require('@tailwindcss/typography')],
}
