<?php
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
        // else{
        //     echo($class.' n\'a pas été trouvé dans le répertoire '.$folder.'<br>');
        //     echo($folder.$class.'.php <br>');
        // }
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
        case 'CSS':
            $controller=new ComponentController;
            $controller->selectComponents('CSS');
            break;
        case 'JS':
            $controller=new ComponentController;
            $controller->selectComponents('JS');
            break;
        case 'API':
            $controller=new ComponentController;
            $controller->selectComponents('API');
            break;
        case 'PHP':
            $controller=new ComponentController;
            $controller->selectComponents('PHP');
            break;
            
    }
}else{
    $controller=new HomeController;
    $controller->getHomepage();
}

?>