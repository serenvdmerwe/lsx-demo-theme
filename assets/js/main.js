/**
 * LSX Demo Theme JavaScript
 *
 * Main JavaScript file for the LSX Demo Theme.
 */

/**
 * Initialize mobile menu functionality.
 *
 * @return {void}
 */
function initMobileMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');

    if (!menuToggle || !mobileMenu) {
        return;
    }

    menuToggle.setAttribute('aria-expanded', 'false');

    menuToggle.addEventListener('click', () => {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.classList.toggle('is-open');

        if (!isExpanded) {
            // Trap focus within the menu when open
            trapFocus(mobileMenu);
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', (event) => {
        if (
            event.key === 'Escape' &&
            mobileMenu.classList.contains('is-open')
        ) {
            menuToggle.setAttribute('aria-expanded', 'false');
            mobileMenu.classList.remove('is-open');
            menuToggle.focus();
        }
    });
}

/**
 * Trap focus within a specified element.
 *
 * @param {HTMLElement} element - The element to trap focus within.
 * @return {void}
 */
function trapFocus(element) {
    const focusableElements = element.querySelectorAll(
        'a[href], button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled])'
    );

    if (focusableElements.length === 0) {
        return;
    }

    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    firstElement.focus();

    element.addEventListener('keydown', (event) => {
        if (event.key === 'Tab') {
            if (event.shiftKey && document.activeElement === firstElement) {
                event.preventDefault();
                lastElement.focus();
            } else if (
                !event.shiftKey &&
                document.activeElement === lastElement
            ) {
                event.preventDefault();
                firstElement.focus();
            }
        }
    });
}

/**
 * Initialize smooth scrolling for anchor links.
 *
 * @return {void}
 */
function initSmoothScroll() {
    document
        .querySelectorAll('a[href^="#"]:not([href="#"])')
        .forEach((anchor) => {
            anchor.addEventListener('click', function (event) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    event.preventDefault();

                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                    });

                    // Update URL but don't add to history
                    window.history.replaceState(null, null, targetId);

                    // Set focus to the target for accessibility
                    targetElement.setAttribute('tabindex', '-1');
                    targetElement.focus();
                }
            });
        });
}

/**
 * Initialize all scripts when DOM is ready.
 */
document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initSmoothScroll();
    initPanelsAndNotice();
});

// Export for testing purposes
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initMobileMenu,
        trapFocus,
        initSmoothScroll,
        initPanelsAndNotice,
    };
}

/**
 * Panel toggles (mobile nav & search) + site notice dismissal.
 * Mirrors provided snippet, adapted to existing code style.
 */
function initPanelsAndNotice() {
    const body = document.documentElement;

    function togglePanel(triggerSel, panelSel) {
        const trigger = document.querySelector(triggerSel);
        const panel = document.querySelector(panelSel);
        if (!trigger || !panel) return;

        trigger.setAttribute('aria-expanded', 'false');
        if (panel.hasAttribute('hidden') === false) {
            panel.setAttribute('hidden', '');
        }

        trigger.addEventListener('click', () => {
            const expanded = trigger.getAttribute('aria-expanded') === 'true';
            trigger.setAttribute('aria-expanded', String(!expanded));
            if (expanded) {
                panel.setAttribute('hidden', '');
                body.classList.remove('lbh-offcanvas-open');
                trigger.focus();
            } else {
                panel.removeAttribute('hidden');
                body.classList.add('lbh-offcanvas-open');
                const closeBtn = panel.querySelector('[data-close]');
                if (closeBtn) {
                    closeBtn.focus();
                }
            }
        });

        panel.querySelectorAll('[data-close]').forEach((btn) => {
            btn.addEventListener('click', () => trigger.click());
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !panel.hasAttribute('hidden')) {
                trigger.click();
            }
        });
    }

    togglePanel('[data-toggle="mobile-nav"]', '#lbh-mobile-nav');
    togglePanel('[data-toggle="search-panel"]', '#lbh-search-panel');

    // Site notice dismiss (persists in localStorage)
    const notice = document.querySelector('.lbh-site-notice');
    if (notice) {
        const key = 'lbhNoticeDismissed';
        if (localStorage.getItem(key) === '1') {
            notice.remove();
        } else {
            const dismissBtn = notice.querySelector('[data-dismiss]');
            if (dismissBtn) {
                dismissBtn.addEventListener('click', () => {
                    localStorage.setItem(key, '1');
                    notice.remove();
                });
            }
        }
    }
}
