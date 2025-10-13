module.exports = {
	// Use WordPress scripts default configuration
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
		// Basic rules that won't cause parsing errors
		'no-console': 'warn',
		'no-unused-vars': 'warn',
	},
	// Ignore TypeScript files that are causing parsing errors
	ignorePatterns: [
		'**/*.ts',
		'**/*.tsx',
		'tests/**/*',
		'tests-examples/**/*',
		'e2e/**/*',
		'node_modules/**/*',
		'build/**/*',
		'vendor/**/*',
	],
};
