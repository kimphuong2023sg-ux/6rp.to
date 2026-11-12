<main class="t35-main" id="content">
    <h1>8RP Help &amp; Frequently Asked Questions</h1>
    <p>Find clear answers regarding platform access, Android APK installation, hardware compatibility, and account usage.</p>

    <section class="t35-faq" style="margin-top: 24px;">
        <section class="route-pool-content" style="max-width:100%;overflow-wrap:anywhere" data-content-category="support">
            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Why is the 8RP website or game loading slowly?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Unstable mobile network connections, outdated browser cache, or excessive active background apps may reduce responsiveness. Try closing unused background apps and refresh the page once. Switching between Wi-Fi and mobile data often resolves network routing latency.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Why can't I install the APK package on my Android phone?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Check whether your device has at least 50 MB of free storage space. Ensure that your Android version is 5.0 or newer. Additionally, open Android Settings and ensure "Install Unknown Apps" permission is allowed for your mobile browser.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Can older smartphones run 8RP smoothly?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Yes. The 8RP client is engineered with lightweight 2D sprite rendering and optimized canvas textures, ensuring playable performance even on devices with 2GB of RAM.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Why does the text appear too small or too large?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Use your browser's zoom setting or adjust font scale in system preferences. The 8RP layout utilizes fluid responsive CSS and adapts automatically without disrupting controls.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">What should I do if images do not appear?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Check your network connection and temporarily disable data saver mode if your telecom provider restricts image pre-loading. Clearing site cache and reloading will refresh all assets.</p>
            </details>

            <details open class="route-card" style="margin-bottom: 16px; padding: 18px; background: var(--th-surface); border-radius: 8px; border: 1px solid var(--th-border);">
                <summary style="font-size: 18px; font-weight: 600; cursor: pointer; color: var(--th-title);">Where can I find the downloaded APK file?</summary>
                <p style="margin-top: 12px; color: var(--th-text);">Open your browser's "Downloads" section or launch the "Files" / "File Manager" application on Android and inspect the "Download" directory. The verified package is named <code>8rp-v7.0.3.apk</code>.</p>
            </details>
        </section>
    </section>

    <!-- Support Notes Box -->
    <section class="t35-message-form" aria-labelledby="t35FeedbackTitle" style="margin: 40px 0; padding: 24px; background: var(--th-surface-2); border-radius: 8px; border: 1px solid var(--th-border);">
        <h2 id="t35FeedbackTitle" style="font-size: 20px; margin-bottom: 12px;">Personal Notes &amp; Queries</h2>
        <form id="t35Feedback">
            <label for="t35Message" style="display: block; font-weight: 600; margin-bottom: 8px;">Write Note / Reminder:</label>
            <textarea id="t35Message" name="message" required maxlength="2000" placeholder="Type your personal note or reminder here..." style="width: 100%; min-height: 100px; padding: 12px; border: 1px solid var(--th-border); border-radius: 6px; box-sizing: border-box; font-family: inherit; font-size: 15px; margin-bottom: 10px;"></textarea>
            <p class="t35-draft-note" style="color: var(--th-muted); font-size: 13.5px; margin-bottom: 12px;">Notes are stored locally in your browser (LocalStorage) and are never submitted publicly.</p>
            <button type="submit" class="t35-button blue" style="min-height: auto; padding: 10px 24px; font-size: 15px; display: inline-block;">Save Note</button>
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
        var key = 't35-notes-8rp-en', notes = [];
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
                status.textContent = 'Note saved in this browser.';
            } catch(e) {
                status.textContent = 'Local storage not accessible.';
            }
            draw();
            input.value = '';
        });
    })();
    </script>
</main>

