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
use src\model\UserRepository;

class UserController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function add(){
    
        $userdb = new UserRepository();
        //Prof 1
        
        $userObject = new Professeur();
        
        $userObject->setNom("Seck");
        $userObject->setPrenom("Ngor");
        $userObject->setEmail("seck@seck.sn");
        $userObject->setPassword("passer");
        $userObject->setMatiere("PHP");

        $id = $userdb->addUser($userObject);
        echo $id;
        echo '<br/>';
        //Etudiant 1
        $userObject = new Etudiant();
        
        $userObject->setNom("Kane");
        $userObject->setPrenom("Maguette");
        $userObject->setEmail("kane@kane.sn");
        $userObject->setPassword("passer");
        $userObject->setClasse("L1 GL");

        $id = $userdb->addUser($userObject);
        echo $id;
    }
    public function get($id) {
        $userdb = new UserRepository();
        $user = $userdb->getUser($id);
        if($user != null) 
        {
            if($user instanceof Professeur) 
            {
                echo $user->getPrenom() . " est un professeur";
            } else {
                echo $user->getPrenom() . " est un etudiant";
            }
        } else {
            echo "User " . $id . " non trouve";
        }
    }
}
?>