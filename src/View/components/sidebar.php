<?php
// File: components/sidebar.php
?>
<div class="sidebar">
    <div class="p-3">
        <img src="/asset/images/Generated_Image_April_22__2025_-_1_39AM-removebg-preview-removebg-preview (1).png"
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
                    <a href="/public/index.php?route=bill" class="nav-link">Danh sách hóa đơn</a>
                    <a href="/public/index.php?route=bill-create" class="nav-link">Tạo hóa đơn</a>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <a href="#" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                data-bs-target="#serviceCollapse">
                <span>Dịch Vụ</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <div class="collapse" id="serviceCollapse">
                <div class="nav-submenu">
                    <a href="/public/index.php?route=service" class="nav-link">Danh sách dịch vụ</a>
                    <a href="/public/index.php?route=service-create" class="nav-link">Thêm dịch vụ</a>
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
                    <a href="/public/index.php?route=supplier" class="nav-link">Danh sách nhà cung cấp</a>
                    <a href="/public/index.php?route=supplier-history" class="nav-link">Lịch sử giao dịch</a>
                </div>
            </div>
        </div>
    </div>
</div>