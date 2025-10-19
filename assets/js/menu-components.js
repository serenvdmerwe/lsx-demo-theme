/**
 * Menu Component JavaScript
 * Handles mobile menu toggles, dropdowns, and accessibility
 */

(function() {
    'use strict';

    // Mobile Menu Toggle
    function initMobileMenu() {
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const mobileMenu = document.querySelector('.mobile-navigation-wrapper');

        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', function(e) {
                e.preventDefault();

                const isExpanded = mobileToggle.getAttribute('aria-expanded') === 'true';

                // Toggle aria-expanded
                mobileToggle.setAttribute('aria-expanded', !isExpanded);

                // Toggle menu visibility
                if (isExpanded) {
                    mobileMenu.classList.remove('is-open');
                } else {
                    mobileMenu.classList.add('is-open');
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!mobileToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileToggle.setAttribute('aria-expanded', 'false');
                    mobileMenu.classList.remove('is-open');
                }
            });

            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
                    mobileToggle.setAttribute('aria-expanded', 'false');
                    mobileMenu.classList.remove('is-open');
                    mobileToggle.focus();
                }
            });
        }
    }

    // Dropdown Menu Accessibility
    function initDropdownMenus() {
        const menuItems = document.querySelectorAll('.nav-menu .has-dropdown');

        menuItems.forEach(function(menuItem) {
            const link = menuItem.querySelector('a');
            const submenu = menuItem.querySelector('.sub-menu');

            if (link && submenu) {
                // Add keyboard navigation
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        toggleSubmenu(menuItem);
                    } else if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        openSubmenu(menuItem);
                        focusFirstSubmenuItem(submenu);
                    }
                });

                // Handle mouse interactions
                menuItem.addEventListener('mouseenter', function() {
                    openSubmenu(menuItem);
                });

                menuItem.addEventListener('mouseleave', function() {
                    closeSubmenu(menuItem);
                });

                // Handle focus within submenu
                submenu.addEventListener('keydown', function(e) {
                    const submenuItems = submenu.querySelectorAll('a');
                    const currentIndex = Array.from(submenuItems).indexOf(document.activeElement);

                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        const nextIndex = (currentIndex + 1) % submenuItems.length;
                        submenuItems[nextIndex].focus();
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        const prevIndex = currentIndex === 0 ? submenuItems.length - 1 : currentIndex - 1;
                        submenuItems[prevIndex].focus();
                    } else if (e.key === 'Escape') {
                        e.preventDefault();
                        closeSubmenu(menuItem);
                        link.focus();
                    }
                });
            }
        });
    }

    function toggleSubmenu(menuItem) {
        const submenu = menuItem.querySelector('.sub-menu');
        const isOpen = submenu.style.display === 'flex';

        if (isOpen) {
            closeSubmenu(menuItem);
        } else {
            openSubmenu(menuItem);
        }
    }

    function openSubmenu(menuItem) {
        const submenu = menuItem.querySelector('.sub-menu');
        if (submenu) {
            submenu.style.display = 'flex';
            submenu.setAttribute('aria-hidden', 'false');
        }
    }

    function closeSubmenu(menuItem) {
        const submenu = menuItem.querySelector('.sub-menu');
        if (submenu) {
            submenu.style.display = 'none';
            submenu.setAttribute('aria-hidden', 'true');
        }
    }

    function focusFirstSubmenuItem(submenu) {
        const firstItem = submenu.querySelector('a');
        if (firstItem) {
            firstItem.focus();
        }
    }

    // Smooth scroll for anchor links
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');

        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement && targetId !== '#') {
                    e.preventDefault();

                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Update URL without jumping
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    }
                }
            });
        });
    }

    // Menu active state management
    function initActiveStates() {
        const currentUrl = window.location.pathname;
        const menuLinks = document.querySelectorAll('.nav-menu a, .simple-menu a');

        menuLinks.forEach(function(link) {
            const linkUrl = new URL(link.href, window.location.origin).pathname;

            if (linkUrl === currentUrl) {
                link.closest('li')?.classList.add('current-menu-item');
                link.classList.add('current');
            }
        });
    }

    // Responsive menu handling
    function handleResponsiveMenus() {
        function checkScreenSize() {
            const isMobile = window.innerWidth <= 768;
            const primaryNav = document.querySelector('.primary-navigation .nav-menu');
            const mobileToggle = document.querySelector('.mobile-menu-toggle');

            if (primaryNav && mobileToggle) {
                if (isMobile) {
                    primaryNav.style.display = 'none';
                    mobileToggle.style.display = 'flex';
                } else {
                    primaryNav.style.display = 'flex';
                    mobileToggle.style.display = 'none';

                    // Close mobile menu if open
                    const mobileMenu = document.querySelector('.mobile-navigation-wrapper');
                    if (mobileMenu) {
                        mobileMenu.classList.remove('is-open');
                        mobileToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            }
        }

        // Check on load and resize
        checkScreenSize();
        window.addEventListener('resize', checkScreenSize);
    }

    // Search functionality (if search is in menu)
    function initMenuSearch() {
        const searchToggle = document.querySelector('.menu-search-toggle');
        const searchForm = document.querySelector('.menu-search-form');

        if (searchToggle && searchForm) {
            searchToggle.addEventListener('click', function(e) {
                e.preventDefault();
                searchForm.classList.toggle('is-open');

                if (searchForm.classList.contains('is-open')) {
                    const searchInput = searchForm.querySelector('input[type="search"]');
                    if (searchInput) {
                        searchInput.focus();
                    }
                }
            });

            // Close search on escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && searchForm.classList.contains('is-open')) {
                    searchForm.classList.remove('is-open');
                    searchToggle.focus();
                }
            });
        }
    }

    // Initialize everything when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initDropdownMenus();
        initSmoothScroll();
        initActiveStates();
        handleResponsiveMenus();
        initMenuSearch();
    });

    // Utility function for WordPress customizer live preview
    if (typeof wp !== 'undefined' && wp.customize) {
        wp.customize.bind('ready', function() {
            // Re-initialize menu functionality when customizer changes
            wp.customize('nav_menu_locations[primary]', function(value) {
                value.bind(function() {
                    setTimeout(function() {
                        initDropdownMenus();
                        initActiveStates();
                    }, 100);
                });
            });
        });
    }

})();