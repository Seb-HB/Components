<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';

    foreach ($components as $component) {
        require $component->getFilePHP();
        if( !is_null($component->getScriptJS())){
            $this->scripts[]=$component->getScriptJS();
        }
    }

    require 'vues/partials/footer.php';
    foreach ($this->scripts as $script){
        echo($script);
    }
    ?>
    <script src="js/about.js"></script>>
</body>
</html>