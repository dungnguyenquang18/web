<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhà cung cấp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../../asset/css/style.css">
</head>

<body>
    <div class="sidebar">
        <div class="p-3">
            <img src="../../../asset/images/Generated_Image_April_22__2025_-_1_39AM-removebg-preview-removebg-preview (1).png"
                alt="" style="width: auto;height: 60px;">
        </div>
        <div class="nav flex-column">
            <div class="nav-item">
                <a href="/public/index.php?route=dashboard"
                    class="nav-link d-flex justify-content-between align-items-center">
                    <span>Tổng Quan</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#invoiceCollapse">
                    <span>Hóa Đơn</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="invoiceCollapse">
                    <div class="nav-submenu">
                        <a href="/public/index.php?route=invoice" class="nav-link">Danh sách hóa đơn</a>
                        <a href="/public/index.php?route=invoice-create" class="nav-link">Tạo hóa đơn</a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#productCollapse">
                    <span>Sản Phẩm</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="productCollapse">
                    <div class="nav-submenu">
                        <a href="/public/index.php?route=service" class="nav-link">Danh sách sản phẩm</a>
                        <a href="/public/index.php?route=service-create" class="nav-link">Thêm sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="/public/index.php?route=cashbook" class="nav-link">Công Nợ</a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#supplierCollapse">
                    <span>Nhà Cung Cấp</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="supplierCollapse">
                    <div class="nav-submenu">
                        <a href="/public/index.php?route=supplier" class="nav-link">Danh sách nhà cung
                            cấp
                        </a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#contractCollapse">
                    <span>Hợp đồng</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="contractCollapse">
                    <div class="nav-submenu">
                        <a href="/public/index.php?route=contract" class="nav-link">Danh sách hợp đồng</a>
                        <a href="/public/index.php?route=contract-create" class="nav-link">Thêm mới hợp đồng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
            <div class="container-fluid justify-content-end">
                <!-- Language Selector -->
                <div class="nav-item dropdown me-3">
                    <button class="btn nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        <img src="../../../asset/images/vn-flag.png" alt="VN" width="20" class="me-2">
                        <span style="color: black;">Tiếng Việt</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item active" href="#">
                                <img src="../../../asset/images/vn-flag.png" alt="VN" width="20" class="me-2"
                                    style="color: black;">Tiếng Việt
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <img src="../../../asset/images/en-flag.png" alt="EN" width="20" class="me-2"
                                    style="color: black;">English
                            </a></li>
                    </ul>
                </div>

                <!-- Notifications -->
                <div class="nav-item me-3">
                    <button class="btn nav-link position-relative">
                        <i class="fa-regular fa-bell" style="color: black;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </button>
                </div>

                <!-- User Profile -->
                <div class="nav-item dropdown">
                    <button class="btn nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        <img src="../../../asset/images/avatar.png" alt="User" width="32" height="32"
                            class="rounded-circle me-2">
                        <div class="d-none d-md-block">
                            <div class="fw-bold" style="color: #2b2b9b;">
                                <?= htmlspecialchars($_SESSION['user']['username'] ?? 'Guest') ?></div>
                            <div class="small text-muted"><?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>
                            </div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Tài khoản</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Cài đặt</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="/public/index.php?route=logout">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="header d-flex justify-content-between align-items-center">
            <h5>Danh sách nhà cung cấp</h5>
            <div class="d-flex align-items-center" style="margin-top: 20px;">

                <form class="d-flex align-items-center" method="POST" action="/public/index.php?route=provider-search"
                    style="margin-bottom:0;">
                    <input type="search" class="form-control ms-3" name="name" placeholder="Tìm nhà cung cấp">
                    <button type="submit" class="btn btn-primary ms-1">Tìm kiếm</button>
                </form>
                <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#supplierModal"
                    style="margin-left: 4px;">+ Tạo nhà
                    cung
                    cấp</button>
            </div>
        </div>

        <div class="mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span>Thêm điều kiện lọc</span>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nhà cung cấp</th>
                                <th>Trạng thái</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Hành động</th> <!-- New column header -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($providers)): ?>
                            <?php foreach ($providers as $provider): ?>
                            <tr>
                                <td>
                                    <a
                                        href="/public/index.php?route=detail&id=<?= htmlspecialchars($provider['id']) ?>">
                                        <?= htmlspecialchars($provider['name']) ?>
                                    </a>
                                </td>
                                <td><span
                                        class="status-badge"><?= htmlspecialchars($provider['status'] ?? 'Đang hoạt động') ?></span>
                                </td>
                                <td><?= htmlspecialchars($provider['phone'] ?? '') ?></td>
                                <td><?= htmlspecialchars($provider['email'] ?? '') ?></td>
                                <td>
                                    <!-- Delete button with confirmation -->
                                    <a href="/public/index.php?route=provider-delete&id=<?= htmlspecialchars($provider['id']) ?>"
                                        class="btn btn-danger btn-sm btn-delete" btn-delete"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa nhà cung cấp này?');">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Không có nhà cung cấp nào.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tạo nhà cung cấp mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="supplierForm" method="POST" action="/public/index.php?route=provider-create">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Thông tin chung</h6>
                                <div class="mb-3">
                                    <label class="form-label">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mã nhà cung cấp</label>
                                    <input type="text" class="form-control" name="taxCode" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Website</label>
                                    <input type="url" class="form-control" name="websiteUrl" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Địa chỉ</h6>
                                <div class="mb-3">
                                    <label class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tỉnh/Thành phố</label>
                                    <select class="form-select" id="provinceSelect" name="province">
                                        <option selected>Chọn tỉnh/thành phố</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quận/Huyện</label>
                                    <select class="form-select" id="districtSelect" name="district">
                                        <option selected>Chọn quận/huyện</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phường/Xã</label>
                                    <select class="form-select" id="wardSelect" name="ward">
                                        <option selected>Chọn phường/xã</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6 class="mb-3">Thông tin bổ sung</h6>
                            <div class="mb-3">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control" rows="3" name="des" required></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-add">Lưu</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../asset/js/sidebar.js"></script>
    <script src="../../../asset/js/supplier.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinceSelect = document.getElementById('provinceSelect');
        const districtSelect = document.getElementById('districtSelect');
        const wardSelect = document.getElementById('wardSelect');

        // Load tỉnh/thành phố
        fetch('https://provinces.open-api.vn/api/p/')
            .then(response => response.json())
            .then(data => {
                data.forEach(function(province) {
                    const option = document.createElement('option');
                    option.value = province.code;
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            });

        // Khi chọn tỉnh/thành phố, load quận/huyện
        provinceSelect.addEventListener('change', function() {
            const provinceCode = this.value;
            districtSelect.innerHTML = '<option selected>Chọn quận/huyện</option>';
            wardSelect.innerHTML = '<option selected>Chọn phường/xã</option>';
            if (!provinceCode) return;
            fetch(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    data.districts.forEach(function(district) {
                        const option = document.createElement('option');
                        option.value = district.code;
                        option.textContent = district.name;
                        districtSelect.appendChild(option);
                    });
                });
        });

        // Khi chọn quận/huyện, load phường/xã
        districtSelect.addEventListener('change', function() {
            const districtCode = this.value;
            wardSelect.innerHTML = '<option selected>Chọn phường/xã</option>';
            if (!districtCode) return;
            fetch(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    data.wards.forEach(function(ward) {
                        const option = document.createElement('option');
                        option.value = ward.code;
                        option.textContent = ward.name;
                        wardSelect.appendChild(option);
                    });
                });
        });
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.preventDefault();
                if (confirm('Bạn có chắc chắn muốn xóa nhà cung cấp này?')) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });
    });
    </script>
</body>

</html>