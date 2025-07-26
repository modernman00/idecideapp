module.exports = {
    testEnvironment: 'jsdom',
    roots: ['<rootDir>/resources/assets/js', '<rootDir>/tests/js'],
    testMatch: ['**/__tests__/**/*.js', '**/?(*.)+(spec|test).js'],
    transform: {
        '^.+\.js$': 'babel-jest'
    },
    collectCoverageFrom: [
        'resources/assets/js/**/*.js',
        '!resources/assets/js/vendor/**'
    ]
};
