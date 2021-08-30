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


if (isset($_GET['page'])){
    if ($_GET['page'] =='about'){
        $controller=new AboutController;
        $controller->getPage();
    }

}else{
    $controller=new HomeController;
    $controller->getHomepage();
}

?>