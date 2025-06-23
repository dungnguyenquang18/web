<?php
// filepath: c:\xampp\htdocs\web2\src\View\service\create.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm dịch vụ mới</title>
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
                            <div class="fw-bold" style="color: #2b2b9b;">Admin</div>
                            <div class="small text-muted">admin@haravan.com</div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Tài khoản</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Cài đặt</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="../auth/login.html">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Nội dung chính giữ nguyên hoặc bổ sung tại đây -->
        <div class="container mt-5">
            <div class="card mx-auto" style="max-width: 600px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thêm dịch vụ mới</h5>
                </div>
                <div class="card-body">
                    <form action="/public/index.php?route=service-create" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Tên dịch vụ</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên dịch vụ" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="des" rows="3"
                                placeholder="Mô tả chi tiết dịch vụ"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <select class="form-select" name="status">
                                <option value="Đang cung cấp">Đang cung cấp</option>
                                <option value="Ngừng cung cấp">Ngừng cung cấp</option>
                            </select>
                        </div>

                        <!-- Provider Selection -->
                        <div class="mb-3">
                            <label class="form-label">Nhà cung cấp</label>
                            <select class="form-select mb-3" id="providerSelect">
                                <option value="">-- Chọn nhà cung cấp --</option>
                                <?php foreach ($providers as $provider): ?>
                                <option value="<?= $provider['id'] ?>"><?= htmlspecialchars($provider['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>

                            <!-- Container for selected providers -->
                            <div id="selectedProviders" class="mb-3">
                                <!-- Selected providers will be added here dynamically -->
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="/public/index.php?route=service" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../asset/js/sidebar.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const providerSelect = document.getElementById('providerSelect');
        const selectedProviders = document.getElementById('selectedProviders');
        const selectedIds = new Set();

        providerSelect.addEventListener('change', function() {
            const providerId = this.value;
            const providerName = this.options[this.selectedIndex].text;

            if (providerId && !selectedIds.has(providerId)) {
                selectedIds.add(providerId);

                const providerHtml = `
                    <div class="provider-item border rounded p-3 mb-2" data-id="${providerId}">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <strong>${providerName}</strong>
                            <button type="button" class="btn-close remove-provider"></button>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-4">
                            <input type="number" class="form-control form-control-sm"
                                name="provider_price[${providerId}]" placeholder="Đơn giá" required>
                        </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control form-control-sm"
                                    name="provider_unit[${providerId}]" placeholder="Đơn vị tính" required>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select form-select-sm"
                                    name="provider_currency[${providerId}]">
                                    <option value="VND">VND</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="providers[]" value="${providerId}">
                    </div>
                `;

                selectedProviders.insertAdjacentHTML('beforeend', providerHtml);
                this.value = ''; // Reset select
            }
        });

        // Handle remove provider
        selectedProviders.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-provider')) {
                const item = e.target.closest('.provider-item');
                const providerId = item.dataset.id;
                selectedIds.delete(providerId);
                item.remove();
            }
        });
    });
    </script>
</body>

</html>