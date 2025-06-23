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
                            <div class="fw-bold" style="color: #2b2b9b;">Admin</div>
                            <div class="small text-muted">admin@zsoft.com</div>
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

        <div class="container-fluid">
            <!-- Header with actions -->
            <div class="d-flex justify-content-between align-items-center py-3 pt-5">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Chi tiết nhà cung cấp</h5>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSupplierModal">
                        <i class="fas fa-edit me-2"></i>Chỉnh sửa
                    </button>
                    <button class="btn btn-warning" id="toggleStatusBtn">
                        <i class="fas fa-pause me-2"></i>Tạm dừng
                    </button>
                </div>
            </div>

            <!-- Supplier Details -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Thống kê</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="p-3 border rounded">
                                        <div class="text-muted small">Tổng đơn hàng</div>
                                        <div class="h4 mb-0"><?= number_format($statistics['total_bills']) ?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded">
                                        <div class="text-muted small">Tổng tiền hàng</div>
                                        <div class="h4 mb-0"><?= number_format($statistics['total_amount']) ?> đ</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded">
                                        <div class="text-muted small">Nợ phải trả</div>
                                        <div class="h4 mb-0 text-danger"><?= number_format($statistics['total_debt']) ?>
                                            đ</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded">
                                        <div class="text-muted small">Đã thanh toán</div>
                                        <div class="h4 mb-0 text-success">
                                            <?= number_format($statistics['total_paid']) ?> đ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Lịch sử giao dịch</h6>
                            <div class="d-flex align-items-center gap-2">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                    <button class="btn btn-outline-secondary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-filter me-1"></i>Lọc
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Mã giao dịch</th>
                                            <th>Ngày giao dịch</th>
                                            <th>Loại</th>
                                            <th>Số tiền</th>
                                            <th>Phương thức</th>
                                            <th>Trạng thái</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($bills)): ?>
                                        <?php foreach ($bills as $bill): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($bill['id']) ?></td>
                                            <td><?= htmlspecialchars($bill['createDate']) ?></td>
                                            <td>Mua hàng</td>
                                            <td class="<?= $bill['total'] < 0 ? 'text-danger' : 'text-success' ?>">
                                                <?= number_format($bill['total'], 0, ',', '.') ?> đ
                                            </td>
                                            <td><?= htmlspecialchars($bill['paymentMethod'] ?? 'N/A') ?></td>
                                            <td>
                                                <span
                                                    class="badge <?= $bill['status'] === 'Hoàn thành' ? 'bg-success' : 'bg-warning' ?>">
                                                    <?= htmlspecialchars($bill['status']) ?>
                                                </span>
                                            </td>
                                            <td><?= htmlspecialchars($bill['des'] ?? '') ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Không có giao dịch nào</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Thông tin nhà cung cấp</h6>

                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Mã nhà cung cấp</strong>
                                </div>
                                <div class="col-sm-9">
                                    <?= htmlspecialchars($provider['id'] ?? 'N/A') ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Tên nhà cung cấp</strong>
                                </div>
                                <div class="col-sm-9">
                                    <?= htmlspecialchars($provider['name'] ?? 'N/A') ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Số điện thoại</strong>
                                </div>
                                <div class="col-sm-9">
                                    <?= htmlspecialchars($provider['phone'] ?? 'N/A') ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Email</strong>
                                </div>
                                <div class="col-sm-9">
                                    <?= htmlspecialchars($provider['email'] ?? 'N/A') ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Website</strong>
                                </div>
                                <div class="col-sm-9">
                                    <?= htmlspecialchars($provider['websiteUrl'] ?? 'N/A') ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Trạng thái</strong>
                                </div>
                                <div class="col-sm-9">
                                    <span
                                        class="badge <?= $provider['status'] === 'Đang hoạt động' ? 'bg-success' : 'bg-warning' ?>">
                                        <?= htmlspecialchars($provider['status'] ?? 'N/A') ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Address Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">Địa chỉ</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Địa chỉ</strong>
                                </div>
                                <div class="col-sm-9">
                                    123 Đường ABC
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Phường/Xã</strong>
                                </div>
                                <div class="col-sm-9">
                                    Phường XYZ
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Quận/Huyện</strong>
                                </div>
                                <div class="col-sm-9">
                                    Quận 1
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Tỉnh/Thành phố</strong>
                                </div>
                                <div class="col-sm-9">
                                    TP. Hồ Chí Minh
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add after the address card -->

                </div>

                <!-- Summary Cards -->

            </div>
        </div>

        <!-- Edit Supplier Modal -->
        <div class="modal fade" id="editSupplierModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chỉnh sửa nhà cung cấp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Update the edit modal form content -->
                    <div class="modal-body">
                        <form id="editSupplierForm">
                            <div class="row mb-4">
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label class="form-label">Tên nhà cung cấp</label>
                                        <input type="text" class="form-control" name="name"
                                            value="<?= htmlspecialchars($provider['name'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mã số thuế</label>
                                        <input type="text" class="form-control" name="taxCode"
                                            value="<?= htmlspecialchars($provider['taxCode'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="tel" class="form-control" name="phone"
                                            value="<?= htmlspecialchars($provider['phone'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?= htmlspecialchars($provider['email'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="url" class="form-control" name="websiteUrl"
                                            value="<?= htmlspecialchars($provider['websiteUrl'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-select" name="status">
                                            <option value="Đang hoạt động"
                                                <?= ($provider['status'] ?? '') === 'Đang hoạt động' ? 'selected' : '' ?>>
                                                Đang hoạt động
                                            </option>
                                            <option value="Tạm ngưng"
                                                <?= ($provider['status'] ?? '') === 'Tạm ngưng' ? 'selected' : '' ?>>
                                                Tạm ngưng
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                            value="<?= htmlspecialchars($provider['address'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="des"
                                            rows="3"><?= htmlspecialchars($provider['des'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($provider['id'] ?? '') ?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../asset/js/supplier-detail.js"></script>
    <script src="../../../asset/js/sidebar.js"></script>
    <script>
    document.getElementById('editSupplierForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/public/index.php?route=provider-update', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close modal
                    bootstrap.Modal.getInstance(document.getElementById('editSupplierModal')).hide();
                    // Reload page to show updated data
                    window.location.reload();
                } else {
                    alert(data.error || 'Có lỗi xảy ra khi cập nhật');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi cập nhật');
            });
    });
    </script>

    </div>

</body>

</html>