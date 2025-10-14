import { test, expect } from '@playwright/test';

/**
 * Basic accessibility & structure smoke tests for the lsx-demo-theme front end.
 *
 * Assumptions:
 *  - Site is running locally at http://localhost:8889/ (adjust BASE_URL via env var SITE_UNDER_TEST if different)
 *
 * These tests intentionally use user-facing, accessible locators per project guidelines.
 */

const BASE_URL = process.env.SITE_UNDER_TEST || 'http://localhost:8889/';

test.describe('Theme structure', () => {
    test('homepage has header nav, main landmark, and footer', async ({
        page,
    }) => {
        await page.goto(BASE_URL);

        // Header landmark / navigation presence.
        const header = page.getByRole('banner');
        await expect(header).toBeVisible();

        // Primary navigation list (nav within header) - allow either navigation landmark or list of links.
        const nav = page.getByRole('navigation');
        await expect(nav).toBeVisible();

        // Main landmark.
        await expect(page.getByRole('main')).toBeVisible();

        // Footer landmark.
        await expect(page.getByRole('contentinfo')).toBeVisible();
    });
});
