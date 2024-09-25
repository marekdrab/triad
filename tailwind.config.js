/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                black: '#1A1A1A',
                green: '#81DD77',
                blue: '#91DDEE',
                darkBlue: '#0000FF',
                light: '#F2F0E4'
            },
            keyframes: {
                driveDiagonal: {
                    '0%': { transform: 'translate(0, 30%)' },
                    '100%': { transform: 'translate(100%, -30%)' }
                },
            },
            animation: {
                driveDiagonal: 'driveDiagonal 5s linear infinite alternate',  // Custom animation for diagonal driving
            },
        },
    },
    plugins: [],
};
