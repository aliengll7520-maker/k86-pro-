# K86 Pro Dependency Map

Phiên bản: v1.6.0

Mục đích:
- Theo dõi quan hệ giữa các Engine
- Theo dõi phụ thuộc giữa các Module
- Phát hiện lỗi trước khi sửa mã
# K86 Pro Dependency Map

## Mục đích

Tài liệu này dùng để:

- Theo dõi quan hệ phụ thuộc giữa các Engine.
- Theo dõi quan hệ giữa các Module.
- Phát hiện lỗi logic trước khi sửa mã.
- Tránh xóa nhầm file gây lỗi kích hoạt.

---

# Engine List

| Engine | Trạng thái |
|---------|------------|
| Core Engine | 🟢 |
| Database Engine | 🟢 |
| Admin Engine | 🟢 |
| Settings Engine | 🟢 |
| Dashboard Engine | 🟢 |
| Product Engine | 🟢 |
| Affiliate Engine | 🟢 |
| Shortcode Engine | 🟢 |
| REST API Engine | 🟢 |
| Logger Engine | 🟢 |
| Cache Engine | 🟢 |
| Security Engine | 🟢 |
| Backup Engine | 🟢 |
| Import Engine | 🟢 |
| Export Engine | 🟢 |
---

# Core Engine

## Vai trò

Core Engine là trung tâm của K86 Pro.

Nhiệm vụ:

- Khởi động Plugin
- Nạp các Engine khác
- Khởi tạo hệ thống

## File chính

k86-pro.php

core/bootstrap.php

core/loader.php

core/version.php

## Engine phụ thuộc

Không có

## Engine được Core nạp

- Database Engine
- Logger Engine
- Cache Engine
- Security Engine
- Dashboard Engine
- REST API Engine
- Backup Engine
- Import Engine
- Export Engine

## Trạng thái
---

# Database Engine

## Vai trò

Database Engine chịu trách nhiệm quản lý toàn bộ dữ liệu của K86 Pro.

Nhiệm vụ:

- Tạo bảng dữ liệu khi kích hoạt plugin.
- Nâng cấp cấu trúc cơ sở dữ liệu.
- Quản lý phiên bản Database.
- Cung cấp nền tảng lưu trữ cho các Engine khác.

## File chính

core/database/loader.php

core/database/install.php

core/database/upgrade.php

## Phụ thuộc

Core Engine

## Các Engine sử dụng Database

- Product Engine
- Settings Engine
- Dashboard Engine
- Logger Engine
- Statistics Engine

## Trạng thái

🟢 Stable

## Ghi chú
---

# Admin Engine

## Vai trò

Admin Engine quản lý toàn bộ giao diện quản trị của K86 Pro trong WordPress Admin.

## Nhiệm vụ

- Tạo menu K86 Pro.
- Đăng ký các trang quản trị.
- Điều hướng giữa các module.
- Kiểm tra quyền truy cập.
- Kết nối Dashboard và Settings.

## File chính

admin/admin.php

## Phụ thuộc

- Core Engine
- Settings Engine
- Dashboard Engine

## Các Engine sử dụng Admin

- Product Engine
- Affiliate Engine
- Backup Engine
- Import Engine
- Export Engine

## Hook chính

- admin_menu
- admin_init

## Trạng thái

🟢 Stable

## Ghi chú

Admin Engine chỉ chịu trách nhiệm giao diện quản trị.
Không xử lý trực tiếp nghiệp vụ của Product, Database hay Affiliate.

Mọi Engine cần lưu dữ liệu đều phải sử dụng Database Engine.
Không được tạo bảng dữ liệu trực tiếp bên ngoài Database Engine.

🟢 Stable
