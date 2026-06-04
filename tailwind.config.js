/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./*.html",
        "./*.js",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                'aroma-bg': '#0f0f0f',
                'aroma-gold': '#C5A059',
            },
            fontFamily: {
                'serif': ['"Playfair Display"', 'serif'],
                'sans': ['"Montserrat"', 'sans-serif'],
            },
            animation: {
                'loop-scroll': 'loop-scroll 25s linear infinite',
                'blob': 'blob 7s infinite',
                'fade-in': 'fadeIn 0.6s ease-out',
                'slide-up': 'slideUp 0.6s ease-out',
            },
            keyframes: {
                'loop-scroll': {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-100%)' },
                },
                'blob': {
                    '0%': { transform: 'translate(0px, 0px) scale(1)' },
                    '33%': { transform: 'translate(5px, -10px) scale(1.05)' },
                    '66%': { transform: 'translate(-5px, 5px) scale(0.95)' },
                    '100%': { transform: 'translate(0px, 0px) scale(1)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                }
            }
        }
    },
    plugins: [],
}
