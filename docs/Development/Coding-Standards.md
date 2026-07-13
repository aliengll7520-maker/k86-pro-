# Coding Standards

Version: 1.0.0

Status: Development

Owner: K86 Pro Team

---

# 1. Mục tiêu

Tài liệu này quy định tiêu chuẩn lập trình của K86 Pro nhằm đảm bảo mã nguồn thống nhất, dễ đọc, dễ bảo trì và dễ mở rộng.

---

# 2. Nguyên tắc phát triển

- Viết tài liệu trước khi lập trình.
- Thiết kế kiến trúc trước khi phát triển tính năng.
- Mỗi Module chỉ đảm nhiệm một nhiệm vụ.
- Ưu tiên chất lượng hơn tốc độ.
- Hoàn thành từng giai đoạn rồi mới mở rộng.

---

# 3. Tiêu chuẩn mã nguồn

- Tuân thủ WordPress Coding Standards.
- Mỗi file chỉ có một chức năng chính.
- Không viết mã trùng lặp.
- Đặt tên rõ ràng, dễ hiểu.
- Luôn thêm chú thích cho các phần quan trọng.

---

# 4. Đặt tên

## File

Ví dụ:

- product-manager.php
- product-add.php
- affiliate-box.php

Quy tắc:

- Chữ thường.
- Dùng dấu gạch ngang (-).
- Tên phản ánh đúng chức năng.

## Hàm

Ví dụ:

- k86_add_product()
- k86_save_product()
- k86_delete_product()

Quy tắc:

- Luôn có tiền tố k86_.
- Tên ngắn gọn, rõ nghĩa.
- Một hàm chỉ thực hiện một nhiệm vụ.

---

# 5. Bảo mật

Luôn sử dụng:

- sanitize_text_field()
- sanitize_textarea_field()
- esc_html()
- esc_attr()
- esc_url()
- wp_nonce_field()
- check_admin_referer()
- current_user_can()

Không sử dụng dữ liệu người dùng khi chưa kiểm tra.

---

# 6. Database

- Luôn dùng $wpdb->prepare() khi có dữ liệu đầu vào.
- Không ghi SQL dư thừa.
- Không lưu dữ liệu trùng lặp.
- Database phải có Version.

---

# 7. Quy trình sửa lỗi

1. Kiểm tra toàn bộ Module.
2. Ghi nhận tất cả lỗi.
3. Tổng hợp lỗi.
4. Phân loại mức độ ưu tiên.
5. Chỉ sửa một file hoàn chỉnh mỗi lần.
6. Kiểm thử ngay sau khi thay file.
7. Khi ổn định mới chuyển sang Module tiếp theo.

---

# 8. Quy trình phát triển

1. Vision
2. Blueprint
3. Architecture
4. Documentation
5. Development
6. Testing
7. Release

---

# 9. Kiểm thử

- Kiểm thử từng Module.
- Kiểm thử toàn bộ Plugin.
- Không phát hành khi còn lỗi nghiêm trọng.

---

# 10. Ghi chú

Coding Standards là tiêu chuẩn lập trình chính thức của K86 Pro.

Mọi mã nguồn mới phải tuân thủ tài liệu này.
