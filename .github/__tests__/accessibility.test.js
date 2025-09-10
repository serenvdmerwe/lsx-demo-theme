const fs = require('fs');
const path = require('path');

// Test utilities
function getHeadingLevel(tag) {
    return parseInt(tag.replace(/[^\d]/g, ''), 10);
}

describe('Accessibility Tests', () => {
    const patternsDir = path.join(__dirname, '../../patterns');
    const patternFiles = fs.readdirSync(patternsDir)
        .filter(file => file.endsWith('.php'));

    test.each(patternFiles)('%s has proper heading hierarchy', (file) => {
        const filePath = path.join(patternsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // Extract heading tags using regex
        const headingTags = fileContent.match(/<h[1-6][^>]*>/g) || [];

        // Check if we have headings to test
        if (headingTags.length > 0) {
            // Get the levels of all headings
            const headingLevels = headingTags.map(tag => getHeadingLevel(tag));

            // No heading should skip a level (e.g., h2 followed by h4)
            for (let i = 0; i < headingLevels.length - 1; i++) {
                const currentLevel = headingLevels[i];
                const nextLevel = headingLevels[i + 1];

                // Next heading should not skip a level (can be same level or one level deeper)
                expect(nextLevel - currentLevel).toBeLessThanOrEqual(1);
            }
        }
    });

    test.each(patternFiles)('%s has alt attributes for images', (file) => {
        const filePath = path.join(patternsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // Find all img tags
        const imgTags = fileContent.match(/<img[^>]*>/g) || [];

        // Each img should have an alt attribute
        imgTags.forEach(imgTag => {
            expect(imgTag).toMatch(/alt=["'][^"']*["']/);
        });
    });

    test.each(patternFiles)('%s uses ARIA attributes correctly', (file) => {
        const filePath = path.join(patternsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // Check for ARIA roles if they exist
        const ariaRoles = fileContent.match(/role=["'][^"']*["']/g) || [];

        // Validate that roles are standard ARIA roles
        const validRoles = [
            'alert', 'alertdialog', 'application', 'article', 'banner',
            'button', 'cell', 'checkbox', 'columnheader', 'combobox',
            'complementary', 'contentinfo', 'definition', 'dialog', 'directory',
            'document', 'feed', 'figure', 'form', 'grid', 'gridcell', 'group',
            'heading', 'img', 'link', 'list', 'listbox', 'listitem', 'log',
            'main', 'marquee', 'math', 'menu', 'menubar', 'menuitem',
            'menuitemcheckbox', 'menuitemradio', 'navigation', 'none',
            'note', 'option', 'presentation', 'progressbar', 'radio',
            'radiogroup', 'region', 'row', 'rowgroup', 'rowheader',
            'scrollbar', 'search', 'searchbox', 'separator', 'slider',
            'spinbutton', 'status', 'switch', 'tab', 'table', 'tablist',
            'tabpanel', 'term', 'textbox', 'timer', 'toolbar',
            'tooltip', 'tree', 'treegrid', 'treeitem'
        ];

        ariaRoles.forEach(roleAttr => {
            const role = roleAttr.match(/role=["']([^"']*)["']/)[1];
            expect(validRoles).toContain(role);
        });
    });
});
