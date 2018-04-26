<?php
class homeController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new usuarios();

        if(!$u->isLogged()) {
        	header("Location: /twitter/login");
        }
    }

    public function index() {
     $dados = array(
        'nome' => ''
     );
     $u = new usuarios($_SESSION['twlg']);
     $dados['nome'] = $u->getNome();
     $dados['qt_seguidos'] = $u->countSeguidos();
     $dados['qt_seguidores'] = $u->countSeguidores();
     $dados['sugestao'] = $u->getUsuarios(5);
     $this->loadTemplate('home', $dados);
    }
}

   