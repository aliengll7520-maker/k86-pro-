# K86 Pro Family Tree

Version: 1.0.0

Status: Ready

---

# Level 0

K86 Pro

---

# Level 1

- Kernel Engine
- Foundation Engine
- Business Engine
- Presentation Engine
- Administration Engine
- Settings Engine
- Integration Engine
- Documentation Engine
- Shared Library

---

# Trạng thái

| Engine | Status |
|----------|---------|
| Kernel Engine | Planning |
| Foundation Engine | Ready |
| Business Engine | Ready |
| Presentation Engine | Planning |
| Administration Engine | Planning |
| Settings Engine | Planning |
| Integration Engine | Planning |
| Documentation Engine | Ready |
| Shared Library | Planning |

---

# Level 2

## Kernel Engine

Status: Planning

Parent: K86 Pro

### Children

- Bootstrap
- Loader
- Hook Manager
- Event Manager
- Dependency Manager
- Lifecycle Manager

### Mission

- Khởi động hệ thống.
- Nạp các Engine.
- Điều phối vòng đời Framework.

### Authority

- Bootstrap Framework.
- Load Engine.
- Quản lý Hook.
- Quản lý Event.

### Forbidden

- Không truy cập Database.
- Không Render HTML.
- Không xử lý nghiệp vụ.

---

## Foundation Engine

Status: Ready

Parent: Kernel Engine

### Children

- Data Manager
- Security Manager
- Service Manager
- Communication Manager
- Resource Manager

### Mission

- Cung cấp hạ tầng dùng chung.
- Quản lý dịch vụ nền.
- Cung cấp API nội bộ.

### Authority

- Database.
- Security.
- Cache.
- Logger.
- REST API.
- Configuration.

### Forbidden

- Không xử lý Product.
- Không xử lý Shopping Logic.
- Không Render giao diện.

---

## Business Engine

Status: Ready

Parent: K86 Pro

### Children

- Shopping Assistant Engine
- Product Engine
- Knowledge Engine
- AI Engine
- Engagement Engine
- Affiliate Engine
- Analytics Engine
- Automation Engine
- OpenAPI Engine

### Mission

- Xử lý toàn bộ nghiệp vụ của K86 Pro.

### Authority

- Shopping Assistant.
- Product.
- Knowledge.
- AI.
- Engagement.
- Affiliate.
- Analytics.
- Automation.
- OpenAPI.

### Forbidden

- Không Render giao diện.
- Không quản lý Bootstrap.
- Không xử lý hạ tầng hệ thống.

---

## Presentation Engine

Status: Planning

Parent: K86 Pro

### Children

- Template Manager
- Component Manager
- Theme Manager

### Mission

- Hiển thị giao diện người dùng.

### Authority

- Templates.
- Components.
- Assets.

### Forbidden

- Không xử lý Database.
- Không xử lý nghiệp vụ.

---

## Administration Engine

Status: Planning

Parent: K86 Pro

### Mission

- Quản lý khu vực quản trị WordPress.
- Điều phối Dashboard.
- Quản lý màn hình Admin.

---

## Settings Engine

Status: Planning

Parent: K86 Pro

### Mission

- Quản lý cấu hình hệ thống.
- Quản lý tùy chọn Plugin.
- Quản lý thiết lập Engine.

---

## Integration Engine

Status: Planning

Parent: K86 Pro

### Mission

- Tích hợp Plugin.
- Tích hợp Theme.
- Tích hợp dịch vụ bên ngoài.

---

## Documentation Engine

Status: Ready

Parent: K86 Pro

### Mission

- Quản lý tài liệu kiến trúc.
- Quản lý tài liệu phát triển.
- Chuẩn hóa tài liệu dự án.

---

## Shared Library

Status: Planning

Parent: K86 Pro

### Mission

- Chứa thư viện dùng chung.
- Chứa Helper.
- Chứa Utility.
- Chứa Shared Component.

---

# Kết luận

Family Tree mô tả cấu trúc tổng thể của K86 Pro ở mức kiến trúc.

Tài liệu này xác định các nhóm Engine, quan hệ cha/con và phạm vi trách nhiệm của từng nhóm. Chi tiết triển khai của từng Engine được định nghĩa trong các tài liệu Architecture tương ứng.
