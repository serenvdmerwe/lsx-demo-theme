# GitHub Tests

This directory contains tests specifically for GitHub workflows and repository structure.

## Test Categories

1. **Workflow Validation** - Validates GitHub Action workflow files
2. **Theme Structure** - Tests the basic structure of the WordPress theme
3. **Pattern Validation** - Tests block patterns for proper metadata and structure
4. **Accessibility** - Tests theme components for accessibility compliance

## Running the Tests

From this directory, run:

```bash
npm install
npm test
```

## Continuous Integration

These tests are automatically run in the GitHub Actions CI pipeline to ensure all PRs maintain code quality and structure standards.

## Adding New Tests

To add new tests:

1. Create a new file with the `.test.js` extension
2. Write Jest-compatible tests
3. Follow the existing patterns for consistency
