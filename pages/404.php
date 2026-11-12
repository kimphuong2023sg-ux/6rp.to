<?php
$currentLang = getCurrentLang();
$isId = ($currentLang === 'id');
?>
<main class="t35-main" id="content" style="padding: 80px 20px; text-align: center;">
    <div style="max-width: 600px; margin: 0 auto; background: var(--th-surface); padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
        <h1 style="font-size: 72px; color: var(--th-accent); margin-bottom: 10px; line-height: 1;">404</h1>
        <h2 style="font-size: 24px; color: var(--th-title); margin-bottom: 16px;">
            <?= $isId ? 'Halaman Tidak Ditemukan' : 'Page Not Found' ?>
        </h2>
        <p style="color: var(--th-muted); font-size: 16px; margin-bottom: 28px;">
            <?= $isId 
                ? 'Maaf, tautan atau halaman yang Anda cari mungkin telah dipindahkan atau tidak tersedia saat ini.' 
                : 'Sorry, the page you are looking for might have been removed, had its name changed, or is temporarily unavailable.' 
            ?>
        </p>
        <div>
            <a href="<?= url('home') ?>" class="t35-button blue" style="display: inline-block; padding: 12px 32px; font-size: 16px;">
                <?= $isId ? '&larr; Kembali ke Beranda' : '&larr; Return to Homepage' ?>
            </a>
        </div>
    </div>
</main>

