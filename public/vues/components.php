<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';

    echo($this->entete);
    foreach ($components as $component) {
        require $component->getFilePHP();
        include 'vues/partials/separation.php';
        if( !is_null($component->getScriptJS())){
            $this->scripts[]=$component->getScriptJS();
        }
    }

    require 'vues/partials/footer.php';
    foreach ($this->scripts as $script){
        echo($script);
    }
    ?>
</body>
</html>