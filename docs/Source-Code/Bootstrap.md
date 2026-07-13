# Bootstrap

Version: 1.0.0

Status: Development

## Giới thiệu

Bootstrap là điểm khởi động của K86 Pro.

Nó chịu trách nhiệm khởi tạo toàn bộ hệ thống và nạp các thành phần cần thiết.

## Trách nhiệm

- Kiểm tra môi trường.
- Khởi tạo Plugin.
- Nạp Core.
- Nạp Modules.
- Đăng ký Hooks.
- Khởi tạo Services.
- Khởi tạo API.
- Khởi tạo Assets.

## Quy trình khởi động

```text
Plugin Load
      │
      ▼
Bootstrap
      │
      ├── Core
      ├── Database
      ├── Modules
      ├── API
      ├── Assets
      └── Ready
```

## Nguyên tắc

- Chỉ khởi tạo.
- Không chứa Business Logic.
- Không xử lý dữ liệu.
- Không hiển thị giao diện.

## Mục tiêu

Tạo một điểm khởi động duy nhất cho toàn bộ hệ thống K86 Pro.
