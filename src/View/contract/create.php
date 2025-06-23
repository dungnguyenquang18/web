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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
            <div class="container-fluid justify-content-end">
                <!-- Nội dung navbar nếu cần -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <img src="../../../asset/images/avatar.png" alt="User" width="32" class="rounded-circle">
                        Admin
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                        <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="/public/index.php?route=logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Nội dung chính: Form tạo hợp đồng -->
        <div class="container mt-5">
            <div class="card mx-auto" style="max-width: 600px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tạo Hợp Đồng Mới</h5>
                </div>
                <div class="card-body">
                    <form action="/public/index.php?route=contract-create" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Tên Hợp Đồng</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên hợp đồng"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trạng Thái</label>
                            <input type="text" class="form-control" name="status" placeholder="Nhập trạng thái">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá Tiền</label>
                            <input type="number" class="form-control" name="price" placeholder="Nhập giá tiền">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Loại Tiền</label>
                            <input type="text" class="form-control" name="currency" placeholder="VD: VND, USD">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Đơn Vị</label>
                            <input type="text" class="form-control" name="unit" placeholder="VD: Hợp đồng, gói,...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ngày Hết Hạn</label>
                            <input type="date" class="form-control" name="expireDate">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ngày Ký</label>
                            <input type="date" class="form-control" name="signedDate">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Người Đại Diện A</label>
                            <input type="text" class="form-control" name="nameA" placeholder="Tên người đại diện A">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số Điện Thoại A</label>
                            <input type="text" class="form-control" name="phoneA" placeholder="SĐT người đại diện A">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Người Đại Diện B</label>
                            <input type="text" class="form-control" name="nameB" placeholder="Tên người đại diện B">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số Điện Thoại B</label>
                            <input type="text" class="form-control" name="phoneB" placeholder="SĐT người đại diện B">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Đường Dẫn Hợp Đồng</label>
                            <input type="text" class="form-control" name="contractUrl" placeholder="Link hợp đồng">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Dịch Vụ</label>
                            <input type="number" class="form-control" name="serviceId" placeholder="Nhập ID dịch vụ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Nhà Cung Cấp</label>
                            <input type="number" class="form-control" name="providerId"
                                placeholder="Nhập ID nhà cung cấp">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="/public/index.php?route=contract" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../asset/js/sidebar.js"></script>
    <script src="../../../asset/js/supplier.js"></script>
</body>

</html>