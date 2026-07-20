# Engine Standard

## Mục tiêu

Mọi Engine trong Next Core phải tuân theo cùng một kiến trúc.

## Cấu trúc

Engine
Service
Repository
Model
Validator
Events
Cache

## Quy tắc

- Một class chỉ có một trách nhiệm.
- Engine không truy cập Database.
- Repository chỉ đọc và ghi dữ liệu.
- Service xử lý nghiệp vụ.
- Model đại diện dữ liệu.
- Validator kiểm tra dữ liệu.
- Event phát sự kiện.
- Cache quản lý bộ nhớ đệm.
- 
