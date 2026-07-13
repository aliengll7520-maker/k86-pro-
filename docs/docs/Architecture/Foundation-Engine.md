# Foundation Engine

## 1. Giới thiệu

Foundation Engine là nền tảng cốt lõi của K86 Pro.

Đây là Engine đầu tiên được xây dựng và là nền móng cho toàn bộ hệ thống.

Mọi Engine khác đều hoạt động dựa trên Foundation Engine.

---

# 2. Mục tiêu

- Xây dựng nền tảng ổn định.
- Quản lý toàn bộ Core.
- Quản lý Database.
- Quản lý Version.
- Quản lý Security.
- Quản lý Assets.
- Quản lý Hook.
- Quản lý Lifecycle của Plugin.

---

# 3. Vai trò

Foundation Engine chịu trách nhiệm:

- Khởi động Plugin.
- Nạp Module.
- Kiểm tra phiên bản.
- Khởi tạo Database.
- Quản lý Update.
- Quản lý Activation.
- Quản lý Deactivation.
- Quản lý cấu hình chung.

---

# 4. Thành phần

Foundation Engine gồm các Module sau:

- Core
- Version Manager
- Install Manager
- Upgrade Manager
- Database Manager
- Security Manager
- Assets Manager
- Hook Manager

---

# 5. Cấu trúc thư mục

core/

- version.php
- install.php
- upgrade.php

includes/

- functions.php

assets/

- css
- js
- images

---

# 6. Trách nhiệm

Foundation Engine KHÔNG xử lý:

- Sản phẩm
- Affiliate
- AI
- Shopping Assistant
- Knowledge

Foundation Engine chỉ cung cấp nền tảng.

---

# 7. Database

Foundation Engine quản lý:

- Tạo Database
- Nâng cấp Database
- Database Version
- Kiểm tra tương thích

---

# 8. Version

Phiên bản Plugin

Ví dụ:

K86 Pro

v1.5.0

Database

v1.0.0

---

# 9. Security

Bao gồm:

- Nonce
- Capability
- Data Validation
- Data Sanitization
- Escape Output
- SQL Prepare

---

# 10. Coding Rules

- Tuân thủ WordPress Coding Standards.
- Không viết trực tiếp SQL nếu không cần.
- Luôn dùng prepare().
- Luôn escape dữ liệu.
- Luôn sanitize dữ liệu.

---

# 11. Roadmap

RC1

- Core
- Database
- Version
- Install
- Upgrade

RC2

- Security
- Logger
- Error Handler

Stable

- Hoàn thiện Foundation Engine.

---

# 12. Trạng thái

Version:

1.5.x

Status:

Development

---

# 13. QA Checklist

- Plugin Activate

- Plugin Deactivate

- Database Create

- Database Upgrade

- Assets Load

- Hook Load

- Security

---

# 14. Ghi chú

Foundation Engine là nền móng của toàn bộ K86 Pro.

Mọi Engine khác phải tuân thủ kiến trúc do Foundation Engine quy định.
