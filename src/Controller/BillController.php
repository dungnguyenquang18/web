<?php

require_once MODEL_PATH . 'Bill.php';
require_once MODEL_PATH . 'Service.php';
require_once MODEL_PATH . 'Provider.php';
require_once     MODEL_PATH . 'Contract.php';
require_once __DIR__ . '/../Core/Logger.php';

class BillController
{
    public function index()
    {
        try {
            Logger::write('Gọi index của BillController');
            $bills = Bill::all();

            // Transform data for view
            $transformedBills = array_map(function ($bill) {
                return [
                    'id' => $bill['id'],
                    'createDate' => date('d/m/Y', strtotime($bill['createDate'])),
                    'type' => 'Mua hàng',
                    'amount' => $bill['total'] ?? 0,
                    'paymentMethod' => $bill['paymentMethod'] ?? 'Chưa có',
                    'des' => $bill['des'] ?? ''
                ];
            }, $bills);

            Logger::write('Lấy được danh sách bills: ' . json_encode($transformedBills));
            require VIEW_PATH . 'invoice/index.php';
        } catch (Exception $e) {
            Logger::write('Error in BillController::index: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function create()
    {
        try {
            Logger::write('Gọi create của BillController');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Create bill for contract with full fields
                $billData = [
                    'name' => $_POST['name'] ?? 'Hóa đơn mới',
                    'des' => $_POST['des'] ?? '',
                    'quantity' => $_POST['quantity'],
                    'createDate' => $_POST['createDate'] ?? date('Y-m-d'),
                    'paidDate' => $_POST['paidDate'] ?? date('Y-m-d'),
                    'vat' => $_POST['vat'] ?? 0,
                    'refContractId' => $_POST['contractId']
                ];

                $billId = Bill::create($billData);
                if (!$billId) {
                    throw new Exception('Không thể tạo hóa đơn');
                }

                header('Location: /public/index.php?route=invoice');
                exit;
            }

            // Get contracts that need payment
            $contracts = Contract::getAll();

            // Generate new bill number
            $billNumber = Bill::generateBillNumber();

            require VIEW_PATH . 'invoice/create.php';
        } catch (Exception $e) {
            Logger::write('Error in BillController::create: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }
}