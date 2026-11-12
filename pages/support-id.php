<main class="t35-main" id="content">
    <h1>Pertanyaan Umum 8RP</h1>
    <p>Temukan jawaban lengkap mengenai akses, instalasi aplikasi APK, kompatibilitas perangkat, dan penggunaan platform 8RP.</p>

    <section class="t35-faq" style="margin-top: 24px;">
        <section class="route-pool-content" style="max-width:100%;overflow-wrap:anywhere" data-content-category="support">
            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Mengapa halaman 8rp terasa lambat?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Koneksi tidak stabil, cache lama, atau terlalu banyak aplikasi berjalan dapat memengaruhi respons. Coba tutup aplikasi lain dan muat ulang halaman satu kali. Jika masalah muncul setelah pembaruan, catat versi yang sedang terpasang dan periksa koneksi internet Anda.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Mengapa aplikasi tidak dapat dipasang?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Periksa ruang penyimpanan, versi Android, dan kelengkapan berkas unduhan. Hapus paket yang tidak selesai lalu unduh kembali dari tombol resmi. Pastikan opsi 'Install from Unknown Sources' telah diizinkan pada browser Anda.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Apakah perangkat lama masih dapat digunakan?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Platform 8RP mendukung Android 5.0 (Lollipop) ke atas. Pada perangkat lama, disarankan menutup aplikasi latar belakang agar alokasi RAM optimal saat bermain.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Mengapa teks terlihat terlalu kecil?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Gunakan fitur zoom browser atau pengaturan ukuran font perangkat. Tata letak web 8RP responsif dan akan otomatis menyesuaikan tanpa merusak struktur halaman.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Apa yang dilakukan jika gambar tidak muncul?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Periksa koneksi dan nonaktifkan mode hemat data sementara bila pemuatan gambar dibatasi jaringan seluler Anda, kemudian muat ulang halaman.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Bagaimana menemukan berkas APK yang sudah diunduh?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Buka menu Unduhan (Downloads) pada browser Anda atau buka folder Download di File Manager. Berkas resmi bernama <code>8rp-v7.0.3.apk</code>.</p>
            </details>
        </section>
    </section>

    <!-- Support Notes Box -->
    <section class="t35-message-form" aria-labelledby="t35FeedbackTitle" style="margin: 40px 0; padding: 24px; background: var(--th-surface-2); border-radius: 8px; border: 1px solid var(--th-border);">
        <h2 id="t35FeedbackTitle" style="font-size: 20px; margin-bottom: 12px;">Catatan Pribadi dan Pertanyaan Anda</h2>
        <form id="t35Feedback">
            <label for="t35Message" style="display: block; font-weight: 600; margin-bottom: 8px;">Tulis Catatan / Pengingat:</label>
            <textarea id="t35Message" name="message" required maxlength="2000" placeholder="Tulis pertanyaan atau catatan Anda di sini..." style="width: 100%; min-height: 100px; padding: 12px; border: 1px solid var(--th-border); border-radius: 6px; box-sizing: border-box; font-family: inherit; font-size: 15px; margin-bottom: 10px;"></textarea>
            <p class="t35-draft-note" style="color: var(--th-muted); font-size: 13.5px; margin-bottom: 12px;">Catatan hanya disimpan di browser ini secara aman (LocalStorage) dan tidak dikirim ke publik.</p>
            <button type="submit" class="t35-button blue" style="min-height: auto; padding: 10px 24px; font-size: 15px; display: inline-block;">Simpan Catatan</button>
            <p id="t35FeedbackStatus" role="status" style="margin-top: 8px; font-size: 14px; font-weight: 600; color: var(--th-accent);"></p>
        </form>
        <div class="t35-message-list" id="t35Messages" style="margin-top: 20px;"></div>
    </section>

    <script>
    (function(){
        var f = document.getElementById('t35Feedback'),
            input = document.getElementById('t35Message'),
            box = document.getElementById('t35Messages'),
            status = document.getElementById('t35FeedbackStatus');
        if (!f) return;
        var key = 't35-notes-8rp', notes = [];
        try {
            notes = JSON.parse(localStorage.getItem(key) || '[]');
            if (!Array.isArray(notes)) notes = [];
        } catch(e) {}
        function draw(){
            box.innerHTML = '';
            notes.slice(-10).reverse().forEach(function(v){
                var a = document.createElement('article');
                a.style.cssText = 'padding: 12px; background: var(--th-surface); border: 1px solid var(--th-border); border-radius: 6px; margin-bottom: 8px; font-size: 14.5px; color: var(--th-text);';
                a.textContent = typeof v === 'string' ? v : '';
                box.appendChild(a);
            });
        }
        draw();
        f.addEventListener('submit', function(e){
            e.preventDefault();
            var v = input.value.trim();
            if (!v) return;
            notes.push(v);
            notes = notes.slice(-10);
            try {
                localStorage.setItem(key, JSON.stringify(notes));
                status.textContent = 'Catatan berhasil tersimpan di browser ini.';
            } catch(e) {
                status.textContent = 'Penyimpanan lokal tidak tersedia.';
            }
            draw();
            input.value = '';
        });
    })();
    </script>
</main>
