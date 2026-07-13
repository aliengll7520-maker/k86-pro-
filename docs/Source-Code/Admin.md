# Admin

Version: 1.0.0

Status: Development

## Giới thiệu

Admin là khu vực quản trị của K86 Pro.

Engine này chịu trách nhiệm xây dựng toàn bộ giao diện quản trị trong WordPress.

## Trách nhiệm

- Dashboard
- Menu
- Trang cài đặt
- Quản lý Product
- Quản lý AI
- Quản lý Affiliate
- Quản lý Logs
- Quản lý License

## Thành phần

- Dashboard
- Menu
- Settings
- Pages
- Forms
- Tables
- Notices

## Nguyên tắc

- Chỉ hoạt động trong wp-admin.
- Không xử lý Business Logic.
- Gọi Service từ Core.
- Giao diện tách biệt với xử lý dữ liệu.

## Quan hệ

```
Core
 │
 ▼
Admin
 │
 ├── Dashboard
 ├── Settings
 ├── Product Manager
 ├── AI Manager
 └── Reports
```

## Mục tiêu

Xây dựng giao diện quản trị trực quan, dễ sử dụng và dễ mở rộng.
