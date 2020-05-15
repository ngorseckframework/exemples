<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\RolesRepository;
class RegisterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return $this->view->load("user/register");
    }

    public function registe()
    {
        $userdb = new UserRepository();
        $user = new User();
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        //Gestion des roles
        $roles = array();
        try {
            $roles[] = $userdb->getRoleByName('ROLE_USER');
            $roles[] = $userdb->getRoleByName('ROLE_ADMIN');
        } catch (Exception $ex) {
            //Si les roles n'existe pas
            //Creation d'un role User
            $roledb = new RolesRepository();
            $roleUser = new Roles();
            $roleUser->setNom('ROLE_USER');
            $roledb->add($roleUser);
            $roles[] = $userdb->getRoleByName('ROLE_USER');
            //Creation d'un role Admin
            $roleAdmin = new Roles();
            $roleAdmin->setNom('ROLE_ADMIN');
            $roledb->add($roleAdmin);
            $roles[] = $userdb->getRoleByName('ROLE_ADMIN');
        }
        //Affectation des role a l'utilisateur
        $user->setRoles($roles);
        //ajout de l'utilisateur dans la base de donnees
        $userdb->addUser($user);
        return $this->view->redirect("Login");
    }
}
?>
