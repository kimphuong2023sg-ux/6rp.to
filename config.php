<?php
/**
 * 8RP Official - Web Application Configuration & Helpers
 * Supports English ('en') and Indonesian ('id')
 */

// Chặn bot công cụ tìm kiếm (Google, Bing...) index toàn bộ trang
if (!headers_sent()) {
    header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet, noimageindex', true);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site settings
define('SITE_NAME', '8RP Official');
define('SITE_DOMAIN', '6rp.to');
define('SITE_THEME', 'Emerald Night');
// Đổi số này mỗi lần sửa CSS/JS/ảnh để Cloudflare + trình duyệt tải bản mới
define('ASSET_VER', '20261112c');
define('SITE_TAGLINE_ID', 'Game Slot Bertema Permen dengan Tampilan Penuh Warna');
define('SITE_TAGLINE_EN', 'Candy-Themed Slot Games with Vibrant Visuals');

// CTA Links — ĐANG TẠM TẮT (mọi nút/link chuyển đổi không dẫn đi đâu).
// Muốn bật lại: đổi LINKS_ENABLED thành true.
define('LINKS_ENABLED', false);
define('LINK_TARGET', 'https://88rp1.com/#/?ch=wq5eq&mode=1');
define('LINK_MAIN', LINKS_ENABLED ? LINK_TARGET : '#');
define('LINK_APK_DOWNLOAD', LINK_MAIN);
define('LINK_LOGIN', LINK_MAIN);
define('LINK_REGISTER', LINK_MAIN);
define('LINK_TELEGRAM', LINK_MAIN);

/**
 * Determine Base URL dynamically to support any subfolder (e.g., /8rpofficial/ or root /)
 */
function getBaseUrl() {
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['SERVER_PORT'] ?? 80) == 443)
        || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
        || (!empty($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], 'https') !== false);
    $protocol = $isHttps ? "https://" : "http://";
    $host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? ($_SERVER['HTTP_HOST'] ?? 'localhost');
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $base = rtrim($protocol . $host . $scriptDir, '/');
    return $base ?: '';
}

define('BASE_URL', getBaseUrl());

/**
 * Extract path segments from REQUEST_URI
 */
function getUriSegments() {
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    if (false !== ($pos = strpos($uri, '?'))) {
        $uri = substr($uri, 0, $pos);
    }
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    if ($scriptDir !== '/' && !empty($scriptDir) && strpos($uri, $scriptDir) === 0) {
        $uri = substr($uri, strlen($scriptDir));
    }
    $uri = trim($uri, '/');
    if ($uri === '' || $uri === 'index.php') {
        return [];
    }
    return explode('/', $uri);
}

/**
 * Determine current language: 'id' (Indonesian - default) or 'en' (English)
 * Priority: 1. URL prefix (/id/ or /en/) -> 2. Query param (?lang=) -> 3. Session -> Default 'id'
 */
function getCurrentLang() {
    $segments = getUriSegments();
    if (!empty($segments) && in_array(strtolower($segments[0]), ['id', 'en'])) {
        $lang = strtolower($segments[0]);
    } elseif (!empty($_GET['lang']) && in_array(strtolower($_GET['lang']), ['id', 'en'])) {
        $lang = strtolower($_GET['lang']);
    } elseif (!empty($_SESSION['lang']) && in_array($_SESSION['lang'], ['id', 'en'])) {
        $lang = $_SESSION['lang'];
    } else {
        $lang = 'id'; // Default Indonesian as requested from 8rpofficial.com
    }

    $_SESSION['lang'] = $lang;
    return $lang;
}

/**
 * Parse the current requested route (ignoring language prefix)
 */
function getCurrentRoute() {
    if (!empty($_GET['page'])) {
        return strtolower(trim($_GET['page']));
    }

    $segments = getUriSegments();
    if (empty($segments)) {
        return 'home';
    }

    // If first segment is language prefix ('id' or 'en')
    if (in_array(strtolower($segments[0]), ['id', 'en'])) {
        return (!empty($segments[1])) ? strtolower($segments[1]) : 'home';
    }

    return strtolower($segments[0]);
}

/**
 * Generate URL for a page with language prefix
 */
function url($route = '', $lang = null) {
    if ($lang === null) {
        $lang = getCurrentLang();
    }
    $cleanRoute = ltrim($route, '/');
    if (empty($cleanRoute) || $cleanRoute === 'home') {
        return BASE_URL . '/' . $lang;
    }
    return BASE_URL . '/' . $lang . '/' . $cleanRoute;
}

/**
 * Switch language URL
 */
function getSwitchLangUrl($targetLang = null) {
    $currentLang = getCurrentLang();
    if ($targetLang === null) {
        $targetLang = ($currentLang === 'id') ? 'en' : 'id';
    }
    $currentRoute = getCurrentRoute();
    return url($currentRoute, $targetLang);
}

// Global dictionary for translations
$GLOBALS['trans'] = [
    'id' => [
        'lang_code' => 'id',
        'lang_name' => 'Bahasa Indonesia',
        'switch_label' => 'English',
        'switch_lang' => 'en',
        'site_title' => '8RP - Game Slot Bertema Permen dengan Tampilan Penuh Warna',
        'site_desc' => 'Platform hiburan digital resmi 8rp di Indonesia, menyediakan akses permainan populer, instalasi aplikasi Android, dan bantuan akun.',
        
        // Navigation
        'nav_home' => '8rp Resmi',
        'nav_apk' => '8rp APK',
        'nav_games' => 'Game Slot Permen',
        'nav_news' => 'Sudut Platform 8rp',
        'nav_disclaimer' => 'Disclaimer 8rp',
        'nav_support' => 'Bantuan & FAQ',
        'nav_privacy' => 'Kebijakan Privasi',
        'nav_tutorials' => 'Panduan Awal',
        'skip_to_content' => 'Lewati ke konten',

        // Auth
        'btn_login' => 'Masuk',
        'btn_register' => 'Daftar',
        'btn_download_apk' => 'Download APK 8rp Resmi',
        'btn_login_official' => 'Login 8rp Resmi',
        'btn_alt_link' => 'Link Alternatif 8rp Resmi',

        // Hero
        'hero_h1' => '8RP - Game Slot Bertema Permen dengan Tampilan Penuh Warna',
        'hero_badge' => 'Platform Resmi v7.0.3 Terverifikasi',

        // Footer
        'footer_about' => 'Platform hiburan digital resmi 8rp di Indonesia, menyediakan akses permainan bertema permen penuh warna, instalasi aplikasi Android aman, dan layanan pelanggan 24 jam.',
        'footer_quick_links' => 'Akses Cepat',
        'footer_legal' => 'Informasi & Legalitas',
        'footer_support_title' => 'Pusat Bantuan',
        'footer_account_login' => 'Masuk ke akun',
        'footer_download_page' => 'Halaman unduhan 8rp',
        'footer_guide_start' => 'Panduan awal',
        'footer_faq' => 'Pertanyaan umum',
        'footer_privacy_policy' => 'Kebijakan Privasi 8rp',
        'footer_contact_us' => 'Hubungi Kami',
        'footer_copyright' => '© ' . date('Y') . ' 8RP Official. Hak cipta dilindungi undang-undang.',
        'footer_note' => 'Platform ini ditujukan untuk hiburan dewasa (18+). Harap bermain secara bertanggung jawab.',
        'modal_title' => 'Akses Resmi 8RP',
        'modal_desc' => 'Pilih tindakan untuk melanjutkan ke platform resmi 8RP:'
    ],
    'en' => [
        'lang_code' => 'en',
        'lang_name' => 'English',
        'switch_label' => 'Bahasa Indonesia',
        'switch_lang' => 'id',
        'site_title' => '8RP - Candy-Themed Slot Games with Vibrant Visuals',
        'site_desc' => 'Official 8RP digital entertainment platform, offering premier gaming access, official Android APK download, and 24/7 account assistance.',
        
        // Navigation
        'nav_home' => '8rp Official',
        'nav_apk' => '8rp APK',
        'nav_games' => 'Candy Slots',
        'nav_news' => '8rp Platform Corner',
        'nav_disclaimer' => '8rp Disclaimer',
        'nav_support' => 'Help & FAQ',
        'nav_privacy' => 'Privacy Policy',
        'nav_tutorials' => 'Beginner Guide',
        'skip_to_content' => 'Skip to content',

        // Auth
        'btn_login' => 'Login',
        'btn_register' => 'Register',
        'btn_download_apk' => 'Download Official 8RP APK',
        'btn_login_official' => 'Official 8RP Login',
        'btn_alt_link' => 'Official 8RP Alternative Link',

        // Hero
        'hero_h1' => '8RP - Candy-Themed Slot Games with Vibrant Visuals',
        'hero_badge' => 'Official Platform v7.0.3 Verified',

        // Footer
        'footer_about' => 'Official 8RP digital entertainment platform, providing vibrant candy-themed slot gaming experiences, secure Android application downloads, and dedicated 24/7 customer support.',
        'footer_quick_links' => 'Quick Access',
        'footer_legal' => 'Legal & Information',
        'footer_support_title' => 'Help Center',
        'footer_account_login' => 'Account Login',
        'footer_download_page' => '8RP Download Page',
        'footer_guide_start' => 'Getting Started Guide',
        'footer_faq' => 'Frequently Asked Questions',
        'footer_privacy_policy' => '8RP Privacy Policy',
        'footer_contact_us' => 'Contact Us',
        'footer_copyright' => '© ' . date('Y') . ' 8RP Official. All rights reserved.',
        'footer_note' => 'This platform is intended for adult entertainment (18+). Please play responsibly.',
        'modal_title' => 'Official 8RP Access',
        'modal_desc' => 'Choose an action to proceed to the official 8RP platform:'
    ]
];

function t($key) {
    $lang = getCurrentLang();
    return $GLOBALS['trans'][$lang][$key] ?? ($GLOBALS['trans']['id'][$key] ?? $key);
}

