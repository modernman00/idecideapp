#!/bin/bash

# Local Testing & Code Quality Setup for iDecide
# Run this once to set up all the tools
# 🧪 Testing Commands:
#   npm run test              # Run JavaScript tests
#   npm run test:php          # Run PHP tests
#   npm run test:all          # Run all tests

# 🔍 Code Quality Commands:
#   npm run lint              # Check JavaScript code style
#   npm run lint:fix          # Fix JavaScript code style issues
#   npm run quality:php       # Check PHP code style
#   npm run quality:php:fix   # Fix PHP code style issues
#   npm run quality:all       # Check all code quality

🎯 Quick Commands:
  npm run test:watch        # Watch for changes and re-run tests

echo "🔧 Setting up local testing and code quality tools..."

# Install PHP development dependencies
echo "📦 Installing PHP development tools..."
if [ ! -f "composer.json" ]; then
    composer init --no-interaction
fi

# Add PHP development dependencies
composer require --dev phpunit/phpunit squizlabs/php_codesniffer phpstan/phpstan --no-interaction

# Install JavaScript testing and linting tools
echo "📦 Installing JavaScript development tools..."
npm install --save-dev eslint jest @babel/core @babel/preset-env babel-jest

# Create ESLint configuration
echo "⚙️ Creating ESLint configuration..."
cat > .eslintrc.js << 'EOF'
module.exports = {
    env: {
        browser: true,
        es2021: true,
        jquery: true
    },
    extends: 'eslint:recommended',
    parserOptions: {
        ecmaVersion: 12,
        sourceType: 'module'
    },
    rules: {
        'no-unused-vars': 'warn',
        'no-console': 'warn',
        'quotes': ['error', 'single'],
        'semi': ['error', 'always']
    },
    globals: {
        '$': 'readonly',
        'jQuery': 'readonly',
        'axios': 'readonly'
    }
};
EOF

# Create Jest configuration
echo "⚙️ Creating Jest configuration..."
cat > jest.config.js << 'EOF'
module.exports = {
    testEnvironment: 'jsdom',
    roots: ['<rootDir>/resources/js', '<rootDir>/tests/js'],
    testMatch: ['**/__tests__/**/*.js', '**/?(*.)+(spec|test).js'],
    transform: {
        '^.+\\.js$': 'babel-jest'
    },
    collectCoverageFrom: [
        'resources/js/**/*.js',
        '!resources/js/vendor/**'
    ]
};
EOF

# Create Babel configuration
echo "⚙️ Creating Babel configuration..."
cat > babel.config.js << 'EOF'
module.exports = {
    presets: ['@babel/preset-env']
};
EOF

# Create PHPUnit configuration
echo "⚙️ Creating PHPUnit configuration..."
cat > phpunit.xml << 'EOF'
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/9.3/phpunit.xsd"
         bootstrap="tests/bootstrap.php"
         colors="true">
    <testsuites>
        <testsuite name="iDecide Test Suite">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    <filter>
        <whitelist>
            <directory>src/</directory>
            <directory>app/</directory>
        </whitelist>
    </filter>
</phpunit>
EOF

# Create basic test directories
echo "📁 Creating test directories..."
mkdir -p tests/js
mkdir -p tests/php

# Create a sample PHP test
cat > tests/php/SampleTest.php << 'EOF'
<?php

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testBasicExample()
    {
        $this->assertTrue(true);
    }
    
    public function testMathWorks()
    {
        $this->assertEquals(4, 2 + 2);
    }
}
EOF

# Create a sample JavaScript test
cat > tests/js/sample.test.js << 'EOF'
// Sample JavaScript test
describe('Basic Math', () => {
    test('adds 1 + 2 to equal 3', () => {
        expect(1 + 2).toBe(3);
    });
    
    test('multiplication works', () => {
        expect(2 * 3).toBe(6);
    });
});

// Test jQuery if available
if (typeof $ !== 'undefined') {
    describe('jQuery', () => {
        test('jQuery should be available', () => {
            expect(typeof $).toBe('function');
        });
    });
}
EOF

# Create a simple bootstrap file for PHP tests
cat > tests/bootstrap.php << 'EOF'
<?php

// Basic test bootstrap
// Add any setup code your tests need here

// If you're using a framework, include its bootstrap
// require_once 'vendor/autoload.php';

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
EOF

# Update package.json scripts
echo "⚙️ Updating package.json scripts..."
node -e "
const fs = require('fs');
const pkg = JSON.parse(fs.readFileSync('package.json', 'utf8'));
pkg.scripts = {
    ...pkg.scripts,
    'test': 'jest',
    'test:watch': 'jest --watch',
    'lint': 'eslint resources/js/ --ext .js',
    'lint:fix': 'eslint resources/js/ --ext .js --fix',
    'quality:php': 'vendor/bin/phpcs --standard=PSR12 --ignore=vendor/ .',
    'quality:php:fix': 'vendor/bin/phpcbf --standard=PSR12 --ignore=vendor/ .',
    'test:php': 'vendor/bin/phpunit',
    'test:all': 'npm run test && npm run test:php',
    'quality:all': 'npm run lint && npm run quality:php'
};
fs.writeFileSync('package.json', JSON.stringify(pkg, null, 2));
"

echo ""
echo "✅ Setup complete! Here are your new commands:"
echo ""
echo "🧪 Testing Commands:"
echo "  npm run test              # Run JavaScript tests"
echo "  npm run test:php          # Run PHP tests"
echo "  npm run test:all          # Run all tests"
echo ""
echo "🔍 Code Quality Commands:"
echo "  npm run lint              # Check JavaScript code style"
echo "  npm run lint:fix          # Fix JavaScript code style issues"
echo "  npm run quality:php       # Check PHP code style"
echo "  npm run quality:php:fix   # Fix PHP code style issues"
echo "  npm run quality:all       # Check all code quality"
echo ""
echo "🎯 Quick Commands:"
echo "  npm run test:watch        # Watch for changes and re-run tests"
echo ""
echo "💡 Your GitHub Actions pipeline will now run all these checks automatically!"