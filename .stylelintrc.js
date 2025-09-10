/**
 * Stylelint configuration for the project.
 *
 * - Extends the official WordPress Stylelint config for consistency with WordPress coding standards.
 * - Custom rules:
 *   - 'selector-class-pattern': Disabled to allow flexibility in class naming conventions, which may not always follow strict patterns in this project.
 *   - 'no-descending-specificity': Disabled to avoid unnecessary warnings when specificity order is intentionally managed for CSS overrides.
 *   - 'max-line-length': Set to 100 to enforce readable line lengths in stylesheets.
 *   - 'function-url-quotes', 'selector-attribute-quotes', 'font-family-name-quotes': Enforced for consistency and to avoid ambiguity in quoted values.
 */
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
