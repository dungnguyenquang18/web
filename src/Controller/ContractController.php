<?php 

require_once MODEL_PATH . 'Contract.php';

class ContractController {
    public function index(){
        try {
            $contracts = Contract::getAll();

            require VIEW_PATH . 'contract/index.php';
        } catch (Exception $e) {
            Logger::write('Error in CashbookController::index: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name'        => $_POST['name'] ?? '',
                'status'      => $_POST['status'] ?? '',
                'price'       => $_POST['price'] ?? 0,
                'currency'    => $_POST['currency'] ?? '',
                'unit'        => $_POST['unit'] ?? '',
                'expireDate'  => $_POST['expireDate'] ?? '',
                'signedDate'  => $_POST['signedDate'] ?? '',
                'nameA'       => $_POST['nameA'] ?? '',
                'phoneA'      => $_POST['phoneA'] ?? '',
                'nameB'       => $_POST['nameB'] ?? '',
                'phoneB'      => $_POST['phoneB'] ?? '',
                'contractUrl' => $_POST['contractUrl'] ?? '',
                'serviceId'   => $_POST['serviceId'] ?? 0,
                'providerId'  => $_POST['providerId'] ?? 0
            ];

            if (Contract::create($data)) {
                header("Location: /public/index.php?route=contract");
                exit;
            } else {
                echo "Lỗi tạo hợp đồng.";
            }
        } else {
            require VIEW_PATH . 'contract/create.php';
        }
    }

    // Hàm xóa hợp đồng
    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            if (Contract::delete($id)) {
                header("Location: /public/index.php?route=contract");
                exit;
            } else {
                echo "Lỗi xóa hợp đồng.";
            }
        } else {
            echo "Yêu cầu thiếu ID hợp đồng.";
        }
    }

    public function search()
    {
        $keyword = trim($_GET['keyword'] ?? '');
        $contracts = Contract::search($keyword);
        require VIEW_PATH . 'contract/index.php';
    }
}