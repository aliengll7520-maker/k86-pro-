# K86 Pro Documentation

Version: 1.0.0

Status: Development

Current Milestone: Documentation v1.0

---

> Đây là cổng vào chính của toàn bộ tài liệu K86 Pro.
>
> Nếu bạn là người mới tham gia dự án, hãy đọc theo đúng thứ tự từ trên xuống dưới.

Đây là tài liệu chính thức của dự án K86 Pro.

---

# Cách sử dụng tài liệu

- Luôn đọc theo đúng thứ tự.
- Không sửa kiến trúc nếu chưa cập nhật Blueprint.
- Mọi thay đổi mã nguồn phải cập nhật tài liệu liên quan.
- Mỗi Engine có tài liệu riêng.
- Mỗi Module phải được tài liệu hóa.

---

# 1. Vision

- 00-Vision.md

---

# 2. Blueprint

- 99-K86-Blueprint.md

---

# 3. Architecture

- 01-Architecture.md
- docs/Architecture/

---

# 4. Development

- docs/Development/

---

# 5. Source Code

- docs/Source-Code/

---

# 6. Audit

- architecture-audit.md

---

# 7. Ecosystem

- Ecosystem.md

---

# Thứ tự đọc tài liệu

1. 00-Vision.md
2. 99-K86-Blueprint.md
3. 01-Architecture.md
4. docs/Architecture/
5. docs/Development/
6. docs/Source-Code/
7. architecture-audit.md
8. Ecosystem.md

---

# Quy tắc

- Không viết code trước khi xác định kiến trúc.
- Mọi thay đổi kiến trúc phải cập nhật docs.
- Mỗi Engine có tài liệu riêng.
- Mỗi Module phải được tài liệu hóa.
- Foundation Engine là nền tảng của toàn bộ hệ thống.
- Không thêm Engine mới nếu chưa cập nhật Architecture.

---

# Quy trình phát triển

Ý tưởng

↓

Blueprint

↓

Architecture

↓

Development

↓

Source Code

↓

Testing

↓

Release

---

# Trạng thái tài liệu

| Tài liệu | Trạng thái |
|----------|------------|
| Vision | ✅ |
| Blueprint | ✅ |
| Architecture | ✅ |
| Development | 🚧 |
| Source Code | 🚧 |
| Audit | 🚧 |
| Ecosystem | 🚧 |

---

# Ghi chú

- Bộ tài liệu này là nguồn tham chiếu chính của dự án K86 Pro.
- Kiến trúc được ưu tiên trước khi phát triển mã nguồn.
- Mọi thay đổi lớn đều phải được cập nhật vào tài liệu trước khi triển khai.
- Các Engine được phát triển độc lập nhưng tuân thủ kiến trúc chung.

---

# Kết luận

README.md là cổng thông tin chính của toàn bộ hệ thống tài liệu K86 Pro.

Mọi thành viên tham gia dự án nên bắt đầu từ tài liệu này, sau đó đọc theo đúng thứ tự để nắm được Vision, Blueprint, Architecture và quy trình phát triển trước khi làm việc với mã nguồn.
