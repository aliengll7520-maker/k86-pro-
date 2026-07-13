# Database

Version: 1.0.0

Status: Development

## Giới thiệu

Database chịu trách nhiệm lưu trữ và quản lý toàn bộ dữ liệu của K86 Pro.

## Trách nhiệm

- Tạo bảng dữ liệu
- Cập nhật Database
- CRUD dữ liệu
- Migration
- Backup
- Restore

## Thành phần

- Tables
- Models
- Repositories
- Query Builder
- Migration

## Nguyên tắc

- Không truy vấn SQL trực tiếp trong Business Logic.
- Sử dụng Repository.
- Chuẩn hóa cấu trúc dữ liệu.
- Tối ưu hiệu năng truy vấn.

## Quan hệ

Core
│
└── Database
    ├── Tables
    ├── Models
    ├── Repository
    └── Migration

## Mục tiêu

Xây dựng hệ thống dữ liệu ổn định, nhanh và dễ mở rộng.
