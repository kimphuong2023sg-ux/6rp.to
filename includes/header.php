<?php
$currentLang = getCurrentLang();
$currentRoute = getCurrentRoute();
?>
<!DOCTYPE html>
<html lang="<?= $currentLang === 'id' ? 'id' : 'en' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? t('site_title')) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDesc ?? t('site_desc')) ?>">
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex">
    <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex">
    <meta name="author" content="8RP Official">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= url($currentRoute) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? t('site_title')) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDesc ?? t('site_desc')) ?>">
    <meta property="og:image" content="<?= BASE_URL ?>/assets/img/hero-banner.webp">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle ?? t('site_title')) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDesc ?? t('site_desc')) ?>">
    <meta name="twitter:image" content="<?= BASE_URL ?>/assets/img/hero-banner.webp">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="<?= BASE_URL ?>/assets/img/favicon.ico">

    <!-- Canonical & Alternate Languages -->
    <link rel="canonical" href="<?= url($currentRoute) ?>">
    <link rel="alternate" hreflang="id" href="<?= url($currentRoute, 'id') ?>">
    <link rel="alternate" hreflang="en" href="<?= url($currentRoute, 'en') ?>">
    <link rel="alternate" hreflang="x-default" href="<?= url($currentRoute, 'id') ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/theme.css">
    <meta name="theme-color" content="#05110d">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "8RP Official",
      "url": "<?= BASE_URL ?>",
      "description": "<?= addslashes(t('site_desc')) ?>",
      "inLanguage": "<?= $currentLang === 'id' ? 'id-ID' : 'en-US' ?>"
    }
    </script>
</head>
<body data-sa-details data-sa-icon-palette="4" data-sa-skin="0">
    <!-- Skip to main content -->
    <a href="#content" class="t35-skip"><?= t('skip_to_content') ?></a>

