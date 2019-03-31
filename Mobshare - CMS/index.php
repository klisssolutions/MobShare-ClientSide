<?php
    //Require das constantes
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php");
    session_start();

    if(isset($_GET['destroy'])){
        session_destroy();
        header("location: index.php");
    }

    if(isset($_SESSION['idFuncionario'])){
        if($_SESSION['idFuncionario'] != null){
            require_once(IMPORT_HOME);
        }else{
            require_once(IMPORT_LOGIN);
        }
    }else{
        if(isset($idFuncionario)){
            if($idFuncionario != null){
                $_SESSION['idFuncionario'] = $idFuncionario;
                require_once(IMPORT_HOME);
            }else{
                require_once(IMPORT_LOGIN);
            }
        }else{
            require_once(IMPORT_LOGIN);
        }
    }

?>