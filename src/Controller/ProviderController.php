<?php

require_once MODEL_PATH . 'Provider.php';
require_once MODEL_PATH . 'Bill.php';
require_once __DIR__ . '/../Core/Logger.php';

class ProviderController {
    public function index() {
        Logger::write('Gọi index của ProviderController');
        $providers = Provider::getAllProviders();
        Logger::write('Lấy được danh sách providers: ' . json_encode($providers));
        require VIEW_PATH . 'supplier/index.php';
    }
    public function searchProviderByName() {
        Logger::write('Gọi searchProviderByName với POST: ' . json_encode($_POST));
        $name = $_POST['name'] ?? '';
        $providers = Provider::searchProviderByName($name);
        Logger::write('Kết quả searchProviderByName: ' . json_encode($providers));
        require VIEW_PATH . 'supplier/index.php';
    }
    public function createProvider() {
        Logger::write('Gọi createProvider với POST: ' . json_encode($_POST));
        try {
            $name = $_POST['name'] ?? '';
            $taxCode = $_POST['taxCode'] ?? '';
            $des = $_POST['des'] ?? '';
            $status = $_POST['status'] ?? '';
            $address = $_POST['address'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $createDate = $_POST['createDate'] ?? date('Y-m-d H:i:s');
            $updatedDate = $_POST['updatedDate'] ?? date('Y-m-d H:i:s');
            $websiteUrl = $_POST['websiteUrl'] ?? '';
            $reputation = $_POST['reputation'] ?? 0;
            Provider::createProvider($name, $taxCode, $des, $status, $address, $email, $phone, $createDate, $updatedDate, $websiteUrl, $reputation);
            Logger::write('Đã gọi Provider::createProvider thành công');
            $providers = Provider::searchProviderByName('');
            require VIEW_PATH . 'supplier/index.php';
        } catch (Exception $e) {
            Logger::write('Lỗi createProvider: ' . $e->getMessage());
            echo $e->getMessage();
        }
    }
    public function detail($id) {
        try {
            // Lấy thông tin nhà cung cấp
            $provider = Provider::findById($id);
            
            if (!$provider) {
                throw new Exception("Không tìm thấy nhà cung cấp");
            }

            // Lấy danh sách hóa đơn
            $bills = Bill::getBillsByProviderId($id);

            // Lấy thống kê
            $statistics = Provider::getStatisticsByProviderId(1);

            // Load view với dữ liệu
            require VIEW_PATH . 'supplier/detail.php';

        } catch (Exception $e) {
            Logger::write('Error in detail method: ' . $e->getMessage());
            http_response_code(500);
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function updateProvider() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Method not allowed');
            }

            $id = $_POST['id'] ?? null;
            if (!$id) {
                throw new Exception('Missing provider ID');
            }

            // Get all form data
            $data = [
                'name' => $_POST['name'] ?? '',
                'taxCode' => $_POST['taxCode'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'email' => $_POST['email'] ?? '',
                'websiteUrl' => $_POST['websiteUrl'] ?? '',
                'status' => $_POST['status'] ?? 'Đang hoạt động',
                'address' => $_POST['address'] ?? '',
                'des' => $_POST['des'] ?? ''
            ];

            // Update provider
            $result = Provider::updateProvider(
                $id,
                $data['name'],
                $data['taxCode'],
                $data['des'],
                $data['status'],
                $data['address'],
                $data['email'],
                $data['phone'],
                null, // createDate - không cập nhật
                date('Y-m-d H:i:s'), // updatedDate
                $data['websiteUrl'],
                null // reputation - không cập nhật
            );

            if ($result) {
                // Return JSON response for AJAX request
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
            } else {
                throw new Exception('Không thể cập nhật nhà cung cấp');
            }

        } catch (Exception $e) {
            Logger::write('Error in updateProvider: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    public function getProviderBills($providerId) 
    {
        try {
            $bills = Bill::getBillsByProviderId($providerId);
            
            // Nếu gọi qua AJAX
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                header('Content-Type: application/json');
                echo json_encode($bills);
                return;
            }
            
            // Nếu gọi trực tiếp
            $provider = Provider::findById($providerId);
            if (!$provider) {
                throw new Exception("Không tìm thấy nhà cung cấp");
            }
            
            require VIEW_PATH . 'supplier/bills.php';
            
        } catch (Exception $e) {
            Logger::write('Lỗi lấy hóa đơn của nhà cung cấp: ' . $e->getMessage());
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            } else {
                echo $e->getMessage();
            }
        }
    }
    public function deleteProvider() {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) {
                throw new Exception("Missing provider ID");
            }
            if (Provider::deleteProvider($id)) {
                header('Location: /public/index.php?route=supplier');
                exit;
            } else {
                throw new Exception("Không thể xóa nhà cung cấp");
            }
        } catch(Exception $e) {
            Logger::write('Error in ProviderController::deleteProvider: ' . $e->getMessage());
            echo $e->getMessage();
        }
    }
}