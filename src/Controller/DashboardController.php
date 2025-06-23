<?php

require_once MODEL_PATH . 'Dashboard.php';
require_once __DIR__ . '/../Core/Logger.php';

class DashboardController {
    public function index() {
        try {
            Logger::write('Loading dashboard data');
            
            // Load thống kê
            $stats = Dashboard::getStatistics();
            Logger::write('Stats: ' . json_encode($stats)); // Debug log
            
            // Load top providers
            $topProviders = Dashboard::getTopProviders(3); 
            Logger::write('TopProviders: ' . json_encode($topProviders)); // Debug log
            
            if(empty($stats) || empty($topProviders)) {
                throw new Exception('Không thể load dữ liệu dashboard');
            }

            require VIEW_PATH . 'dashboard.php';
            
        } catch (Exception $e) {
            Logger::write('Error in DashboardController: ' . $e->getMessage());
            echo 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }
}