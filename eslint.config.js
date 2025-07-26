export default [
    {
        files: ["resources/assets/js/**/*.js", "public/js/**/*.js"],
        languageOptions: {
            ecmaVersion: 2021,
            sourceType: "module",
            globals: {
                "$": "readonly",
                "jQuery": "readonly",
                "axios": "readonly",
                "Chart": "readonly",
                "grecaptcha": "readonly",
                "confetti": "readonly",
                "navigator": "readonly",
                "window": "readonly",
                "document": "readonly",
                "console": "readonly",
                "localStorage": "readonly",
                "sessionStorage": "readonly",
                "alert": "readonly",
                "confirm": "readonly",
                "prompt": "readonly",
                "fetch": "readonly",
                "FormData": "readonly",
                "URLSearchParams": "readonly",
                "location": "readonly",
                "history": "readonly",
                "setTimeout": "readonly",
                "clearTimeout": "readonly",
                "setInterval": "readonly",
                "clearInterval": "readonly",
                "requestAnimationFrame": "readonly",
                "cancelAnimationFrame": "readonly",
                "indexedDB": "readonly",
                "Audio": "readonly",
                "IntersectionObserver": "readonly",
                "process": "readonly",
                "input": "readonly",
                "throwError": "readonly",
                "bootstrap": "readonly",
                "scoreEl": "readonly",
                "adviceEl": "readonly",
                "response": "readonly"
            }
        },
        rules: {
            "no-unused-vars": "warn",
            "no-console": "warn",
            "quotes": ["error", "single"],
            "semi": ["error", "always"],
            "no-undef": "error"
        }
    },
    {
        files: ["tests/js/**/*.js"],
        languageOptions: {
            ecmaVersion: 2021,
            sourceType: "module",
            globals: {
                "describe": "readonly",
                "test": "readonly",
                "expect": "readonly",
                "beforeEach": "readonly",
                "afterEach": "readonly",
                "beforeAll": "readonly",
                "afterAll": "readonly",
                "jest": "readonly"
            }
        },
        rules: {
            "no-unused-vars": "warn",
            "no-console": "warn",
            "quotes": ["error", "single"],
            "semi": ["error", "always"]
        }
    }
];
