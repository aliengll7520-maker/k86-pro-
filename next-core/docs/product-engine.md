# Product Engine

## Mục tiêu

Product Engine là trung tâm quản lý toàn bộ dữ liệu sản phẩm trong K86 Pro Next Core.

## Trách nhiệm

- Quản lý sản phẩm
- Quản lý giá
- Quản lý affiliate
- Quản lý media
- Quản lý đánh giá
- Quản lý tồn kho
- Quản lý vận chuyển
- Quản lý bảo hành
- Quản lý đổi trả
- Cung cấp dữ liệu cho Module và Frontend

## Không chịu trách nhiệm

- Render giao diện
- Truy cập trực tiếp Database
- Xuất HTML
- Xử lý CSS hoặc JavaScript
- ## Product Domain Model

### Thông tin cơ bản
- ID
- Tên sản phẩm
- Slug
- SKU
- Thương hiệu
- Danh mục
- Trạng thái

### Giá
- Giá gốc
- Giá bán
- Giá khuyến mãi
- Phần trăm giảm giá

### Media
- Ảnh đại diện
- Thư viện ảnh
- Video
- Tài liệu

### Affiliate
- Shopee
- TikTok Shop
- Lazada
- Tiki
- Amazon

### Đánh giá
- Điểm đánh giá
- Số lượt đánh giá
- Nhận xét

### Kho hàng
- Tồn kho
- Đã bán

### Chính sách
- Vận chuyển
- Bảo hành
- Đổi trả

### SEO
- Meta Title
- Meta Description
- Schema
- ## Data Flow

Người dùng
    ↓
WordPress
    ↓
Frontend
    ↓
Product Engine
    ↓
Product Service
    ↓
Product Repository
    ↓
Database

Khi lấy dữ liệu:

Database
    ↓
Product Repository
    ↓
Product Service
    ↓
Product Engine
    ↓
Module
    ↓
Render
    ↓
Frontend
## Class Responsibilities

### Product Engine
Điều phối toàn bộ hoạt động của Product Domain.
Không truy cập Database trực tiếp.

### Product Service
Xử lý nghiệp vụ.
Kiểm tra dữ liệu.
Điều phối Repository.

### Product Repository
Chỉ đọc và ghi dữ liệu.
Không xử lý nghiệp vụ.

### Product Model
Đại diện cho một sản phẩm.
Chỉ chứa dữ liệu và các phương thức liên quan đến dữ liệu.

### Product Validator
Kiểm tra dữ liệu đầu vào.
Không lưu dữ liệu.

### Product Events
Phát sự kiện khi:
- tạo sản phẩm
- cập nhật sản phẩm
- xóa sản phẩm

### Product Cache
Quản lý cache của Product.
Không truy cập Frontend.
## Public API

Product Engine cung cấp các phương thức:

createProduct()

updateProduct()

deleteProduct()

getProduct()

getProducts()

productExists()

duplicateProduct()

searchProducts()

clearCache()

refreshCache()


