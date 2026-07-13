# Product Engine

Version: 1.0.0

Status: Development

Owner: K86 Pro Team

---

# 1. Giới thiệu

Product Engine là Engine quản lý toàn bộ dữ liệu sản phẩm của K86 Pro.

Đây là Engine đầu tiên phục vụ trực tiếp cho Shopping Assistant.

---

# 2. Mục tiêu

- Quản lý sản phẩm.
- Quản lý giá.
- Quản lý thương hiệu.
- Quản lý hình ảnh.
- Quản lý mô tả.
- Quản lý trạng thái.
- Quản lý liên kết Affiliate.

---

# 3. Vai trò

Product Engine chịu trách nhiệm:

- Thêm sản phẩm.
- Sửa sản phẩm.
- Xóa sản phẩm.
- Hiển thị sản phẩm.
- Product Box.
- Product Shortcode.
- Quản lý dữ liệu sản phẩm.

---

# 4. Thành phần

Bao gồm:

- Product Manager
- Add Product
- Edit Product
- Delete Product
- Product Shortcode
- Product Box
- Settings

---

# 5. Cấu trúc

modules/

- product-manager.php
- product-add.php
- product-edit.php
- product-delete.php
- product-save.php
- product-shortcode.php
- affiliate-box.php

---

# 6. Dữ liệu sản phẩm

Mỗi sản phẩm gồm:

- ID
- Tên sản phẩm
- Thương hiệu
- Giá
- Giá khuyến mãi
- Ảnh
- Mô tả
- Link Shopee
- Link TikTok Shop
- Link Lazada
- Trạng thái

---

# 7. Database

Bảng:

wp_k86_products

Các trường:

- id
- name
- brand
- price
- sale_price
- image
- description
- shopee
- tiktok
- lazada
- status

---

# 8. Chức năng

- Product Manager
- Product Search
- Product Filter
- Product Box
- Product Shortcode
- Product Settings

---

# 9. Roadmap

RC1

- Product Manager
- Add Product
- Edit Product
- Delete Product
- Product Shortcode

RC2

- Product Category
- Product Tag
- Product Gallery
- Product Import

Stable

- Hoàn thiện Product Engine

---

# 10. QA Checklist

- Thêm sản phẩm
- Sửa sản phẩm
- Xóa sản phẩm
- Upload ảnh
- Product Box
- Product Shortcode
- Settings

---

# 11. Ghi chú

Product Engine chỉ quản lý dữ liệu sản phẩm.

Không xử lý AI.

Không xử lý Shopping Assistant.

Không xử lý Analytics.

Các Engine khác sẽ sử dụng dữ liệu từ Product Engine.
