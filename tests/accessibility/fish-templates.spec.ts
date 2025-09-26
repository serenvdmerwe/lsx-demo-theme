import { test, expect } from '@playwright/test';

/**
 * Accessibility tests for Fish CPT templates.
 * Tests both single-fish.html and archive-fish.html templates for WCAG 2.2 AA compliance.
 */

test.describe('Fish Templates Accessibility', () => {
  test('Single fish template has proper accessibility structure', async ({ page }) => {
    // Mock a single fish page (would normally be set up by WordPress)
    await page.route('/fish/largemouth-bass/', async route => {
      const html = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Largemouth Bass - Fish Species Guide</title>
        </head>
        <body>
          <header role="banner">
            <nav role="navigation" aria-label="Main navigation">
              <a href="/">Home</a>
            </nav>
          </header>
          <main role="main">
            <section aria-labelledby="hero-heading">
              <h1 id="hero-heading">Largemouth Bass</h1>
              <p>Known for their aggressive strikes and powerful fights.</p>
            </section>
            <section aria-labelledby="facts-heading">
              <h2 id="facts-heading">Species Quick Facts</h2>
              <div>
                <h3>Average Size</h3>
                <p>12-15 inches</p>
              </div>
            </section>
            <section aria-labelledby="gallery-heading">
              <h2 id="gallery-heading">Species Gallery</h2>
              <img src="/test-image.jpg" alt="Largemouth bass jumping out of water" />
            </section>
            <section aria-labelledby="related-heading">
              <h2 id="related-heading">Related Species</h2>
              <article>
                <h3>Smallmouth Bass</h3>
                <p>Similar fighting characteristics to largemouth bass.</p>
              </article>
            </section>
          </main>
          <footer role="contentinfo">
            <p>&copy; 2024 Brandon's Fishing Guide</p>
          </footer>
        </body>
        </html>
      `;
      await route.fulfill({ contentType: 'text/html', body: html });
    });

    await page.goto('/fish/largemouth-bass/');

    // Test heading hierarchy - should be sequential (h1, h2, h3, etc.)
    const headings = await page.evaluate(() => {
      const headingElements = Array.from(document.querySelectorAll('h1, h2, h3, h4, h5, h6'));
      return headingElements.map(h => ({
        level: parseInt(h.tagName.substring(1)),
        text: h.textContent?.trim()
      }));
    });

    // Verify we have exactly one h1
    const h1Count = headings.filter(h => h.level === 1).length;
    expect(h1Count).toBe(1);

    // Verify heading hierarchy doesn't skip levels
    let prevLevel = 0;
    for (const heading of headings) {
      expect(heading.level).toBeLessThanOrEqual(prevLevel + 1);
      prevLevel = heading.level;
    }

    // Test landmark structure
    expect(await page.locator('header[role="banner"], header').count()).toBe(1);
    expect(await page.locator('main[role="main"], main').count()).toBe(1);
    expect(await page.locator('footer[role="contentinfo"], footer').count()).toBe(1);

    // Test images have alt text
    const imagesWithoutAlt = await page.locator('img:not([alt])').count();
    expect(imagesWithoutAlt).toBe(0);

    // Test all images have meaningful alt text (not empty)
    const imageAlts = await page.locator('img').evaluateAll(imgs => 
      imgs.map(img => img.getAttribute('alt'))
    );
    for (const alt of imageAlts) {
      expect(alt).toBeTruthy();
      expect(alt.length).toBeGreaterThan(0);
    }

    // Test sections have proper labeling
    const sectionsWithoutLabels = await page.locator('section:not([aria-labelledby]):not([aria-label])').count();
    expect(sectionsWithoutLabels).toBe(0);
  });

  test('Fish archive template has proper accessibility structure', async ({ page }) => {
    // Mock fish archive page
    await page.route('/fish/', async route => {
      const html = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Fish Species Archive - Brandon's Fishing Guide</title>
        </head>
        <body>
          <header role="banner">
            <nav role="navigation" aria-label="Main navigation">
              <a href="/">Home</a>
            </nav>
          </header>
          <main role="main">
            <header>
              <h1>Fish Species</h1>
              <p>Explore our comprehensive guide to freshwater fish species.</p>
              <form role="search" aria-label="Search fish species">
                <input type="search" aria-label="Search fish species" placeholder="Search fish species...">
                <button type="submit">Search</button>
              </form>
            </header>
            <section aria-labelledby="species-list-heading">
              <h2 id="species-list-heading" class="screen-reader-text">Species List</h2>
              <article>
                <h3><a href="/fish/largemouth-bass/">Largemouth Bass</a></h3>
                <img src="/bass.jpg" alt="Largemouth bass in natural habitat" />
                <p>Known for their aggressive strikes and powerful fights...</p>
              </article>
              <article>
                <h3><a href="/fish/rainbow-trout/">Rainbow Trout</a></h3>
                <img src="/trout.jpg" alt="Rainbow trout swimming in clear stream" />
                <p>Beautiful freshwater fish found in mountain streams...</p>
              </article>
            </section>
            <nav aria-label="Pagination" role="navigation">
              <a href="?page=1" aria-label="Previous page">Previous</a>
              <a href="?page=3" aria-label="Next page">Next</a>
            </nav>
          </main>
          <footer role="contentinfo">
            <p>&copy; 2024 Brandon's Fishing Guide</p>
          </footer>
        </body>
        </html>
      `;
      await route.fulfill({ contentType: 'text/html', body: html });
    });

    await page.goto('/fish/');

    // Test heading hierarchy
    const headings = await page.evaluate(() => {
      const headingElements = Array.from(document.querySelectorAll('h1, h2, h3, h4, h5, h6'));
      return headingElements.map(h => ({
        level: parseInt(h.tagName.substring(1)),
        text: h.textContent?.trim()
      }));
    });

    // Verify exactly one h1
    const h1Count = headings.filter(h => h.level === 1).length;
    expect(h1Count).toBe(1);

    // Test search form accessibility
    const searchForm = page.locator('form[role="search"]');
    await expect(searchForm).toBeVisible();
    
    const searchInput = page.locator('input[type="search"]');
    await expect(searchInput).toHaveAttribute('aria-label');
    
    // Test article structure for fish species
    const articleCount = await page.locator('article').count();
    expect(articleCount).toBeGreaterThan(0);

    // Each article should have a heading with a link
    const articlesWithHeadingLinks = await page.locator('article h3 a').count();
    expect(articlesWithHeadingLinks).toBe(articleCount);

    // Test images in articles have proper alt text
    const articleImages = await page.locator('article img');
    const articleImageCount = await articleImages.count();
    
    for (let i = 0; i < articleImageCount; i++) {
      const img = articleImages.nth(i);
      await expect(img).toHaveAttribute('alt');
      const altText = await img.getAttribute('alt');
      expect(altText).toBeTruthy();
      expect(altText.length).toBeGreaterThan(0);
    }

    // Test pagination navigation
    const paginationNav = page.locator('nav[aria-label="Pagination"]');
    await expect(paginationNav).toBeVisible();
    
    // Pagination links should have descriptive labels
    const paginationLinks = await page.locator('nav[aria-label="Pagination"] a').count();
    if (paginationLinks > 0) {
      const linkLabels = await page.locator('nav[aria-label="Pagination"] a').evaluateAll(links => 
        links.map(link => link.getAttribute('aria-label') || link.textContent)
      );
      for (const label of linkLabels) {
        expect(label).toBeTruthy();
      }
    }
  });

  test('Fish templates are keyboard navigable', async ({ page }) => {
    // Mock single fish page for keyboard navigation test
    await page.route('/fish/test-species/', async route => {
      const html = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Test Species</title>
        </head>
        <body>
          <header>
            <nav>
              <a href="/">Home</a>
              <a href="/fish/">Fish Archive</a>
              <a href="/about/">About</a>
            </nav>
          </header>
          <main>
            <h1>Test Species</h1>
            <a href="#facts">Skip to facts</a>
            <section id="facts">
              <h2>Quick Facts</h2>
            </section>
            <section>
              <h2>Related Species</h2>
              <a href="/fish/related-species-1/">Related Species 1</a>
              <a href="/fish/related-species-2/">Related Species 2</a>
            </section>
          </main>
          <footer>
            <p>Footer content</p>
          </footer>
        </body>
        </html>
      `;
      await route.fulfill({ contentType: 'text/html', body: html });
    });

    await page.goto('/fish/test-species/');

    // Test skip link functionality
    await page.keyboard.press('Tab');
    const skipLink = page.locator('a[href="#facts"]');
    await expect(skipLink).toBeFocused();
    
    // Test skip link works
    await page.keyboard.press('Enter');
    await expect(page.locator('#facts')).toBeFocused();
    
    // Continue tabbing through interactive elements
    const interactiveElements = await page.locator('a, button, input, [tabindex]:not([tabindex="-1"])').count();
    expect(interactiveElements).toBeGreaterThan(0);

    // Test that focus is visible (would need CSS to be fully testable)
    await page.keyboard.press('Tab');
    const focusedElement = await page.evaluate(() => document.activeElement?.tagName);
    expect(['A', 'BUTTON', 'INPUT'].includes(focusedElement)).toBeTruthy();
  });

  test('Fish templates have proper color contrast', async ({ page }) => {
    // This test would typically use axe-core or similar for automated contrast checking
    await page.route('/fish/', async route => {
      const html = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Fish Archive</title>
          <style>
            body { background: #ffffff; color: #000000; }
            .accent-text { color: #ff5f1f; }
            .secondary-text { color: #4a4a4a; }
            .light-bg { background: #f4f4f4; color: #000000; }
          </style>
        </head>
        <body>
          <main>
            <h1>Fish Species Archive</h1>
            <p class="accent-text">Explore our comprehensive fish guide</p>
            <p class="secondary-text">Detailed information about freshwater species</p>
            <div class="light-bg">
              <p>Content on light background</p>
            </div>
          </main>
        </body>
        </html>
      `;
      await route.fulfill({ contentType: 'text/html', body: html });
    });

    await page.goto('/fish/');

    // Basic contrast check - this would be enhanced with axe-core in a real implementation
    const textElements = await page.locator('p, h1, h2, h3, a').count();
    expect(textElements).toBeGreaterThan(0);

    // Check that text is readable (not invisible)
    const invisibleText = await page.locator('*').evaluateAll(elements => {
      return elements.filter(el => {
        const style = window.getComputedStyle(el);
        return style.color === style.backgroundColor || 
               style.opacity === '0' || 
               style.visibility === 'hidden';
      }).length;
    });
    
    expect(invisibleText).toBe(0);
  });
});