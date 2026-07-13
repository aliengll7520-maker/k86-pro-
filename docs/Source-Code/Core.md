# Core

Version: 1.0.0

Status: Development

## Giới thiệu

Core là trung tâm của K86 Pro.

Core cung cấp các chức năng nền tảng mà mọi Engine và Module đều sử dụng.

## Trách nhiệm

- Quản lý vòng đời Plugin.
- Quản lý Services.
- Quản lý Config.
- Quản lý Event.
- Quản lý Hook.
- Quản lý Dependency.
- Quản lý Registry.

## Thành phần

- Application
- Service Container
- Config
- Registry
- Event Manager
- Hook Manager

## Nguyên tắc

- Không chứa giao diện.
- Không chứa Business Logic.
- Chỉ cung cấp dịch vụ nền tảng.
- Có thể tái sử dụng.

## Quan hệ

```text
Bootstrap
      │
      ▼
    Loader
      │
      ▼
     Core
      │
      ├── Admin
      ├── Frontend
      ├── Modules
      ├── API
      └── Database
```

## Mục tiêu

Xây dựng một Core ổn định, dễ mở rộng và có thể phục vụ toàn bộ hệ thống K86 Pro.
