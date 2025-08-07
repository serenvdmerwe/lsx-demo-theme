const fs = require('fs');
const path = require('path');

describe('Theme Structure Tests', () => {
    test('theme.json exists and is valid JSON', () => {
        const themeJsonPath = path.join(__dirname, '../../theme.json');
        expect(fs.existsSync(themeJsonPath)).toBe(true);

        const themeJsonContent = fs.readFileSync(themeJsonPath, 'utf8');
        expect(() => {
            JSON.parse(themeJsonContent);
        }).not.toThrow();
    });

    test('theme.json contains required settings', () => {
        const themeJsonPath = path.join(__dirname, '../../theme.json');
        const themeJson = JSON.parse(fs.readFileSync(themeJsonPath, 'utf8'));

        expect(themeJson).toHaveProperty('settings');
        expect(themeJson.settings).toHaveProperty('color');
        expect(themeJson.settings).toHaveProperty('typography');
        expect(themeJson.settings).toHaveProperty('spacing');
    });

    test('style.css exists and contains theme metadata', () => {
        const styleCssPath = path.join(__dirname, '../../style.css');
        expect(fs.existsSync(styleCssPath)).toBe(true);

        const styleCssContent = fs.readFileSync(styleCssPath, 'utf8');
        expect(styleCssContent).toMatch(/Theme Name:/);
        expect(styleCssContent).toMatch(/Theme URI:/);
        expect(styleCssContent).toMatch(/Author:/);
        expect(styleCssContent).toMatch(/Version:/);
        expect(styleCssContent).toMatch(/License:/);
        expect(styleCssContent).toMatch(/Text Domain:/);
    });

    test('functions.php exists', () => {
        const functionsPhpPath = path.join(__dirname, '../../functions.php');
        expect(fs.existsSync(functionsPhpPath)).toBe(true);
    });

    test('template parts directory exists and contains templates', () => {
        const templatePartsPath = path.join(__dirname, '../../parts');
        expect(fs.existsSync(templatePartsPath)).toBe(true);

        const templateParts = fs.readdirSync(templatePartsPath);
        expect(templateParts.length).toBeGreaterThan(0);

        // Check that there's at least one header and footer
        const hasHeader = templateParts.some(file => file.includes('header'));
        const hasFooter = templateParts.some(file => file.includes('footer'));
        expect(hasHeader).toBe(true);
        expect(hasFooter).toBe(true);
    });
});
