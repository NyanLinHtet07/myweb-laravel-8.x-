const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                title: [   'Nunito', 'sans-serif'],
            },

            animation: {
                'b': 'bounce 11s infinite',
                'blob': "blob 12s infinite",
              },
            
              keyframes:{
                blob:{
                    "0%":{
                        transform: " translate(0,0) scale(1)"
                    },
                    "25%":{
                        transform:" translate(30px, -40px) scale(1.1)"
                    },
                    "50%":{
                        transform:" translate(60px,-60px) scale(1.2)"
                    },
                    "75%":{
                        transform: " translate(-30px, 40px) scale(0.9)"
                    },
                    "100%":{
                        transform:" translate(0,0) scale(1)"
                    }
                }
              }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
