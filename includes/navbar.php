<?php
$currentLang = getCurrentLang();
$currentRoute = getCurrentRoute();
?>
<!-- Top Navigation Header -->
<header class="t35-header">
    <div class="t35-bar">
        <!-- Brand Logo -->
        <a href="<?= url('home') ?>" class="t35-brand" data-domain-site-logo="1" aria-label="8RP Official">
            <img class="domain-site-logo-image" src="<?= BASE_URL ?>/assets/img/mainlogo.png" alt="8RP Official Logo" width="180" height="45">
        </a>

        <!-- Desktop Navigation Links (Exact 4 items from 8rpofficial.com) -->
        <nav class="t35-nav" id="t35Nav" aria-label="Main Navigation">
            <a href="<?= url('home') ?>" <?= ($currentRoute === 'home') ? 'aria-current="page"' : '' ?>><?= t('nav_home') ?></a>
            <a href="<?= url('apk') ?>" <?= ($currentRoute === 'apk') ? 'aria-current="page"' : '' ?>><?= t('nav_apk') ?></a>
            <a href="<?= url('news') ?>" <?= ($currentRoute === 'news') ? 'aria-current="page"' : '' ?>><?= t('nav_news') ?></a>
            <a href="<?= url('disclaimer') ?>" <?= ($currentRoute === 'disclaimer') ? 'aria-current="page"' : '' ?>><?= t('nav_disclaimer') ?></a>
        </nav>

        <!-- Right Side Controls: Language Switcher & Auth Buttons -->
        <div class="t35-header-right">
            <!-- Language Switcher Toggle (ID <-> EN) -->
            <div class="t35-lang-toggle" title="Switch Language">
                <a href="<?= url($currentRoute, 'id') ?>" class="t35-lang-opt <?= ($currentLang === 'id') ? 'is-active' : '' ?>">
                    <span class="flag">🇮🇩</span> ID
                </a>
                <span class="t35-lang-divider">|</span>
                <a href="<?= url($currentRoute, 'en') ?>" class="t35-lang-opt <?= ($currentLang === 'en') ? 'is-active' : '' ?>">
                    <span class="flag">🇬🇧</span> EN
                </a>
            </div>

            <!-- Auth Buttons (Login & Register) -->
            <div class="t35-auth-group">
                <a href="<?= LINK_LOGIN ?>" target="_blank" rel="noopener noreferrer" class="t35-btn-login"><?= t('btn_login') ?></a>
                <a href="<?= LINK_REGISTER ?>" target="_blank" rel="noopener noreferrer" class="t35-btn-register"><?= t('btn_register') ?></a>
            </div>
        </div>

        <!-- Mobile Menu Hamburger Button -->
        <button type="button" class="t35-menu-btn" id="menuBtn" aria-label="Open navigation menu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="t35-drawer-overlay" id="drawerOverlay"></div>
<aside class="t35-mobile-drawer" id="mobileDrawer">
    <button type="button" class="t35-drawer-close" id="drawerClose" aria-label="Close menu">&times;</button>
    
    <div style="margin-bottom: 20px;">
        <a href="<?= url('home') ?>">
            <img src="<?= BASE_URL ?>/assets/img/mainlogo.png" alt="8RP" style="height: 38px; width: auto;">
        </a>
    </div>

    <!-- Mobile Language Switch Toggle -->
    <div class="t35-mobile-lang-box">
        <span style="font-size: 13px; color: var(--th-muted); font-weight: 600; text-transform: uppercase;">Bahasa / Language:</span>
        <div class="t35-lang-toggle" style="margin-top: 8px;">
            <a href="<?= url($currentRoute, 'id') ?>" class="t35-lang-opt <?= ($currentLang === 'id') ? 'is-active' : '' ?>">
                <span class="flag">🇮🇩</span> Indonesia (ID)
            </a>
            <span class="t35-lang-divider">|</span>
            <a href="<?= url($currentRoute, 'en') ?>" class="t35-lang-opt <?= ($currentLang === 'en') ? 'is-active' : '' ?>">
                <span class="flag">🇬🇧</span> English (EN)
            </a>
        </div>
    </div>

    <nav class="t35-drawer-nav">
        <a href="<?= url('home') ?>" class="<?= ($currentRoute === 'home') ? 'active' : '' ?>"><?= t('nav_home') ?></a>
        <a href="<?= url('apk') ?>" class="<?= ($currentRoute === 'apk') ? 'active' : '' ?>"><?= t('nav_apk') ?></a>
        <a href="<?= url('news') ?>" class="<?= ($currentRoute === 'news') ? 'active' : '' ?>"><?= t('nav_news') ?></a>
        <a href="<?= url('disclaimer') ?>" class="<?= ($currentRoute === 'disclaimer') ? 'active' : '' ?>"><?= t('nav_disclaimer') ?></a>
        <a href="<?= url('support') ?>" class="<?= ($currentRoute === 'support') ? 'active' : '' ?>"><?= t('nav_support') ?></a>
        <a href="<?= url('privacy') ?>" class="<?= ($currentRoute === 'privacy') ? 'active' : '' ?>"><?= t('nav_privacy') ?></a>
    </nav>

    <div class="t35-drawer-auth">
        <a href="<?= LINK_LOGIN ?>" target="_blank" rel="noopener noreferrer" style="background: #ce292d;"><?= t('btn_login') ?></a>
        <a href="<?= LINK_REGISTER ?>" target="_blank" rel="noopener noreferrer" style="background: #00cc8d;"><?= t('btn_register') ?></a>
        <a href="<?= LINK_APK_DOWNLOAD ?>" target="_blank" rel="noopener noreferrer" style="background: #3b94eb;"><?= t('btn_download_apk') ?></a>
    </div>
</aside>
