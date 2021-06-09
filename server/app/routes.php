<?php
use App\Controller\OrdiniController;
use App\Router\Router;

Router::set('/api/getOrdini',function (){
    $ordiniController = new OrdiniController();
    $result = $ordiniController->getOrdini();
    echo $result;
});

