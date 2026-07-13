# Folder Structure

Version: 1.0.0

Status: Development

Owner: K86 Pro Team

---

# 1. Mục tiêu

Tài liệu này quy định cấu trúc thư mục chuẩn của K86 Pro.

Mọi thành phần phải được đặt đúng vị trí nhằm:

- Dễ bảo trì.
- Dễ mở rộng.
- Dễ tìm kiếm.
- Dễ cộng tác.
- Dễ phát hành.

---

# 2. Cấu trúc tổng thể

```
k86-pro/

├── admin/
├── assets/
├── core/
├── docs/
├── includes/
├── languages/
├── modules/
├── settings/
├── templates/
├── vendor/
├── uninstall.php
├── readme.txt
└── k86-pro.php
```

---

# 3. admin/

Chứa toàn bộ giao diện quản trị.

Ví dụ:

- Dashboard
- Products
- Affiliate
- Reports
- Analytics
- Settings

---

# 4. assets/

Chứa tài nguyên giao diện.

Bao gồm:

- css/
- js/
- images/
- icons/
- fonts/

---

# 5. core/

Đây là phần lõi của K86 Pro.

Bao gồm:

- Plugin Loader
- Installer
- Updater
- Version Manager
- Database
- Logger
- Error Handler
- Security
- Hooks

Không viết tính năng nghiệp vụ trong thư mục này.

---

# 6. includes/

Các hàm dùng chung.

Ví dụ:

- helper
- utility
- common functions
- formatter
- validator

---

# 7. modules/

Mỗi chức năng lớn là một Module độc lập.

Ví dụ:

- Product
- Affiliate
- Shopping Assistant
- AI
- Knowledge
- Analytics
- Automation
- Reviews
- Notification

Quy tắc:

Một Module không phụ thuộc trực tiếp vào Module khác.

---

# 8. templates/

Chứa giao diện Frontend.

Ví dụ:

- Product Box
- Popup
- Shortcode
- Widget
- Email Template

---

# 9. settings/

Các trang cài đặt.

Ví dụ:

- General
- Affiliate
- AI
- API
- Analytics
- Performance

---

# 10. languages/
