module.exports = {
    extends: ['plugin:@wordpress/eslint-plugin/recommended'],
    root: true,
    env: {
        browser: true,
        es6: true,
        node: true,
    },
    parserOptions: {
        ecmaVersion: 2020,
        sourceType: 'module',
    },
    rules: {
        // Add any custom rules here
        'no-console': 'warn',
        'no-unused-vars': 'warn',
        'prefer-const': 'warn',
        'jsdoc/require-param-description': 'warn',
        'jsdoc/require-returns-description': 'warn',
    },
};
