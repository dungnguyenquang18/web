<?php


require_once MODEL_PATH . 'Cashbook.php';
require_once __DIR__ . '/../Core/Logger.php';

class CashbookController {
    public function index() {
        try {
            $startDate = $_GET['startDate'] ?? date('Y-m-01'); // First day of current month
            $endDate = $_GET['endDate'] ?? date('Y-m-t'); // Last day of current month
            
            // Get statistics
            $stats = Cashbook::getStatistics($startDate, $endDate);
            
            // Get provider debts
            $providerDebts = Cashbook::getProviderDebts($startDate, $endDate);
            
            require VIEW_PATH . 'cashbook/cash-book.php';
            
        } catch (Exception $e) {
            Logger::write('Error in CashbookController::index: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }
}