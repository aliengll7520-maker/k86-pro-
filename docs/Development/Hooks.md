# Hooks

Version: 1.0.0

Status: Development

Owner: K86 Pro Team

---

# 1. Mục tiêu

Quy định toàn bộ Action và Filter của K86 Pro.

Mọi Module phải giao tiếp thông qua Hook thay vì gọi trực tiếp.

---

# 2. Nguyên tắc

- Không sửa trực tiếp Module khác.
- Chỉ dùng Hook để mở rộng.
- Hook phải có tiền tố k86_.

---

# 3. Action Hooks

## Plugin Loaded

k86_loaded

Sau khi plugin khởi động.

---

## Product Saved

k86_product_saved

Sau khi lưu sản phẩm.

---

## Product Deleted

k86_product_deleted

Sau khi xóa sản phẩm.

---

## Affiliate Click

k86_affiliate_clicked

Khi người dùng bấm nút mua.

---

## AI Request

k86_ai_request

Khi gửi yêu cầu đến AI.

---

## Review Created

k86_review_created

Khi tạo đánh giá.

---

# 4. Filter Hooks

k86_product_data

Cho phép sửa dữ liệu sản phẩm.

---

k86_affiliate_url

Cho phép thay đổi link Affiliate.

---

k86_ai_prompt

Cho phép sửa Prompt AI.

---

k86_search_result

Cho phép thay đổi kết quả tìm kiếm.

---

# 5. Quy tắc

- Không đổi tên Hook sau khi phát hành Stable.
- Luôn ghi chú Hook.
- Hook phải dễ hiểu.
- Không tạo Hook trùng chức năng.

---

# 6. Version

Version:

1.0.0

Status:

Development
