module.exports = {
    extends: ['@wordpress/stylelint-config'],
    rules: {
        // Add any custom rules here
        'selector-class-pattern': null,
        'max-line-length': 100,
        'no-descending-specificity': null,
        'function-url-quotes': 'always',
        'selector-attribute-quotes': 'always',
        'font-family-name-quotes': 'always-where-recommended',
    },
};
