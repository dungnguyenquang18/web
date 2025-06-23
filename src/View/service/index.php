<?php
// filepath: c:\xampp\htdocs\web2\src\View\service\index.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách dịch vụ</title>
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
                        <li><a class="dropdown-item text-danger" href="/public/index.php?route=logout">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Danh sách dịch vụ</h5>
                <a href="/public/index.php?route=service-create" class="btn btn-primary">+ Thêm dịch vụ</a>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tên dịch vụ</th>
                                    <th>Mô tả</th>
                                    <th>Đơn vị</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="service-tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../asset/js/sidebar.js"></script>
    <script>
    // Gán dữ liệu PHP sang JS
    const services = <?= json_encode($services, JSON_UNESCAPED_UNICODE) ?>;

    // Hàm render bảng
    function renderServicesTable(data) {
        const tbody = document.getElementById('service-tbody');
        tbody.innerHTML = data.map(service => `
        <tr>
            <td>${service.name}</td>
            <td>${service.des}</td>
            <td>${service.units}</td>
            <td>${service.price}</td>
            <td><span class="badge bg-success">${service.status}</span></td>
            <td>
                <a href="/public/index.php?route=service-edit&id=${service.id}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="/public/index.php?route=service-delete&id=${service.id}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?');">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    `).join('');
    }
    renderServicesTable(services);
    </script>

</html>