<?php
use App\Controller\OrdiniController;
use App\Router\Router;
/*require __DIR__ . '/../vendor/autoload.php';*/

/*$klein = new \Klein\Klein();

$klein->respond('GET', '/api/getOrdini', function () {
    $ordiniController = new OrdiniController();
    $result = $ordiniController->getOrdini();
    return $result;
});

$klein->respond('GET', '/api/getOrdiniInverse', function () {
    $ordiniController = new OrdiniController();
    $result = $ordiniController->getOrdiniInverse();
    return $result;
});

$klein->dispatch();*/

Router::set('/api/getOrdini',function (){
    $ordiniController = new OrdiniController();
    $result = $ordiniController->getOrdini();
    return $result;
});

