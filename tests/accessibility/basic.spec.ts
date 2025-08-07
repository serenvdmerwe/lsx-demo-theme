import { test, expect } from '@playwright/test';

/**
 * Basic accessibility tests for the LSX Demo Theme.
 * These tests check for common accessibility issues on key pages.
 */

test.describe('Accessibility Tests', () => {
  test('Homepage has no accessibility violations', async ({ page }) => {
    await page.goto('/');

    // Check for proper heading structure
    const h1Count = await page.locator('h1').count();
    expect(h1Count).toBe(1);

    // Check for alt text on images
    const imagesWithoutAlt = await page.locator('img:not([alt])').count();
    expect(imagesWithoutAlt).toBe(0);

    // Check for proper ARIA landmarks
    expect(await page.locator('header').count()).toBeGreaterThan(0);
    expect(await page.locator('main').count()).toBe(1);
    expect(await page.locator('footer').count()).toBeGreaterThan(0);

    // Run automated accessibility tests
    await expect(page).toHaveNoViolations();
  });

  test('Blog page has proper semantic structure', async ({ page }) => {
    await page.goto('/blog');

    // Check for article elements for blog posts
    expect(await page.locator('article').count()).toBeGreaterThan(0);

    // Check for proper heading hierarchy
    const headings = await page.evaluate(() => {
      const headingElements = Array.from(document.querySelectorAll('h1, h2, h3, h4, h5, h6'));
      return headingElements.map(h => ({
        level: parseInt(h.tagName.substring(1)),
        text: h.textContent.trim()
      }));
    });

    // Verify heading structure doesn't skip levels
    let prevLevel = 0;
    for (const heading of headings) {
      expect(heading.level).toBeLessThanOrEqual(prevLevel + 1);
      prevLevel = heading.level;
    }

    await expect(page).toHaveNoViolations();
  });

  test('Navigation is keyboard accessible', async ({ page }) => {
    await page.goto('/');

    // Tab to first navigation link
    await page.keyboard.press('Tab');
    await page.keyboard.press('Tab');

    // Check if a navigation link is focused
    const focusedElement = await page.evaluate(() => {
      const el = document.activeElement;
      return el ? {
        tagName: el.tagName,
        text: el.textContent,
        role: el.getAttribute('role')
      } : null;
    });

    expect(focusedElement.tagName).toBe('A');

    // Ensure we can navigate to the link with Enter
    await page.keyboard.press('Enter');
    await page.waitForNavigation();

    // Verify navigation worked
    expect(page.url()).not.toBe('/');
  });
});
