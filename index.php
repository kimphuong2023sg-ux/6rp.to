<?php
require_once __DIR__ . '/config.php';

// Get current route
$currentRoute = getCurrentRoute();

// Route Aliases
$aliases = [
    '' => 'home',
    'index' => 'home',
    '8rp' => 'home',
    'apk' => 'apk',
    'download' => 'apk',
    'app' => 'apk',
    'news' => 'news',
    'sudut-platform' => 'news',
    'tutorials' => 'support',
    'support' => 'support',
    'bantuan' => 'support',
    'faq' => 'support',
    'disclaimer' => 'disclaimer',
    'ketentuan-penggunaan' => 'disclaimer',
    'privacy' => 'privacy',
    'kebijakan-privasi' => 'privacy',
];

// External CTA route redirects
if (LINKS_ENABLED && in_array($currentRoute, ['login', 'masuk'])) {
    header('Location: ' . LINK_LOGIN);
    exit;
}
if (LINKS_ENABLED && in_array($currentRoute, ['register', 'daftar'])) {
    header('Location: ' . LINK_REGISTER);
    exit;
}
if (LINKS_ENABLED && in_array($currentRoute, ['go', 'unduh'])) {
    header('Location: ' . LINK_APK_DOWNLOAD);
    exit;
}

if (isset($aliases[$currentRoute])) {
    $currentRoute = $aliases[$currentRoute];
}

// Registered routes
$routes = [
    'home' => [
        'title_id' => '8RP - Game Slot Bertema Permen dengan Tampilan Penuh Warna',
        'title_en' => '8RP - Candy-Themed Slot Games with Vibrant Visuals',
        'file' => __DIR__ . '/pages/home.php',
        'desc_id' => 'Platform hiburan digital resmi 8rp di Indonesia, menyediakan akses permainan populer, instalasi aplikasi Android, dan bantuan akun.',
        'desc_en' => 'Official 8RP digital entertainment platform, offering premier gaming access, official Android APK download, and 24/7 account assistance.'
    ],
    'apk' => [
        'title_id' => 'APK 8RP Versi 7.0.3 - Download 8RP APK Resmi Terbaru',
        'title_en' => '8RP APK v7.0.3 - Download Official 8RP Android APK Latest Version',
        'file' => __DIR__ . '/pages/apk.php',
        'desc_id' => 'Platform resmi 8rp menyediakan akses hiburan digital, panduan aplikasi, dan unduh APK Android versi 7.0.3 terbaru di Indonesia.',
        'desc_en' => 'Download official 8RP Android APK v7.0.3. Fast installation guide, verified package security, and smooth gameplay on mobile.'
    ],
    'news' => [
        'title_id' => 'Sudut Platform 8RP - Koleksi Provider & Info Game',
        'title_en' => '8RP Platform Corner - Top Game Providers & Platform Insights',
        'file' => __DIR__ . '/pages/news.php',
        'desc_id' => 'Platform hiburan permainan online resmi 8rp menyediakan pendaftaran akun, unduhan aplikasi Android, dan koleksi permainan slot populer di Indonesia.',
        'desc_en' => 'Discover top providers, featured games, platform updates, and mobile gaming tips on the official 8RP Platform Corner.'
    ],
    'support' => [
        'title_id' => 'Bantuan & FAQ 8RP - Pertanyaan Umum Pengguna',
        'title_en' => '8RP Support & FAQ - Frequently Asked Questions & Assistance',
        'file' => __DIR__ . '/pages/support.php',
        'desc_id' => 'Pusat bantuan resmi 8rp menghadirkan jawaban pertanyaan umum, panduan instalasi aplikasi, dan layanan bantuan akun pengguna.',
        'desc_en' => 'Get instant help and answers to frequently asked questions about official 8RP app installation, account security, and gameplay.'
    ],
    'disclaimer' => [
        'title_id' => 'Disclaimer 8RP - Ketentuan untuk Pengguna Platform',
        'title_en' => '8RP Disclaimer - Terms of Use & User Responsibilities',
        'file' => __DIR__ . '/pages/disclaimer.php',
        'desc_id' => 'Disclaimer resmi platform 8rp mengenai batasan informasi, performa sistem, dan tanggung jawab pengguna di Indonesia.',
        'desc_en' => 'Official 8RP platform disclaimer outlining informational boundaries, performance notices, and responsible entertainment practices.'
    ],
    'privacy' => [
        'title_id' => 'Kebijakan Privasi 8RP - Perlindungan Data & Keamanan Pengguna',
        'title_en' => '8RP Privacy Policy - Data Protection & User Security',
        'file' => __DIR__ . '/pages/privacy.php',
        'desc_id' => 'Kebijakan privasi resmi 8rp untuk pengguna di Indonesia, perlindungan data akun, cookie browser, dan keamanan platform.',
        'desc_en' => 'Official 8RP privacy policy explaining data handling, browser cookies, security protocols, and player privacy rights.'
    ],
];

// Check route existence
$lang = getCurrentLang();
if (isset($routes[$currentRoute])) {
    $pageInfo = $routes[$currentRoute];
    $pageFile = $pageInfo['file'];

    // Check if dedicated Indonesian content file exists when visiting /id/
    $idFile = __DIR__ . '/pages/' . $currentRoute . '-id.php';
    if ($lang === 'id' && file_exists($idFile)) {
        $pageFile = $idFile;
    }

    if (file_exists($pageFile)) {
        $pageTitle = ($lang === 'id') ? $pageInfo['title_id'] : $pageInfo['title_en'];
        $pageDesc = ($lang === 'id') ? $pageInfo['desc_id'] : $pageInfo['desc_en'];
    } else {
        http_response_code(404);
        $currentRoute = '404';
        $pageFile = __DIR__ . '/pages/404.php';
        $pageTitle = ($lang === 'id') ? 'Halaman Tidak Ditemukan - 8RP' : 'Page Not Found - 8RP';
        $pageDesc = ($lang === 'id') ? 'Maaf, halaman yang Anda cari tidak ditemukan.' : 'Sorry, the page you requested was not found.';
    }
} else {
    http_response_code(404);
    $currentRoute = '404';
    $pageFile = __DIR__ . '/pages/404.php';
    $pageTitle = ($lang === 'id') ? 'Halaman Tidak Ditemukan - 8RP' : 'Page Not Found - 8RP';
    $pageDesc = ($lang === 'id') ? 'Maaf, halaman yang Anda cari tidak ditemukan.' : 'Sorry, the page you requested was not found.';
}

// Render layout
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Include the view content
if (file_exists($pageFile)) {
    require_once $pageFile;
} else {
    echo '<main class="t35-main" style="padding: 60px 20px; text-align: center;"><h1>404 - Page Not Found</h1><p><a href="' . url('home') . '" class="t35-button blue" style="display:inline-block; margin-top:20px;">' . t('nav_home') . '</a></p></main>';
}

require_once __DIR__ . '/includes/footer.php';

