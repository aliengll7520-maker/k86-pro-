# K86 Pro Family Tree

## Level 0

K86 Pro

---

## Level 1

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

## Trạng thái

| Engine | Status |
|---------|--------|
| Kernel Engine | Planning |
| Foundation Engine | Audit |
| Business Engine | Audit |
| Presentation Engine | Audit |
| Administration Engine | Audit |
| Settings Engine | Audit |
| Integration Engine | Planning |
| Documentation Engine | Ready |
| Shared Library | Planning |
## Level 2

### Kernel Engine
- Status: Planning
- Parent: K86 Pro
- Children:
  - Bootstrap
  - Loader
  - Hook Manager
  - Event Manager
  - Dependency Manager
  - Lifecycle Manager
  - ### Kernel Engine

Status: Planning

Parent: K86 Pro

Mission:
- Khởi động hệ thống.
- Điều phối Engine.
- Quản lý vòng đời Framework.

Authority:
- Được gọi Foundation Engine.
- Được kiểm tra trạng thái hệ thống.

Forbidden:
- Không truy cập Database.
- Không Render HTML.
- Không xử lý nghiệp vụ.

---

### Foundation Engine
- Status: Audit
- Parent: Kernel Engine
- Children:
  - Data Manager
  - Security Manager
  - Service Manager
  - Communication Manager
  - Resource Manager
### Foundation Engine

Mission:
- Cung cấp dịch vụ nền.

Authority:
- Database
- Security
- Cache
- Logger
- REST API

Forbidden:
- Không Render giao diện.
- Không xử lý Product.
- Không xử lý Decision.
---

### Business Engine
- Status: Audit
- Parent: K86 Pro
- Children:
  - Product Engine
  - Decision Engine
  - Affiliate Engine
  - Engagement Engine
### Business Engine

Mission:
- Xử lý toàn bộ nghiệp vụ.

Authority:
- Product Engine
- Decision Engine
- Affiliate Engine
- Engagement Engine

Forbidden:
- Không truy cập Template.
- Không nạp CSS.
---

### Presentation Engine
- Status: Audit
- Parent: K86 Pro
- Children:
  - Template Manager
  - Component Manager
  - Theme Manager
### Presentation Engine

Mission:
- Hiển thị giao diện.

Authority:
- Templates
- Components
- Assets

Forbidden:
- Không lưu Database.
- Không xử lý nghiệp vụ.
---

### Administration Engine
- Status: Audit
- Parent: K86 Pro

---

### Settings Engine
- Status: Audit
- Parent: K86 Pro

---

### Integration Engine
- Status: Planning
- Parent: K86 Pro

---

### Documentation Engine
- Status: Ready
- Parent: K86 Pro

---

### Shared Library
- Status: Planning
- Parent: K86 Pro
