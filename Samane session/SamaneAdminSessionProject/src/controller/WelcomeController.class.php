<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/
use libs\system\Controller;
class WelcomeController extends Controller{

    private $data;
    public function __construct(){
        parent::__construct();
        session_start();
        if(isset($_SESSION['user_session'])) {
            $this->data['user'] = $_SESSION['user_session'];
        } else {
            return $this->view->redirect('Login');
        }
    }
    /** 
     * use: localhost/projectName/Welcome/
     */
    public function index(){

        return $this->view->load("accueil", $this->data);
    }


}
?>
