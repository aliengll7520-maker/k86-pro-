# Release Process

Version: 1.0.0

Status: Development

Owner: K86 Pro Team

---

# 1. Mục tiêu

Tài liệu này quy định quy trình phát hành chính thức của K86 Pro.

Mục tiêu:

- Đảm bảo chất lượng.
- Giảm lỗi.
- Quản lý phiên bản.
- Phát hành có kiểm soát.

---

# 2. Chu kỳ phát triển

Ý tưởng

↓

Blueprint

↓

Architecture

↓

Development

↓

Testing

↓

Release Candidate (RC)

↓

Stable

↓

Maintenance

---

# 3. Các giai đoạn

## Planning

- Phân tích yêu cầu.
- Thiết kế.
- Cập nhật tài liệu.

---

## Development

- Viết mã nguồn.
- Viết tài liệu.
- Hoàn thành Module.

---

## QA

- Kiểm thử Module.
- Kiểm thử toàn hệ thống.
- Ghi nhận Bug.

---

## Release Candidate (RC)

- Chỉ sửa lỗi.
- Không thêm tính năng mới.
- Kiểm thử lần cuối.

---

## Stable

- Đóng gói Plugin.
- Đưa lên GitHub.
- Chuẩn bị tài liệu.
- Phát hành.

---

## Maintenance

- Theo dõi lỗi.
- Vá lỗi.
- Chuẩn bị phiên bản tiếp theo.

---

# 4. Quy tắc Version

Ví dụ:

v1.5.0-alpha

↓

v1.5.0-beta

↓

v1.5.0-RC1

↓

v1.5.0-Stable

↓

v1.5.1

↓

v1.6.0

↓

v2.0.0

---

# 5. Điều kiện phát hành

Plugin chỉ được phát hành khi:

- Không còn lỗi nghiêm trọng.
- QA hoàn thành.
- Tài liệu được cập nhật.
- Changelog đầy đủ.
- Kiểm thử trên WordPress thành công.

---

# 6. Danh sách kiểm tra

- Vision
- Blueprint
- Architecture
- Development Documents
- Source Code
- Testing
- Changelog
- GitHub
- ZIP Package

---

# 7. Quy trình đóng gói

- Kiểm tra toàn bộ file.
- Xóa file thử nghiệm.
- Kiểm tra cấu trúc.
- Đóng gói ZIP.
- Kiểm thử ZIP.
- Tạo Release trên GitHub.

---

# 8. Quy tắc

- Không phát hành khi còn BUG nghiêm trọng.
- Không thay đổi kiến trúc trong RC.
- Không thêm tính năng trong RC.
- Stable chỉ dùng sửa lỗi nhỏ.

---

# 9. Version

Version:

1.0.0

Status:

Development
