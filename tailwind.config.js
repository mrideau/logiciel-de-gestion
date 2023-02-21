/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './public/grapesjs-tailwind.js',
        // 'https://unpkg.com/grapesjs-tailwind@1.0.9/dist/grapesjs-tailwind.min.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        fontFamily: {
            'sans': ['Montserrat', 'sans-serif'],
        },
        extend: {
            colors: {
                'primary': '#FF6B35',
                'danger': 'red',
                'success': 'green',
            },
        },
    },
    plugins: [],
}
