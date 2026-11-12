<?php
$currentLang = getCurrentLang();
?>
<!-- Footer Section -->
<footer class="t35-footer">
    <div class="t35-footer-main">
        <!-- Brand & Description -->
        <div class="t35-footer-col">
            <a href="<?= url('home') ?>" class="t35-brand" style="margin-bottom: 16px;">
                <img src="<?= BASE_URL ?>/assets/img/mainlogo.png" alt="8RP Official" style="width: 170px; height: auto;">
            </a>
            <p style="color: var(--th-muted); font-size: 14.5px; line-height: 1.6; margin-top: 12px;">
                <?= t('footer_about') ?>
            </p>
        </div>

        <!-- Quick Access Column -->
        <div class="t35-footer-col">
            <h4 style="font-size: 17px; margin-bottom: 16px; color: var(--th-title);"><?= t('footer_quick_links') ?></h4>
            <div class="t35-footer-nav" style="display: flex; flex-direction: column; gap: 10px;">
                <a href="<?= LINK_LOGIN ?>" target="_blank" rel="noopener noreferrer"><?= t('footer_account_login') ?></a>
                <a href="<?= url('apk') ?>"><?= t('footer_download_page') ?></a>
                <a href="<?= url('apk') ?>#guide"><?= t('footer_guide_start') ?></a>
                <a href="<?= LINK_REGISTER ?>" target="_blank" rel="noopener noreferrer"><?= t('btn_register') ?></a>
            </div>
        </div>

        <!-- Support & Legal Column -->
        <div class="t35-footer-col">
            <h4 style="font-size: 17px; margin-bottom: 16px; color: var(--th-title);"><?= t('footer_legal') ?></h4>
            <div class="t35-footer-nav" style="display: flex; flex-direction: column; gap: 10px;">
                <a href="<?= url('support') ?>"><?= t('footer_faq') ?></a>
                <a href="<?= url('privacy') ?>"><?= t('footer_privacy_policy') ?></a>
                <a href="<?= url('disclaimer') ?>"><?= t('nav_disclaimer') ?></a>
                <a href="<?= LINK_TELEGRAM ?>" target="_blank" rel="noopener noreferrer"><?= t('footer_contact_us') ?></a>
            </div>
        </div>
    </div>

    <!-- Bottom Copyright & Disclaimer Note -->
    <div class="t35-footer-note" style="border-top: 1px solid var(--th-border); padding: 24px 20px; text-align: center; color: var(--th-muted); font-size: 13.5px;">
        <p style="margin-bottom: 8px;"><?= t('footer_copyright') ?></p>
        <p style="margin: 0; font-size: 12.5px;"><?= t('footer_note') ?></p>
    </div>
</footer>

<!-- Fixed Bottom Promo Video Banner (bannerbotoompromo1, 2, 3) -->
<div class="bottom-promo-sticky" id="bottomPromoBar">
    <div class="bottom-promo-container">
        <button type="button" class="promo-close-btn" id="promoCloseBtn" aria-label="Close Banner" title="Đóng">&times;</button>
        <!-- Promo Video 1 -->
        <a href="<?= LINK_REGISTER ?>" target="_blank" rel="noopener noreferrer" class="promo-video-item" title="8RP Promo 1">
            <video autoplay loop muted playsinline preload="auto">
                <source src="<?= BASE_URL ?>/assets/img/bannerbotoompromo1.mp4" type="video/mp4">
            </video>
        </a>

        <!-- Promo Video 2 -->
        <a href="<?= LINK_APK_DOWNLOAD ?>" target="_blank" rel="noopener noreferrer" class="promo-video-item" title="8RP Promo 2">
            <video autoplay loop muted playsinline preload="auto">
                <source src="<?= BASE_URL ?>/assets/img/bannerbotoompromo2.mp4" type="video/mp4">
            </video>
        </a>

        <!-- Promo Video 3 -->
        <a href="<?= LINK_LOGIN ?>" target="_blank" rel="noopener noreferrer" class="promo-video-item" title="8RP Promo 3">
            <video autoplay loop muted playsinline preload="auto">
                <source src="<?= BASE_URL ?>/assets/img/bannerbotoompromo3.mp4" type="video/mp4">
            </video>
        </a>
    </div>
</div>

<!-- Action Modal Helper -->
<div class="t35-modal-overlay" id="actionModal">
    <div class="t35-modal">
        <button type="button" class="t35-modal-close" id="modalClose">&times;</button>
        <h3><?= t('modal_title') ?></h3>
        <p><?= t('modal_desc') ?></p>
        <div class="t35-modal-actions">
            <a href="<?= LINK_APK_DOWNLOAD ?>" target="_blank" rel="noopener noreferrer" class="t35-button blue"><?= t('btn_download_apk') ?></a>
            <a href="<?= LINK_LOGIN ?>" target="_blank" rel="noopener noreferrer" class="t35-button red"><?= t('btn_login') ?></a>
            <a href="<?= LINK_REGISTER ?>" target="_blank" rel="noopener noreferrer" class="t35-button teal"><?= t('btn_register') ?></a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="<?= BASE_URL ?>/assets/js/main.js"></script>
</body>
</html>

