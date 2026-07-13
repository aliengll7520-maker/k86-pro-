# API

Version: 1.0.0

Status: Development

## Giới thiệu

API chịu trách nhiệm giao tiếp dữ liệu giữa các Engine và hệ thống bên ngoài.

## Trách nhiệm

- REST API
- AJAX API
- Internal API
- Webhook
- Authentication
- Authorization

## Thành phần

- REST Routes
- AJAX Handlers
- Controllers
- Services
- Middleware

## Nguyên tắc

- Tuân thủ WordPress REST API.
- Kiểm tra quyền truy cập.
- Validate dữ liệu đầu vào.
- Trả về JSON chuẩn.

## Quan hệ

Core
│
└── API
    ├── REST
    ├── AJAX
    ├── Controllers
    └── Services

## Mục tiêu

Xây dựng lớp giao tiếp dữ liệu ổn định, bảo mật và dễ mở rộng.
