<?php

require_once 'IControllerGeneral.php';

class PerfilController implements IControllerGeneral {
    function Save($perfil) {
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->Save($perfil);
    }
      
    function Delete($perfil) {
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->Delete($perfil);
    }

    function List(){
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->List();
    }

    function getByDescricao($descricao){
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->getByDescricao($descricao);
    }
}
?> 