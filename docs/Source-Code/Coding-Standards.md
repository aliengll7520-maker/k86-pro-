# K86 Pro Coding Standards

Version: 1.0.0

Status: Development

## Mục tiêu

Xây dựng tiêu chuẩn lập trình thống nhất cho toàn bộ K86 Pro.

## Quy tắc

- Tuân thủ WordPress Coding Standards.
- Tuân thủ PSR-4 Autoload.
- Mỗi Class chỉ có một nhiệm vụ.
- Mỗi Function chỉ giải quyết một vấn đề.
- Không viết mã trùng lặp.
- Luôn kiểm tra dữ liệu đầu vào.
- Escape dữ liệu đầu ra.
- Luôn sử dụng Nonce khi xử lý Form.
- Không truy vấn Database trực tiếp nếu đã có Service.

## Quy ước đặt tên

Class:
K86_Product_Manager

Function:
get_product()

Variable:
$product_name

Constant:
K86_PRO_VERSION

## Mục tiêu

Toàn bộ mã nguồn K86 Pro đều tuân theo cùng một chuẩn để dễ đọc, dễ bảo trì và dễ mở rộng.
