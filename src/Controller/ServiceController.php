<?php

require_once MODEL_PATH . 'Service.php';
require_once MODEL_PATH . 'Provider.php';
require_once MODEL_PATH . 'ProvideService.php';
require_once __DIR__ . '/../Core/Logger.php';

class ServiceController
{
    public function index()
    {
        try {
            // Get all active services
            $services = Service::getAllServices();

            // Transform data for display
            foreach ($services as &$service) {
                $service['createDate'] = date('d/m/Y', strtotime($service['createDate']));
                $service['price'] = $service['price'] ? number_format($service['price']) . ' đ' : 'Liên hệ';
                $service['units'] = $service['units'] ?: '-';
                $service['des'] = $service['des'] ?: '-';
            }

            require VIEW_PATH . 'service/index.php';
        } catch (Exception $e) {
            Logger::write('Error in ServiceController::index: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function create()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Create service with basic info
                $serviceData = [
                    'name' => $_POST['name'],
                    'des' => $_POST['des'],
                    'createDate' => date('Y-m-d')
                ];

                // Insert service
                $serviceId = Service::create($serviceData);
                if (!$serviceId) {
                    throw new Exception('Không thể tạo dịch vụ');
                }

                // Add provider price info
                if (!empty($_POST['providers'])) {
                    foreach ($_POST['providers'] as $providerId) {
                        $provideServiceData = [
                            'serviceId' => $serviceId,
                            'providerId' => $providerId,
                            'providePrice' => $_POST['provider_price'][$providerId], // chỉ 1 giá
                            'status' => $_POST['status'],
                            'unit' => $_POST['provider_unit'][$providerId],
                            'currency' => $_POST['provider_currency'][$providerId]
                        ];
                        ProvideService::create($provideServiceData);
                    }
                }

                header('Location: /public/index.php?route=service&message=Tạo dịch vụ thành công');
                exit;
            }

            // Show create form
            $providers = Provider::getAllActiveProviders();
            require VIEW_PATH . 'service/create.php';
        } catch (Exception $e) {

            Logger::write('Error in ServiceController::create: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /public/index.php?route=service&error=ID không hợp lệ');
            exit;
        }

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'name' => $_POST['name'],
                    'des' => $_POST['des'],
                    'status' => $_POST['status']
                ];
                // Cập nhật service
                Service::update($id, $data);

                // Xóa hết các ProvideService cũ
                ProvideService::deleteByServiceId($id);

                // Thêm lại các ProvideService mới
                if (!empty($_POST['providers'])) {
                    foreach ($_POST['providers'] as $providerId) {
                        $provideServiceData = [
                            'serviceId' => $id,
                            'providerId' => $providerId,
                            'providePrice' => $_POST['provider_price'][$providerId],
                            'status' => $_POST['status'],
                            'unit' => $_POST['provider_unit'][$providerId],
                            'currency' => $_POST['provider_currency'][$providerId]
                        ];
                        ProvideService::create($provideServiceData);
                    }
                }

                header('Location: /public/index.php?route=service&message=Cập nhật dịch vụ thành công');
                exit;
            }

            $service = Service::getById($id);
            if (!$service) {
                header('Location: /public/index.php?route=service&error=Không tìm thấy dịch vụ');
                exit;
            }
            // Lấy danh sách provider
            $providers = Provider::getAllActiveProviders();
            // Lấy các provider đã gắn với service này
            $provideServices = ProvideService::getByServiceId($id);

            require VIEW_PATH . 'service/edit.php';
        } catch (Exception $e) {
            Logger::write('Error in ServiceController::edit: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /public/index.php?route=service&error=ID không hợp lệ');
            exit;
        }
        try {
            $db = Database::connect();
            // Xóa các bản ghi liên quan ở ProvideService trước
            $stmt1 = $db->prepare("DELETE FROM ProvideService WHERE serviceId = :id");
            $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt1->execute();

            // Sau đó xóa dịch vụ ở bảng Services
            $stmt2 = $db->prepare("DELETE FROM Services WHERE id = :id");
            $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt2->execute()) {
                header('Location: /public/index.php?route=service&message=Xóa dịch vụ thành công');
                exit;
            } else {
                echo "Lỗi xóa dịch vụ.";
            }
        } catch (Exception $e) {
            Logger::write('Error in ServiceController::delete: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function detail()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /public/index.php?route=service&error=ID không hợp lệ');
            exit;
        }

        try {
            $service = Service::getById($id);
            if (!$service) {
                header('Location: /public/index.php?route=service&error=Không tìm thấy dịch vụ');
                exit;
            }

            require VIEW_PATH . 'service/detail.php';
        } catch (Exception $e) {
            Logger::write('Error in ServiceController::detail: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }
}