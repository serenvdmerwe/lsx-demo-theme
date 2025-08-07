const fs = require('fs');
const path = require('path');

describe('Block Pattern Tests', () => {
    const patternsDir = path.join(__dirname, '../../patterns');
    const patternFiles = fs.readdirSync(patternsDir)
        .filter(file => file.endsWith('.php'));

    test('patterns directory contains PHP files', () => {
        expect(patternFiles.length).toBeGreaterThan(0);
    });

    test.each(patternFiles)('%s has valid pattern metadata', (file) => {
        const filePath = path.join(patternsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // Check for title
        expect(fileContent).toMatch(/Title:/);

        // Check for slug
        expect(fileContent).toMatch(/Slug:/);

        // Check for categories
        expect(fileContent).toMatch(/Categories:/);
    });

    test.each(patternFiles)('%s uses proper translation functions', (file) => {
        const filePath = path.join(patternsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // If the file contains visible text strings, they should be translatable
        if (fileContent.includes('<?php esc_html_e(') || fileContent.includes('<?php esc_attr_e(')) {
            // Check if text domain is specified
            expect(fileContent).toMatch(/'lsx-demo-theme'/);
        }
    });

    test.each(patternFiles)('%s uses theme.json variables for styling', (file) => {
        const filePath = path.join(patternsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // Check for theme.json variable usage
        const hasThemeJsonVars =
            fileContent.includes('var:preset|') ||
            fileContent.includes('var(--wp--preset--') ||
            fileContent.includes('has-');

        expect(hasThemeJsonVars).toBe(true);
    });
});
