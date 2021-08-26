<?php

require 'controllers/HomeController.php';
require 'controllers/AboutController.php';


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