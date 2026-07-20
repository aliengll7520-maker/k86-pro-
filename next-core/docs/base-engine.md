# Base Engine

## Mục tiêu

Base Engine là lớp nền cho tất cả Engine trong Next Core.

Mọi Engine đều kế thừa từ Base Engine để có cùng kiến trúc và cách hoạt động.

## Vai trò

- Chuẩn hóa cấu trúc Engine
- Giảm trùng lặp mã nguồn
- Quản lý vòng đời của Engine
- Cung cấp API chung cho các Engine
## Engine Lifecycle

1. Register
2. Boot
3. Initialize
4. Ready
5. Shutdown
## Capabilities

Base Engine hỗ trợ:

- Register
- Boot
- Enable
- Disable
- Reset
- Status
- Version
- Health Check
- ## Public API

Mọi Engine kế thừa Base Engine sẽ có các phương thức sau:

register()

boot()

initialize()

shutdown()

enable()

disable()

isEnabled()

getName()

getVersion()

getStatus()

healthCheck()

reset()
## Engine State

Mỗi Engine có các trạng thái:

- Registered
- Booting
- Initialized
- Ready
- Disabled
- Error
- Shutdown
- ## Design Principles

- Một Engine chỉ có một nhiệm vụ chính.
- Không truy cập Database trực tiếp.
- Không Render HTML.
- Không phụ thuộc vào Engine khác.
- Giao tiếp thông qua Service hoặc Event.
- Có thể bật hoặc tắt độc lập.
