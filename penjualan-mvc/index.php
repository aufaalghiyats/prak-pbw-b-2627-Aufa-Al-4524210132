<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/controllers/ProdukController.php';

$controller = new ProdukController($koneksi);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id     = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>