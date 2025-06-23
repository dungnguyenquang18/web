<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../../asset/css/style.css">
    <style>
    .bg-silver {
        background: linear-gradient(145deg, #C0C0C0, #E8E8E8);
    }

    .bg-bronze {
        background: linear-gradient(145deg, #CD7F32, #E6B17E);
    }

    .avatar-circle {
        position: relative;
        width: 100px;
        height: 100px;
    }
    </style>
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
                                <?= htmlspecialchars($_SESSION['user']['username'] ?? 'Admin') ?>
                            </div>
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

        <!-- Main Content -->
        <div class="container-fluid p-4 ">
            <!-- Statistics Cards -->
            <div class="row mb-4 pt-4">
                <div class="col-md-4">
                    <div class="card border-primary h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-primary mb-2">Tổng nhà cung cấp</h6>
                                    <h2 class="mb-0"><?= number_format($stats['provider_count']) ?></h2>
                                </div>
                                <div class="text-primary">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-success h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-success mb-2">Tổng giá trị hợp đồng</h6>
                                    <h2 class="mb-0"><?= number_format($stats['total_value']) ?> đ</h2>
                                </div>
                                <div class="text-success">
                                    <i class="fas fa-money-bill-wave fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-danger h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-danger mb-2">Tổng nợ phải trả</h6>
                                    <h2 class="mb-0"><?= number_format($stats['total_debt']) ?> đ</h2>
                                </div>
                                <div class="text-danger">
                                    <i class="fas fa-exclamation-circle fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Providers Card View -->
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Top 3 Nhà cung cấp</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <?php foreach ($topProviders as $index => $provider): ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <div class="position-relative mb-4">
                                        <div class="avatar-circle mx-auto">
                                            <?php
                                                $medals = ['bg-warning', 'bg-silver', 'bg-bronze'];
                                                $medalClass = $medals[$index] ?? 'bg-light';
                                                ?>
                                            <div class="rounded-circle <?= $medalClass ?> d-flex align-items-center justify-content-center"
                                                style="width: 100px; height: 100px; margin: 0 auto;">
                                                <i class="fas fa-building fa-2x text-white"></i>
                                            </div>
                                            <?php if ($index < 3): ?>
                                            <div class="position-absolute top-0 start-50 translate-middle">
                                                <i
                                                    class="fas fa-crown fa-lg <?= $index === 0 ? 'text-warning' : 'text-secondary' ?>"></i>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <h5 class="card-title mb-1"><?= htmlspecialchars($provider['name']) ?></h5>
                                    <p class="text-muted small mb-3"><?= htmlspecialchars($provider['email'] ?? '') ?>
                                    </p>
                                    <div class="d-flex justify-content-around mb-3">
                                        <div class="text-center">
                                            <div class="h5 mb-0"><?= number_format($provider['contract_count']) ?></div>
                                            <small class="text-muted">Hợp đồng</small>
                                        </div>
                                        <div class="text-center">
                                            <div class="h5 mb-0"><?= number_format($provider['total_value']) ?> đ</div>
                                            <small class="text-muted">Giá trị</small>
                                        </div>
                                    </div>
                                    <span
                                        class="badge <?= $provider['status'] === 'Đang hoạt động' ? 'bg-success' : 'bg-warning' ?> mb-3">
                                        <?= htmlspecialchars($provider['status']) ?>
                                    </span>
                                    <div>
                                        <a href="/public/index.php?route=detail&id=<?= $provider['id'] ?>"
                                            class="btn btn-outline-primary btn-sm w-100">
                                            <i class="fas fa-eye me-1"></i> Chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../asset/js/sidebar.js"></script>
</body>

</html>