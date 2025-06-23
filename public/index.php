<?php
// Định nghĩa các path cho controller, view, model
const CONTROLLER_PATH = __DIR__ . '/../src/Controller/';
const VIEW_PATH = __DIR__ . '/../src/View/';
const MODEL_PATH = __DIR__ . '/../src/Model/';

// Khởi động session
session_start();

// Lấy tham số 'route' trên URL, mặc định là 'home'
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

switch ($route) {
    case 'home':
        // require_once CONTROLLER_PATH . 'HomeController.php';
        // $controller = new HomeController();
        // $controller->index();
        require_once VIEW_PATH . 'home.php';
        break;
    case 'dashboard':
        require_once CONTROLLER_PATH . 'DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'supplier':
        require_once CONTROLLER_PATH . 'ProviderController.php';
        $controller = new ProviderController();
        $controller->index();
        break;
    case 'login':
        require_once CONTROLLER_PATH . 'LoginController.php';
        $controller = new LoginController();
        $controller->login();
        break;
    case 'provider-search':
        require_once CONTROLLER_PATH . 'ProviderController.php';
        $controller = new ProviderController();
        $controller->searchProviderByName();
        break;
    case 'provider-create':
        require_once CONTROLLER_PATH . 'ProviderController.php';
        $controller = new ProviderController();
        $controller->createProvider();
        break;
    case 'logout':
        require_once CONTROLLER_PATH . 'AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'detail':
        if (isset($_GET['id'])) {
            require_once CONTROLLER_PATH . 'ProviderController.php';
            $controller = new ProviderController();
            $controller->detail($_GET['id']);
        } else {
            // 400 Bad Request
            http_response_code(400);
            echo '400 Bad Request: Missing ID parameter';
        }
        break;
    case 'provider-bills':
        if (isset($_GET['id'])) {
            require_once CONTROLLER_PATH . 'ProviderController.php';
            $controller = new ProviderController();
            $controller->getProviderBills($_GET['id']);
        } else {
            http_response_code(400);
            echo '400 Bad Request: Missing provider ID';
        }
        break;
    case 'provider-update':
        require_once CONTROLLER_PATH . 'ProviderController.php';
        $controller = new ProviderController();
        $controller->updateProvider();
        break;
    case 'invoice':
        require_once CONTROLLER_PATH . 'BillController.php';
        $controller = new BillController();
        $controller->index();
        break;
    case 'invoice-create':
        require_once CONTROLLER_PATH . 'BillController.php';
        $controller = new BillController();
        $controller->create();
        break;
    case 'cashbook':
        require_once CONTROLLER_PATH . 'CashbookController.php';
        $controller = new CashbookController();
        $controller->index();
        break;
    case 'service':
        require_once CONTROLLER_PATH . 'ServiceController.php';
        $controller = new ServiceController();
        $controller->index();
        break;
    case 'service-create':
        require_once CONTROLLER_PATH . 'ServiceController.php';
        $controller = new ServiceController();
        $controller->create();
        break;
    case 'service-edit':
        require_once CONTROLLER_PATH . 'ServiceController.php';
        $controller = new ServiceController();
        $controller->edit();    
        break;
    case 'service-delete':
        require_once CONTROLLER_PATH . 'ServiceController.php';
        $controller = new ServiceController();
        $controller->delete();
        break;
    case 'service-detail':  
        require_once CONTROLLER_PATH . 'ServiceController.php';
        $controller = new ServiceController();
        $controller->detail();
        break;
        
    case 'provide-service-create':
        require_once CONTROLLER_PATH . 'ProvideServiceController.php';
        $controller = new ProvideServiceController();
        $controller->create();
        break;  
    case 'provide-service-update':
        require_once CONTROLLER_PATH . 'ProvideServiceController.php';
        $controller = new ProvideServiceController();
        $controller->update();
        break;
    case 'invoice-create':
        require_once CONTROLLER_PATH . 'BillController.php';
        $controller = new BillController();
        $controller->create();
        break;
    case 'provider-delete':
        require_once CONTROLLER_PATH . 'ProviderController.php';
        $controller = new ProviderController();
        $controller->deleteProvider();
        break;

    case 'contract':
        require_once CONTROLLER_PATH . 'ContractController.php';
        $controller = new ContractController();
        $controller->index();
        break;
    case 'contract-create':
        require_once CONTROLLER_PATH . 'ContractController.php';
        $controller = new ContractController();
        $controller->create();
        break;
    case 'contract-delete':
        require_once CONTROLLER_PATH . 'ContractController.php';
        $controller = new ContractController();
        $controller->delete();
        break;
    case 'contract-search':
        require_once CONTROLLER_PATH . 'ContractController.php';
        $controller = new ContractController();
        $controller->search();
        break;
    default:
    
        // 404 Not Found
        http_response_code(404);
        echo '404 Not Found';
        break;
}