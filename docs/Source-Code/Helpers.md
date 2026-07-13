# Helpers

Version: 1.0.0

Status: Development

## Giới thiệu

Helpers cung cấp các hàm dùng chung cho toàn bộ hệ thống K86 Pro.

## Trách nhiệm

- Xử lý chuỗi
- Xử lý mảng
- Xử lý URL
- Xử lý Date Time
- Xử lý File
- Xử lý Security

## Thành phần

- String Helper
- Array Helper
- URL Helper
- Date Helper
- File Helper
- Security Helper

## Nguyên tắc

- Không chứa Business Logic.
- Có thể tái sử dụng.
- Dễ kiểm thử.
- Hiệu năng cao.

## Quan hệ

Core
│
└── Helpers
    ├── String
    ├── Array
    ├── URL
    ├── Date
    └── Security

## Mục tiêu

Xây dựng thư viện hàm dùng chung giúp giảm trùng lặp mã nguồn.
