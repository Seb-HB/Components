<?php
session_start();
require_once 'var.php';
spl_autoload_register(function ($class){

    $folders=[
        'controllers/',
        'models/',
        'models/managers/'
    ];
    foreach($folders as $folder){
        if (file_exists($folder.$class.'.php')){
            require_once $folder.$class.'.php';
            break;
        }
    }

});


if (isset($_GET['p'])){
    switch ($_GET['p']){
        case 'about' :
            $controller=new AboutController;
            $controller->getPage();
            break;
        case 'contact' :
            $controller=new ContactController;
            $controller->contactRouting();
            break;
        case 'mockup':
            $controller=new MockupController;
            $controller->mockupRouting();
            break;
        case 'css':
        case 'js':
        case 'api':
        case 'php':
            $controller=new ComponentController;
            $controller->selectComponents($_GET['p']);
            break;
    }
}else{
    $controller=new HomeController;
    $controller->getHomepage();
}

?>