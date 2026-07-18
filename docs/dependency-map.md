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
---

# Settings Engine

## Vai trò

Settings Engine quản lý toàn bộ cấu hình của K86 Pro.

## Nhiệm vụ

- Đăng ký các thiết lập (Settings API).
- Lưu và đọc cấu hình plugin.
- Cung cấp cấu hình cho các Engine khác.
- Kiểm tra và xác thực dữ liệu cấu hình.

## File chính

settings/settings.php

## Phụ thuộc

- Core Engine
- Admin Engine

## Các Engine sử dụng Settings

- Product Engine
- Affiliate Engine
- Dashboard Engine
- REST API Engine
- Cache Engine
- Security Engine

## Hook chính

- admin_init

## Trạng thái

🟢 Stable
---

# Product Engine

## Vai trò

Quản lý toàn bộ dữ liệu sản phẩm và hiển thị Product Box.

## File chính

modules/product-manager.php

modules/product-add.php

modules/product-edit.php

modules/product-save.php

modules/product-delete.php

modules/product-shortcode.php

## Template

templates/product-box.php

templates/product-box-classic.php

## Phụ thuộc

- Core Engine
- Admin Engine
- Database Engine
- Settings Engine

## Hook

- admin_post_k86_save_product
- admin_post_k86_update_product
- admin_post_k86_delete_product

## Shortcode

- k86_box

## Trạng thái

🟢 Stable
---

# Affiliate Engine

## Vai trò

Quản lý toàn bộ chức năng Affiliate và hiển thị nút mua.

## File chính

modules/affiliate-box.php

## Phụ thuộc

- Product Engine
- Settings Engine

## Được sử dụng bởi

- Product Shortcode
- Product Template

## Hook

Chưa có Hook độc lập.

## Trạng thái

🟢 Stable

## Ghi chú

Affiliate Engine không truy cập Database trực tiếp.

Mọi dữ liệu sản phẩm đều được Product Engine truyền vào.
---

# Dashboard Engine

## Vai trò

Hiển thị trang tổng quan của K86 Pro.

## File chính

core/dashboard.php

## Phụ thuộc

- Core Engine
- Logger Engine
- Statistics Engine
- Product Engine
- Settings Engine

## Hook

- admin_menu
- admin_init

## Trạng thái

🟢 Stable
---

# Logger Engine

## Vai trò

Ghi nhật ký hoạt động của K86 Pro để phục vụ theo dõi lỗi và hỗ trợ gỡ lỗi.

## File chính

core/logger.php

## Phụ thuộc

- Core Engine

## Có thể được sử dụng bởi

- Dashboard Engine
- Product Engine
- Security Engine
- Backup Engine
- Import Engine
- Export Engine

## Trạng thái

🟢 Stable

## Ghi chú

Logger Engine chỉ ghi và đọc nhật ký.

Không xử lý nghiệp vụ hoặc thay đổi dữ liệu.

## Ghi chú

Dashboard Engine chỉ hiển thị dữ liệu.

Không xử lý trực tiếp Database hoặc nghiệp vụ của Product.
## Ghi chú
Settings Engine chỉ quản lý cấu hình.
Không xử lý dữ liệu sản phẩm hoặc logic nghiệp vụ.
