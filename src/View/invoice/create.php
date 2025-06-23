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
        <!-- Add after the address card -->

        <div class="container-fluid">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center py-3 pt-5">
                <div class="d-flex align-items-center">
                    <a href="./index.html" class="btn btn-link p-0 me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h5 class="mb-0">Tạo hóa đơn</h5>
                </div>

            </div>

            <!-- Invoice Form -->
            <form id="invoiceForm" action="/public/index.php?route=invoice-create" method="POST">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Thông tin hợp đồng</h6>
                                <div class="mb-3">
                                    <label class="form-label">Chọn hợp đồng</label>
                                    <select class="form-select" name="contractId" id="contractSelect" required>
                                        <option value="">-- Chọn hợp đồng --</option>
                                        <?php foreach ($contracts as $contract): ?>
                                            <option value="<?= $contract['id'] ?>"
                                                data-price="<?= $contract['billCount'] ?>"
                                                data-unit="<?= $contract['unit'] ?>"
                                                data-service="<?= htmlspecialchars($contract['serviceName']) ?>"
                                                data-provider="<?= htmlspecialchars($contract['providerName']) ?>">
                                                <?= htmlspecialchars($contract['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div id="contractDetails" class="d-none">
                                    <div class="row g-3">
                                        <!-- s.name as serviceName,
                                        p.name as providerName,
                                        ps.providePrice as billCount -->
                                        <div class="col-md-6">
                                            <label class="form-label">Dịch vụ</label>
                                            <input type="text" class="form-control" id="serviceName"
                                                value="<?php $contract['serviceName'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6">

                                            <label class="form-label">Nhà cung cấp</label>
                                            <input type="text" class="form-control" id="providerName"
                                                value="<?php $contract['providerName'] ?>" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Đơn giá</label>
                                            <input type="text" class="form-control" id="contractPrice" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" name="quantity" value="1" min="1">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tên hóa đơn</label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?= htmlspecialchars($billNumber) ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ngày tạo</label>
                                            <input type="date" class="form-control" name="paidDate"
                                                value="<?= $currentDate ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ghi chú</label>
                                            <textarea class="form-control" rows="3" name="des"></textarea>
                                        </div>

                                        <button class="btn text-white" type="submit" form="invoiceForm"
                                            style="background-color: #2b2b9b;">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->

                </div>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../asset/js/invoice-create.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contractSelect = document.getElementById('contractSelect');
            const contractDetails = document.getElementById('contractDetails');

            contractSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    // Populate the fields using data attributes from Contract::getAll()
                    document.getElementById('serviceName').value = selectedOption.dataset.service;
                    document.getElementById('providerName').value = selectedOption.dataset.provider;
                    document.getElementById('contractPrice').value = new Intl.NumberFormat('vi-VN').format(
                        selectedOption.dataset.price) + ' đ';

                    contractDetails.classList.remove('d-none');
                    calculateTotal();
                } else {
                    contractDetails.classList.add('d-none');
                }
            });

            // Calculate total based on provided price (from provideService) and quantity
            function calculateTotal() {
                const selectedOption = contractSelect.options[contractSelect.selectedIndex];
                const quantity = document.querySelector('input[name="quantity"]').value;
                const price = parseFloat(selectedOption.dataset.price) || 0;
                const total = price * quantity;

                // You may update elements identified by totalAmount/remainingAmount if they exist
                // e.g., document.getElementById('totalAmount').textContent = new Intl.NumberFormat('vi-VN').format(total) + ' đ';
            }

            document.querySelector('input[name="quantity"]').addEventListener('input', calculateTotal);
        });
    </script>
</body>

</html>