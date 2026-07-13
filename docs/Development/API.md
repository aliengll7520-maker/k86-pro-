# API Design

Version: 1.0.0

Status: Development

Owner: K86 Pro Team

---

# 1. Mục tiêu

Tài liệu này quy định kiến trúc API của K86 Pro.

Toàn bộ Module và Engine phải giao tiếp thông qua API thống nhất nhằm dễ mở rộng sang Mobile App, SaaS và dịch vụ Cloud trong tương lai.

---

# 2. Nguyên tắc

- Mỗi API chỉ thực hiện một nhiệm vụ.
- API phải có xác thực quyền.
- Trả dữ liệu theo định dạng JSON.
- Không trả dữ liệu nhạy cảm.
- Hỗ trợ mở rộng.

---

# 3. API Groups

## Product API

Chức năng:

- Danh sách sản phẩm
- Chi tiết sản phẩm
- Thêm sản phẩm
- Cập nhật sản phẩm
- Xóa sản phẩm

---

## Affiliate API

Chức năng:

- Link Affiliate
- Thống kê Click
- Chuyển hướng
- Tracking

---

## AI API

Chức năng:

- Chat
- Product Analysis
- Recommendation
- Shopping Assistant

---

## Knowledge API

Chức năng:

- Kiến thức sản phẩm
- FAQ
- Hướng dẫn
- So sánh

---

## Analytics API

Chức năng:

- Thống kê
- Dashboard
- Reports

---

## User API

Chức năng:

- Hồ sơ
- Lịch sử tìm kiếm
- Lịch sử AI
- Danh sách yêu thích

---

## Notification API

Chức năng:

- Thông báo
- Giá giảm
- Voucher
- Tin mới

---

# 4. REST API Prefix

```
/wp-json/k86/v1/
```

Ví dụ:

```
/wp-json/k86/v1/products

/wp-json/k86/v1/product/{id}

/wp-json/k86/v1/ai/chat

/wp-json/k86/v1/reviews
```

---

# 5. Authentication

Hỗ trợ:

- WordPress Login
- Application Password
- API Key
- OAuth (tương lai)

---

# 6. Response Format

```json
{
  "success": true,
  "message": "Success",
  "data": {}
}
```

Lỗi:

```json
{
  "success": false,
  "message": "Error",
  "code": 400
}
```

---

# 7. Quy tắc

- Không thay đổi Endpoint sau khi Stable.
- Có Version API.
- Ghi đầy đủ tài liệu.
- Luôn kiểm tra quyền truy cập.

---

# 8. Mục tiêu dài hạn

API của K86 Pro sẽ phục vụ:

- Website WordPress
- Mobile App Android
- Mobile App iOS
- Desktop App
- AI Assistant
- Open Platform cho Developer

---

# 9. Version

Version:

1.0.0

Status:

Development
