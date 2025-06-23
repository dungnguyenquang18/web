<?php
// filepath: c:\xampp\htdocs\web2\src\View\service\detail.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết dịch vụ</title>
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
                        <li>
                            <a class="dropdown-item active" href="#">
                                <img src="../../../asset/images/vn-flag.png" alt="VN" width="20" class="me-2"
                                    style="color: black;">Tiếng Việt
                            </a>
                        </li>
                    </ul>
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
                        <li>
                            <a class="dropdown-item text-danger" href="/public/index.php?route=logout">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Chi tiết dịch vụ</h5>
                    <div>
                        <a href="/public/index.php?route=service-edit&id=<?= htmlspecialchars($service['id']) ?>"
                            class="btn btn-light btn-sm">
                            <i class="fas fa-edit me-1"></i>Chỉnh sửa
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-3">Thông tin chung</h6>
                            <div class="mb-3">
                                <label class="fw-bold">Tên dịch vụ</label>
                                <p><?= htmlspecialchars($service['name']) ?></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Mô tả</label>
                                <p><?= nl2br(htmlspecialchars($service['des'] ?? 'Chưa có mô tả')) ?></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Đơn vị tính</label>
                                <p><?= htmlspecialchars($service['units'] ?? 'Chưa có') ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">Thông tin khác</h6>
                            <div class="mb-3">
                                <label class="fw-bold">Khoảng giá</label>
                                <p>
                                    <?php if ($service['min_price'] && $service['max_price']): ?>
                                    <?= number_format($service['min_price']) ?> đ -
                                    <?= number_format($service['max_price']) ?> đ
                                    <?php else: ?>
                                    Liên hệ
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Trạng thái</label>
                                <p>
                                    <?php if ($service['status'] == 'Đang cung cấp'): ?>
                                    <span class="badge bg-success">Đang cung cấp</span>
                                    <?php else: ?>
                                    <span class="badge bg-secondary">Ngừng cung cấp</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Ngày tạo</label>
                                <p><?= date('d/m/Y', strtotime($service['createDate'])) ?></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Cập nhật lần cuối</label>
                                <p><?= date('d/m/Y', strtotime($service['updateDate'])) ?></p>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4 mb-3">Danh sách nhà cung cấp</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nhà cung cấp</th>
                                    <th>Đơn giá</th>
                                    <th>Đơn vị tính</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($provideServices)): ?>
                                <?php foreach ($provideServices as $ps): ?>
                                <tr>
                                    <td>
                                        <a
                                            href="/public/index.php?route=provider-detail&id=<?= htmlspecialchars($ps['providerId']) ?>">
                                            <?= htmlspecialchars($ps['providerName']) ?>
                                        </a>
                                    </td>
                                    <td><?= number_format($ps['providePrice']) ?> đ</td>
                                    <td><?= htmlspecialchars($ps['unit']) ?></td>
                                    <td>
                                        <?php if ($ps['status'] == 'active'): ?>
                                        <span class="badge bg-success">Đang hoạt động</span>
                                        <?php else: ?>
                                        <span class="badge bg-secondary">Ngừng hoạt động</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Chưa có nhà cung cấp nào</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>