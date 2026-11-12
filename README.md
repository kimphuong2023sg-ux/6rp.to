# 6rp.to — 8RP Official (theme: Emerald Night, dark)

Website chính thức của **8RP** được phát triển trên kiến trúc PHP thuần tối ưu hóa SEO, đa ngôn ngữ (**Tiếng Indonesia `id` & Tiếng Anh `en`**), giao diện chuẩn theo phong cách thiết kế hiện đại của [https://8rpofficial.com/](https://8rpofficial.com/).

---

## 🌟 Tính Năng Nổi Bật

1. **Giao Diện Chuẩn 8RP Official (Template 35)**:
   - Header dạng thanh điều hướng cố định với logo chính thức và nút Đăng Nhập / Đăng Ký.
   - Nút chuyển đổi ngôn ngữ thông minh: **🇮🇩 Bahasa Indonesia** và **🇬🇧 English**.
   - Hero banner chủ đề Candy Slot sắc nét, hỗ trợ WebP nén nhẹ tải trang tức thì.
   - Bảng thông số kỹ thuật (Platform Specifications & APK Details).
   - Danh sách bài viết tin tức / Provider Corner với đầy đủ hình ảnh tự host.
   - Accordion FAQ tương tác mở / đóng mượt mà.
   - Hộp ghi chú / câu hỏi cá nhân lưu an toàn qua Browser LocalStorage.
   - Drawer Navigation trên thiết bị di động (hỗ trợ thao tác vuốt / đóng mở bằng nút hamburger).

2. **Hỗ Trợ Song Ngữ (English & Indonesian)**:
   - Ngôn ngữ mặc định: Tiếng Indonesia (`id`), tương thích hoàn toàn với bản gốc.
   - Ngôn ngữ thứ hai: Tiếng Anh (`en`), chuẩn xác và chuyên nghiệp.
   - Hệ thống routing ngôn ngữ qua URL: `/id`, `/en`, `/id/apk`, `/en/apk`, `/id/news`, `/en/news`,...
   - Tự động nhận diện qua cookie, session, hoặc query parameter `?lang=id` / `?lang=en`.
   - Đầy đủ thẻ SEO `<link rel="alternate" hreflang="id" ...>` và `hreflang="en"`.

3. **Cấu Trúc Thư Mục**:
   ```
   8rpofficial/
   ├── assets/
   │   ├── css/
   │   │   └── style.css          # CSS gốc chuẩn de-obfuscated + bổ sung giao diện mobile & language switch
   │   ├── js/
   │   │   └── main.js            # Điều khiển Mobile Drawer, FAQ Accordion, Modal
   │   └── img/
   │       ├── mainlogo.png       # Logo 8RP Official
   │       ├── hero-banner.webp   # Banner kẹo ngọt Candy Slot
   │       ├── favicon.ico
   │       └── *.webp             # Toàn bộ hình ảnh thẻ bài viết đã được tải về lưu trữ nội bộ
   ├── includes/
   │   ├── header.php             # Thẻ <head>, SEO Meta, OpenGraph, JSON-LD Schema
   │   ├── navbar.php             # Thanh điều hướng top, switcher ngôn ngữ, drawer mobile
   │   └── footer.php             # Footer đa cột, ghi chú bản quyền, modal CTA
   ├── pages/
   │   ├── home-id.php            # Trang chủ tiếng Indonesia
   │   ├── home.php               # Trang chủ tiếng Anh
   │   ├── apk-id.php             # Tải APK & hướng dẫn tiếng Indonesia
   │   ├── apk.php                # Tải APK & hướng dẫn tiếng Anh
   │   ├── news-id.php            # Góc nền tảng tiếng Indonesia
   │   ├── news.php               # Góc nền tảng tiếng Anh
   │   ├── support-id.php         # Bantuan & FAQ tiếng Indonesia
   │   ├── support.php            # Bantuan & FAQ tiếng Anh
   │   ├── disclaimer-id.php      # Disclaimer tiếng Indonesia
   │   ├── disclaimer.php         # Disclaimer tiếng Anh
   │   ├── privacy-id.php         # Kebijakan Privasi tiếng Indonesia
   │   ├── privacy.php            # Kebijakan Privasi tiếng Anh
   │   └── 404.php                # Trang báo lỗi 404
   ├── config.php                 # Cấu hình BASE_URL, bộ từ điển đa ngôn ngữ, helper url()
   ├── index.php                  # Bộ định tuyến trung tâm và nạp layout
   ├── router.php                 # Router cho PHP Built-in Server
   ├── .htaccess                  # Apache RewriteRule cho clean URL
   └── robots.txt
   ```

---

## 🚀 Hướng Dẫn Chạy Thử Nghiệm

### 1. Dùng PHP Built-in Server
Chạy lệnh sau tại thư mục dự án:
```powershell
php -S localhost:8000 router.php
```
Truy cập trên trình duyệt:
- [http://localhost:8000/id](http://localhost:8000/id) (Tiếng Indonesia)
- [http://localhost:8000/en](http://localhost:8000/en) (Tiếng Anh)

### 2. Dùng Apache / Laragon / XAMPP
Chỉ cần đưa thư mục vào `htdocs` hoặc `www` của web server. Hệ thống tự nhận diện thư mục con hoặc domain gốc qua `getBaseUrl()`.

