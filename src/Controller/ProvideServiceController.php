<?php

require_once MODEL_PATH . 'ProvideService.php';
require_once MODEL_PATH . 'Provider.php';
require_once MODEL_PATH . 'Service.php';
require_once __DIR__ . '/../Core/Logger.php';

class ProvideServiceController
{

    public function create()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Method not allowed');
            }

            $data = [
                'serviceId' => $_POST['serviceId'] ?? null,
                'providerId' => $_POST['providerId'] ?? null,
                'providePrice' => $_POST['providePrice'] ?? null,
                'currency' => $_POST['currency'] ?? 'VND',
                'unit' => $_POST['unit'] ?? null,
                'status' => $_POST['status'] ?? 'active'
            ];

            // Validate required fields
            if (!$data['serviceId'] || !$data['providerId'] || !$data['providePrice'] || !$data['unit']) {
                throw new Exception('Missing required fields');
            }

            $result = ProvideService::create($data);

            if ($result) {
                // Success response
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Thêm nhà cung cấp dịch vụ thành công']);
            }
        } catch (Exception $e) {
            Logger::write('Error in ProvideServiceController::create: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Method not allowed');
            }

            $serviceId = $_POST['serviceId'] ?? null;
            $providerId = $_POST['providerId'] ?? null;

            if (!$serviceId || !$providerId) {
                throw new Exception('Missing service or provider ID');
            }

            $data = [
                'providePrice' => $_POST['providePrice'] ?? null,
                'currency' => $_POST['currency'] ?? 'VND',
                'unit' => $_POST['unit'] ?? null,
                'status' => $_POST['status'] ?? 'active'
            ];

            // Validate required fields
            if (!$data['providePrice'] || !$data['unit']) {
                throw new Exception('Missing required fields');
            }

            $result = ProvideService::update($serviceId, $providerId, $data);

            if ($result) {
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Cập nhật thông tin thành công']);
            }
        } catch (Exception $e) {
            Logger::write('Error in ProvideServiceController::update: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function delete()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Method not allowed');
            }

            $serviceId = $_POST['serviceId'] ?? null;
            $providerId = $_POST['providerId'] ?? null;

            if (!$serviceId || !$providerId) {
                throw new Exception('Missing service or provider ID');
            }

            $result = ProvideService::delete($serviceId, $providerId);

            if ($result) {
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Xóa nhà cung cấp dịch vụ thành công']);
            }
        } catch (Exception $e) {
            Logger::write('Error in ProvideServiceController::delete: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getServiceProviders($serviceId = null)
    {
        try {
            if (!$serviceId) {
                $serviceId = $_GET['id'] ?? null;
            }

            if (!$serviceId) {
                throw new Exception('Missing service ID');
            }

            $providers = ProvideService::getByServiceId($serviceId);

            // If AJAX request
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Content-Type: application/json');
                echo json_encode($providers);
                return;
            }

            // For normal request, data will be used in the view
            return $providers;
        } catch (Exception $e) {
            Logger::write('Error in ProvideServiceController::getServiceProviders: ' . $e->getMessage());
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            } else {
                echo 'Có lỗi xảy ra: ' . $e->getMessage();
            }
        }
    }
}
