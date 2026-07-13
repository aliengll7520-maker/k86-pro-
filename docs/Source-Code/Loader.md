# Loader

Version: 1.0.0

Status: Development

## Giới thiệu

Loader chịu trách nhiệm nạp toàn bộ các thành phần của K86 Pro theo đúng thứ tự.

Loader giúp hệ thống hoạt động ổn định và tránh nạp trùng lặp.

## Trách nhiệm

- Nạp Core.
- Nạp Modules.
- Nạp Admin.
- Nạp Frontend.
- Nạp API.
- Nạp Assets.
- Đăng ký Hooks.
- Đăng ký Filters.

## Quy trình

```text
Bootstrap
    │
    ▼
Loader
    ├── Core
    ├── Admin
    ├── Frontend
    ├── Modules
    ├── API
    ├── Assets
    └── Ready
```

## Nguyên tắc

- Chỉ thực hiện việc nạp thành phần.
- Không xử lý nghiệp vụ.
- Không truy cập cơ sở dữ liệu.
- Không hiển thị giao diện.

## Mục tiêu

Đảm bảo toàn bộ hệ thống K86 Pro được khởi tạo đúng thứ tự và dễ mở rộng.
